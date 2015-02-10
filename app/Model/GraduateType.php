<?php class GraduateType extends AppModel{
	
	public $displayField = 'name';

	public $hasMany = array(
		
		'Graduate' => array(
			'className' => 'Graduate',
			'foreignKey' => 'graduate_type_id',
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
