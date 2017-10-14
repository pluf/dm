<?php
return array (
		'DM_Link' => array (
				'relate_to' => array (
						'Pluf_Tenant',
						'DM_Asset',
						'Pluf_User'
				) 
		),
		'DM_Asset' => array (
				'relate_to' => array (
						'Pluf_Tenant' 
				) 
		),
		'DM_Plan' => array (
				'relate_to' => array (
						'Pluf_User',
						'Pluf_Tenant'
				) 
		) 
)
;
