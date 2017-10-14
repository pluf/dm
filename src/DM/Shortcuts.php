<?php
function DM_Shortcuts_GetLinkOr404($id) {
	$item = new DM_Link ( $id );
	if (( int ) $id > 0 && $item->id == $id) {
		return $item;
	}
	throw new DM_Exception_ObjectNotFound ( "SaaSDM link not found (link id:" . $id . ")" );
}
function DM_Shortcuts_GetLinkBySecureIdOr404($secure_id) {
	$item = DM_Link::getLinkBySecureId ( $secure_id );
	if ($item == null || $item->id <= 0) {
		throw new DM_Exception_ObjectNotFound ( "SaaSDM link not found (link id:" . $secure_id . ")" );
	}
	return $item;
}
function DM_Shortcuts_GetAssetOr404($id) {
	$item = new DM_Asset ( $id );
	if (( int ) $id > 0 && $item->id == $id) {
		return $item;
	}
	throw new DM_Exception_ObjectNotFound ( "SaaSDM asset not found (asset id:" . $id . ")" );
}
function DM_Shortcuts_GetPlanTemplateOr404($id) {
	$item = new DM_PlanTemplate ( $id );
	if (( int ) $id > 0 && $item->id == $id) {
		return $item;
	}
	throw new DM_Exception_ObjectNotFound ( "SaaSDM plan template not found (plan template id:" . $id . ")" );
}
function DM_Shortcuts_GetPlanOr404($id) {
	$item = new DM_Plan ( $id );
	if (( int ) $id > 0 && $item->id == $id) {
		return $item;
	}
	throw new DM_Exception_ObjectNotFound ( "SaaSDM plan not found (plan id:" . $id . ")" );
}
function DM_Shortcuts_GetAccountOr404($id) {
	$item = new DM_Account ( $id );
	if (( int ) $id > 0 && $item->id == $id) {
		return $item;
	}
	throw new DM_Exception_ObjectNotFound ( "SaaSDM account not found (plan id:" . $id . ")" );
}
