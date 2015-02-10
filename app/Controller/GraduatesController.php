<?php class GraduatesController extends AppController{
	
	public function index(){
	
		// debug(Inflector::pluralize('GraduateType')); //-> GraduateTypesController
		// debug(Inflector::singularize('promotions')); //-> promotion
	
		$this->loadModel('GraduateType');
		$graduateTypes = $this->GraduateType->find('list');
		
		$logs = $this->Graduate->find('all',array(
													'conditions' => array('Graduate.deleted'=>0),
													'order' => array('Graduate.created DESC')
												));
		
		$this->set(compact('logs','graduateTypes'));
		
	}
	
	public function add(){
		$request = $this->request->query;
		
		$data = 	array
					(
						'Graduate' => Array
						(
							'graduate_type_id' => $request['graduate_type_id'],
							'name' => $request['name']
						)
					);
		
		$this->Graduate->set($data);
		if($this->Graduate->validates()){
			
				if($this->Graduate->save($data)){
					$log = $this->Graduate->read();
					
					$return['result'] =  'successful';
					$return['id'] =  $log['Graduate']['id'];
					
					$return['name'] =  $log['Graduate']['name'];
					$return['graduate_type_name'] =  $log['GraduateType']['name'];
				}else{
					$return['result'] = false; 	
					$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
				}
			
			}else{
				
				// didn't validate logic
				$errors = $this->Graduate->validationErrors;
				foreach($errors as $k=>$v){
					$tmp = 'graduate_'.$k;
					$return[Inflector::camelize($tmp)] = $v[0];
				}
								
		}
		
		$this->set('return',$return);
		$this->render('add','ajax');
	}
	
	public function edit(){
		$request = $this->request->query;
		
		$data = 	array
					(
						'Graduate' => Array
						(
							'id' 					=> $request['id'],
							'name' 					=> $request['name'],
							'graduate_type_id' 		=> $request['graduate_type_id']
						)
					);
		
		$this->Graduate->set($data);
		if($this->Graduate->validates()){
			
				if($this->Graduate->save($data)){
					
					$log = $this->Graduate->read();
					
					$return['result']				=  'successful';
					$return['id']					=  $log['Graduate']['id'];
					$return['name']					=  $log['Graduate']['name'];
					$return['graduate_type_name']		=  $log['GraduateType']['name'];
					
				}else{
					$return['result'] = false; 	
					$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
				}	
			
			}else{
				
				// didn't validate logic
				$errors = $this->Graduate->validationErrors;
				foreach($errors as $k=>$v){
					$tmp = 'graduate_'.$k;
					$return['Edit'.Inflector::camelize($tmp)] = $v[0];
				}
								
		}
		
		$this->set('return',$return);
		$this->render('add','ajax');		
	}
	
	public function getCurrentData(){
		$request = $this->request->query;
		
		$log = $this->Graduate->find('first',array(
													'conditions' => array('Graduate.id'=>$request['id'])
												));
		if($log){
			$return['result']						=  'successful';
			$return['id']							=  $log['Graduate']['id'];
			$return['name']							=  $log['Graduate']['name'];
			$return['graduate_type_id']				=  $log['Graduate']['graduate_type_id'];
		}else{
			$return['result']		= false; 	
			$return['error']		= 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.';			
		}
			
		$this->set('return',$return);
		$this->render('add','ajax');
	}
	
	public function delete(){
		$request = $this->request->query;
		
		$data = 	array
					(
						'Graduate' => Array
						(
							'id' => $request['id'],
							'deleted' => 1
						)
					);
		
		if($this->Graduate->save($data)){
			$return['result'] =  'successful';
		}else{
			$return['result'] = false; 	
			$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
		}	
		$this->set('return',$return);
		$this->render('add','ajax');
	}	
	
	
}?>
