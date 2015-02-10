<?php class BasicProfile extends AppModel{

	//var $displayField = 'name';
	// document first_name	second_name	first_last_name	second_last_name
		
	var $validate = array(
		'document' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'error',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('isUnique'),
				'message' => 'error',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'error',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'first_last_name' => array(
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
			'foreignKey' => 'basic_profile_id',
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
