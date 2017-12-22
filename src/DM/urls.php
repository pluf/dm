<?php
return array (
		
		array ( // Assets urls
				'regex' => '#^/asset/new$#',
				'model' => 'DM_Views_Asset',
				'method' => 'create',
				'http-method' => 'POST',
				'precond' => array (
						'User_Precondition::loginRequired'
				) 
		),
		array (
				'regex' => '#^/asset/find$#',
				'model' => 'DM_Views_Asset',
				'method' => 'find',
				'http-method' => 'GET' 
		),
		// 'precond' => array (
		// //'User_Precondition::loginRequired',
		// //'User_Precondition::loginRequired'
		// )
		array ( // Asset urls
				'regex' => '#^/asset/(?P<id>\d+)$#',
				'model' => 'DM_Views_Asset',
				'method' => 'get',
				'http-method' => 'GET' 
		),
		// 'precond' => array (
		// //'User_Precondition::loginRequired',
		// //'User_Precondition::loginRequired'
		// )
		array ( // Asset urls
				'regex' => '#^/asset/(?P<id>\d+)/find$#',
				'model' => 'DM_Views_Asset',
				'method' => 'findchild',
				'http-method' => 'GET' 
		),
		// 'precond' => array (
		// //'User_Precondition::loginRequired',
		// //'User_Precondition::loginRequired'
		// )
		array ( // Asset urls
				'regex' => '#^/asset/(?P<id>\d+)$#',
				'model' => 'DM_Views_Asset',
				'method' => 'update',
				'http-method' => 'POST' 
		),
		array (
				'regex' => '#^/asset/(?P<id>\d+)$#',
				'model' => 'DM_Views_Asset',
				'method' => 'delete',
				'http-method' => 'DELETE',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired'
				)
		),		
		array ( // Link urls
				'regex' => '#^/asset/(?P<asset_id>\d+)/link/new$#',
				'model' => 'DM_Views_Link',
				'method' => 'create',
				'http-method' => 'GET' 
		),
		// 'precond' => array (
		// 'User_Precondition::loginRequired',
		// 'User_Precondition::loginRequired'
		// )
		array ( // Link urls
				'regex' => '#^/link/(?P<id>\d+)$#',
				'model' => 'DM_Views_Link',
				'method' => 'get',
				'http-method' => 'GET',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // Link urls
				'regex' => '#^/link/find$#',
				'model' => 'DM_Views_Link',
				'method' => 'find',
				'http-method' => 'GET',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // Plan urls
				'regex' => '#^/plan/(?P<id>\d+)$#',
				'model' => 'DM_Views_Plan',
				'method' => 'plan',
				'http-method' => 'GET',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // Plan urls
				'regex' => '#^/plan/new$#',
				'model' => 'DM_Views_Plan',
				'method' => 'create',
				'http-method' => 'POST',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // Plan urls
				'regex' => '#^/plan/find$#',
				'model' => 'DM_Views_Plan',
				'method' => 'find',
				'http-method' => 'GET',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // Plan urls
				'regex' => '#^/plan/(?P<planId>\d+)/pay$#',
				'model' => 'DM_Views_Plan',
				'method' => 'payment',
				'http-method' => 'POST',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // Plan urls
				'regex' => '#^/plan/(?P<planId>\d+)/activate$#',
				'model' => 'DM_Views_Plan',
				'method' => 'activate',
				'http-method' => 'GET',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // PlanTemplate urls
				'regex' => '#^/plantemplate/(?P<id>\d+)$#',
				'model' => 'DM_Views_PlanTemplate',
				'method' => 'get',
				'http-method' => 'GET',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // PlanTemplate urls
				'regex' => '#^/plantemplate/new$#',
				'model' => 'DM_Views_PlanTemplate',
				'method' => 'create',
				'http-method' => 'POST',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // PlanTemplate urls
				'regex' => '#^/plantemplate/(?P<id>\d+)$#',
				'model' => 'DM_Views_PlanTemplate',
				'method' => 'update',
				'http-method' => 'POST',
				'precond' => array (
						'User_Precondition::loginRequired',
						'User_Precondition::loginRequired' 
				) 
		),
		array ( // Download urls
				'regex' => '#^/download/(?P<secure_link>.+)$#',
				'model' => 'DM_Views_Link',
				'method' => 'download',
				'http-method' => 'GET' 
		),
		// 'precond' => array (
		// 'User_Precondition::loginRequired',
		// 'User_Precondition::loginRequired'
		// )
);


// 'precond' => array (
// //'User_Precondition::loginRequired',
// //'User_Precondition::loginRequired'
// )

