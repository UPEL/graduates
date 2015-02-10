<?php class Graduate extends AppModel{

	//var $displayField = 'name';
	
	var $validate = array(
		'graduate_type_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'error',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'name' => array(
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

	var $belongsTo = array(
		'GraduateType' => array(
			'className' => 'GraduateType',
			'foreignKey' => 'graduate_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasMany = array(
		'AcademicProfile' => array(
			'className' => 'AcademicProfile',
			'foreignKey' => 'graduate_id',
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
