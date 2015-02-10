<?php class Promotion extends AppModel{

	//var $displayField = 'name';
	// document first_name	second_name	first_last_name	second_last_name	
	
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'error',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'error',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		)
	);
	

	var $hasMany = array( 
		'AcademicProfile' => array(
			'className' => 'AcademicProfile',
			'foreignKey' => 'promotion_id',
			'dependent' => false,
			'conditions' =>'',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	
}?>
