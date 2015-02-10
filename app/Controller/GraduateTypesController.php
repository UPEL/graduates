<?php class GraduateTypesController extends AppController{
	
	public function index(){

		$graduateTypes = $this->GraduateType->find('list');
		
		debug($graduateTypes);
		
	}
	
}?>


