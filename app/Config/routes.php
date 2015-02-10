<?php

	Router::connect('/', array('controller' => 'BasicProfiles', 'action' => 'index'));
	Router::connect('/addNewBasicProfile', array('controller' => 'BasicProfiles', 'action' => 'add'));
	Router::connect('/editBasicProfile', array('controller' => 'BasicProfiles', 'action' => 'edit'));
	Router::connect('/editBasicProfileGetCurrentData', array('controller' => 'BasicProfiles', 'action' => 'getCurrentData'));
	Router::connect('/deleteBasicProfile', array('controller' => 'BasicProfiles', 'action' => 'delete'));

	Router::connect('/promotions', array('controller' => 'Promotions', 'action' => 'index'));
	Router::connect('/addNewPromotion', array('controller' => 'Promotions', 'action' => 'add'));
	Router::connect('/editPromotion', array('controller' => 'Promotions', 'action' => 'edit'));
	Router::connect('/editPromotionGetCurrentData', array('controller' => 'Promotions', 'action' => 'getCurrentData'));
	Router::connect('/deletePromotion', array('controller' => 'Promotions', 'action' => 'delete'));
	Router::connect('/viewThisPromotion/*', array('controller' => 'Promotions', 'action' => 'view'));
	
	
	Router::connect('/users/login', array('controller' => 'Users', 'action' => 'login'));
	Router::connect('/users/logout', array('controller' => 'Users', 'action' => 'logout'));
	
	
	Router::connect('/find', array('controller' => 'BasicProfiles', 'action' => 'find'));

	Router::connect('/addNewAcademicProfile', array('controller' => 'AcademicProfiles', 'action' => 'add'));
	Router::connect('/editAcademicProfile', array('controller' => 'AcademicProfiles', 'action' => 'edit'));
	Router::connect('/editAcademicProfileGetCurrentData', array('controller' => 'AcademicProfiles', 'action' => 'getCurrentData'));	
	Router::connect('/deleteAcademicProfile', array('controller' => 'AcademicProfiles', 'action' => 'delete'));
	

	Router::connect('/graduates', array('controller' => 'Graduates', 'action' => 'index'));
	Router::connect('/addNewGraduate', array('controller' => 'Graduates', 'action' => 'add'));
	Router::connect('/editGraduate', array('controller' => 'Graduates', 'action' => 'edit'));
	Router::connect('/editGraduateGetCurrentData', array('controller' => 'Graduates', 'action' => 'getCurrentData'));
	Router::connect('/deleteGraduate', array('controller' => 'Graduates', 'action' => 'delete'));


	Router::connect('/graduateTypes', array('controller' => 'GraduateTypes', 'action' => 'index'));
	
