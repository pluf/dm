<?php
Pluf::loadFunction ( 'DM_Shortcuts_GetLinkOr404' );
class DM_Views_Link {
	public static function create($request, $match) {
		$asset = DM_Shortcuts_GetAssetOr404 ( $match ['asset_id'] );
		
		// initial link data
		$extra = array (
				'user' => $request->user,
				'asset' => $asset 
		);
		
		// Create link and get its ID
		$form = new DM_Form_LinkCreate ( $request->REQUEST, $extra );
		$link = $form->save ();
		return new Pluf_HTTP_Response_Json ( $link );
	}
	public static function get($request, $match) {
		$link = new DM_Link ( $match ['id'] );
		return new Pluf_HTTP_Response_Json ( $link );
	}
	public static function find($request, $match) {
		$links = new Pluf_Paginator ( new DM_Link () );
		$sql = new Pluf_SQL ();
		$links->forced_where = $sql;
		$links->list_filters = array (
				'id',
				'secure_link',
				'expiry',
				'download',
				'asset' 
		);
		$search_fields = array (
				'id',
				'secure_link',
				'expiry',
				'download',
				'asset' 
		);
		$sort_fields = array (
				'id',
				'secure_link',
				'expiry',
				'download',
				'asset' 
		);
		$links->configure ( array (), $search_fields, $sort_fields );
		$links->items_per_page = 20;
		$links->setFromRequest ( $request );
		return new Pluf_HTTP_Response_Json ( $links->render_object () );
	}
	public static function download($request, $match) {
		$link = DM_Shortcuts_GetLinkBySecureIdOr404 ( $match ['secure_link'] );
		// Check link expiry
		if (date ( "Y-m-d H:i:s" ) > $link->expiry) {
			// Error: Link Expiry
			throw new DM_Exception_ObjectNotFound ( "This link has been expired." );
		}
		
		$asset = $link->get_asset ();
		
		$user = $link->get_user ();
		
		// Do Download
		$httpRange = isset ( $request->SERVER ['HTTP_RANGE'] ) ? $request->SERVER ['HTTP_RANGE'] : null;
		$response = new Pluf_HTTP_Response_ResumableFile ( $asset->path . '/' . $asset->id, $httpRange, $asset->name, $asset->mime_type );
		// TODO: do buz.
		$size = $response->computeSize ();
		
		$planList = new Pluf_Paginator ( new DM_Plan () );
		$sql = new Pluf_SQL ( 'user=%s', array (
				$user->id 
		) );
		$planList->forced_where = $sql;
		foreach ( $planList->render_array() as $plan ) {
			$plan = DM_Shortcuts_GetPlanOr404 ( $plan );
			if ($plan->remain_volume > $size && $plan->remain_count > 0 && $plan->active == 1) {
				$plan->remain_volume -= $size;
				$plan->remain_count --;
				$plan->update ();
				// update download
				$link->download ++;
				$link->update ();
				return $response;
			}	
		}
		throw new DM_Exception_ObjectNotFound ( "SaaSDM plan does not have enough priviledges, or there's no appropriate plan (last checked plan id:" . $plan->id . ")" );
	}
}