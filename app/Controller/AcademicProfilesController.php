<?php class AcademicProfilesController extends AppController{
	
	public function add(){
		$request = $this->request->query;
		
		$data = 	array
					(
						'AcademicProfile' => Array
						(
							'basic_profile_id' 	=>		$request['basic_profile_id'],
							'promotion_id' 		=>		$request['promotion_id'],
							'graduate_id' 		=>		$request['graduate_id'],
							'specialty_id' 		=>		$request['specialty_id'],
							'academic_index' 	=>		$request['academic_index'],
						)
					);
		
			
		$this->AcademicProfile->set($data);
		if($this->AcademicProfile->validates()){
			
				if($this->AcademicProfile->save($data)){
					
					$id = $this->AcademicProfile->id;	
					$log = $this->AcademicProfile->find('first',array(
																'conditions' => array('AcademicProfile.id'=>$id),
																'contain' => array(
																	'Promotion',
																	'Specialty',
																	'Graduate'=>array(
																		'GraduateType'
																	)
																)
					));
					
					$return['result']					=  'successful';
					$return['id'] 						=  $log['AcademicProfile']['id'];
					$return['basic_profile_id'] 		=  $log['AcademicProfile']['basic_profile_id'];
					
					$return['graduate_name']			=  $log['Graduate']['name'];
					$return['graduate_type_name']		=  $log['Graduate']['GraduateType']['name'];
					
					$return['promotion']				=  $log['Promotion']['name'];
					$return['specialty']				=  $log['Specialty']['name'];
					$return['academic_index']			=  $log['AcademicProfile']['academic_index'];
					
					}else{
					
					$return['result'] = false; 	
					$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
				
				}
			
			}else{
				
				// didn't validate logic
				$errors = $this->AcademicProfile->validationErrors;
				foreach($errors as $k=>$v){
					$tmp = 'academic_profile_'.$k;
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
						'AcademicProfile' => Array
						(
							'id' 				=> $request['id'],
							'promotion_id' 		=> $request['promotion_id'],
							'graduate_id'  		=> $request['graduate_id'],
							'specialty_id' 		=> $request['specialty_id'],
							'academic_index' 	=> $request['academic_index']
						)
					);
		
		
		$this->AcademicProfile->set($data);
		if($this->AcademicProfile->validates()){
			
				if($this->AcademicProfile->save($data)){
					
					$im_ok = $this->AcademicProfile->read();
					
					$id = $this->AcademicProfile->id;	
					$log = $this->AcademicProfile->find('first',array(
																'conditions' => array('AcademicProfile.id'=>$id),
																'contain' => array(
																	'Promotion',
																	'Specialty',
																	'Graduate'=>array(
																		'GraduateType'
																	)
																)
					));
					
					$return['result'] 					=  'successful';
					$return['id'] 						=  $log['AcademicProfile']['id'];
					$return['promotion'] 				=  $log['Promotion']['name'];
					$return['specialty'] 				=  $log['Specialty']['name'];
					$return['academic_index'] 			=  $log['AcademicProfile']['academic_index'];
					
					$return['graduate_name']			=  $log['Graduate']['name'];
					$return['graduate_type_name']		=  $log['Graduate']['GraduateType']['name'];
					
					
				}else{
					$return['result'] = false; 	
					$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
				}	
			
			}else{
				
				// didn't validate logic
				$errors = $this->AcademicProfile->validationErrors;
				foreach($errors as $k=>$v){
					$tmp = 'academic_profile_'.$k;
					$return['Edit'.Inflector::camelize($tmp)] = $v[0];
				}
								
		}
		
		$this->set('return',$return);
		$this->render('add','ajax');		
	}
	
	public function getCurrentData(){
		$request = $this->request->query;
		
		$log = $this->AcademicProfile->find('first',array(
														'conditions' => array('AcademicProfile.id'=>$request['id'])
													));
		
		
		if($log){
		
			$return['result']				=  'successful';
			$return['promotion_id']			=  $log['AcademicProfile']['promotion_id'];
			$return['specialty_id']			=  $log['AcademicProfile']['specialty_id'];
			$return['academic_index']		=  $log['AcademicProfile']['academic_index'];
			$return['graduate_id']			=  $log['Graduate']['id'];
			
		}else{
			$return['result'] = false; 	
			$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.';			
		}
			
		$this->set('return',$return);
		$this->render('add','ajax');	
	}
	
	public function delete(){
		$request = $this->request->query;
		
		$data = 	array
					(
						'AcademicProfile' => Array
						(
							'id' => $request['id'],
							'deleted' => 1
						)
					);
		
		//debug($data);
		
		
		if($this->AcademicProfile->save($data)){
			$return['result'] =  'successful';
		}else{
			$return['result'] = false; 	
			$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
		}	
		$this->set('return',$return);
		$this->render('add','ajax');
	}
	
	
	
	
} ?> 
