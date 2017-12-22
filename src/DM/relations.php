<?php
return array (
		'DM_Link' => array (
				'relate_to' => array (
						'Pluf_Tenant',
						'DM_Asset',
						'User'
				) 
		),
		'DM_Asset' => array (
				'relate_to' => array (
						'Pluf_Tenant' 
				) 
		),
		'DM_Plan' => array (
				'relate_to' => array (
						'User',
						'Pluf_Tenant'
				) 
		) 
)
;
