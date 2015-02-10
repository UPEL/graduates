<?php class BasicProfilesController extends AppController {

	// debug(Inflector::pluralize('marca')); //-> marcas
	// debug(Inflector::singularize('BasicProfiles')); //-> BasicProfile
		

	public function find(){
		
		$this->loadModel('Promotion');
		$this->loadModel('Specialty');
		$this->loadModel('Graduate');
		
		if($this->request->data){
					
			$requestData = $this->request->data;	
			
			$log = $this->BasicProfile->find('first',array(
													'conditions' => array(
														'BasicProfile.document'=>$requestData['BasicProfile']['document'],
														'BasicProfile.deleted'=>0
													),
													'contain' => array(
														'AcademicProfile'=>array(
															'conditions' => array('AcademicProfile.deleted'=>0),
															'Promotion',
															'Specialty',
															'Graduate'=>array(
																'GraduateType'
															)
														)
													)
												));
			if(!$log){
				$log = false;
			}
				
		}
		
		//debug($log);
		
		$logsGraduatesPre = $this->Graduate->find('all',array(
													'conditions' => array('Graduate.deleted'=>0),
													'order' => array('Graduate.created DESC'),
													'contain' => array(
														'GraduateType'
													)
												));
		
		foreach($logsGraduatesPre  as $k => $v){
			
			$logsGraduates[$v['Graduate']['id']] = $v['GraduateType']['name'].' de: '. $v['Graduate']['name'];
			
		}

			
		$logsPromotions = $this->Promotion->find('list',array(
													'conditions' => array('Promotion.deleted'=>0),
													'order' => array('Promotion.created DESC')
												));
				
		$logsSpecialties = $this->Specialty->find('list');
		
		
		$this->set(compact('log','logsPromotions','logsSpecialties','logsGraduates'));	
		
	}

	public function index(){

		$this->loadModel('Promotion');
		$this->loadModel('Specialty');		
		$this->loadModel('Graduate');		
		
		$logs = $this->BasicProfile->find('all',array(
													'conditions' => array('BasicProfile.deleted'=>0),
													'order' => array('BasicProfile.created DESC'),
													'limit' => 40,
													'contain' => array(
														'AcademicProfile'=>array(
															'conditions' => array('AcademicProfile.deleted'=>0),
															'Promotion',
															'Specialty',
															'Graduate'=>array(
																'GraduateType'
															)
														)
													)
												));
		
		
		$logsGraduatesPre = $this->Graduate->find('all',array(
													'conditions' => array('Graduate.deleted'=>0),
													'order' => array('Graduate.created DESC'),
													'contain' => array(
														'GraduateType'
													)
												));
		
		foreach($logsGraduatesPre  as $k => $v){
			
			$logsGraduates[$v['Graduate']['id']] = $v['GraduateType']['name'].' de: '. $v['Graduate']['name'];
			
		}
											
												
		$logsPromotions = $this->Promotion->find('list',array(
													'conditions' => array('Promotion.deleted'=>0),
													'order' => array('Promotion.created DESC')
												));
			
		$logsSpecialties = $this->Specialty->find('list');
		
		$this->set(compact('logs','logsPromotions','logsSpecialties','logsGraduates'));
	
	}
	
	public function add(){
		$request = $this->request->query;
		
		//debug($request);
		
		$data = 	array
					(
						'BasicProfile' => Array
						(
							'document' => $request['document'],
							'first_name' => $request['first_name'],
							'second_name' => $request['second_name'],
							'first_last_name' => $request['first_last_name'],
							'second_last_name' => $request['second_last_name'],
						)
					);
		
				/*			
					document BasicProfileDocument
					first_name BasicProfileFirstName
					second_name BasicProfileSecondName
					first_last_name BasicProfileFirstLastName
					second_last_name BasicProfileSecondLastName
				*/
		
		$this->BasicProfile->set($data);
		if($this->BasicProfile->validates()){
			
				if($this->BasicProfile->save($data)){
					
					$im_ok = $this->BasicProfile->read();
					
					$return['result'] =  'successful';
					$return['id'] =  $im_ok['BasicProfile']['id'];
					
					$return['document'] =  $im_ok['BasicProfile']['document'];
					$return['first_name'] =  $im_ok['BasicProfile']['first_name'];
					$return['second_name'] =  $im_ok['BasicProfile']['second_name'];
					$return['first_last_name'] =  $im_ok['BasicProfile']['first_last_name'];
					$return['second_last_name'] =  $im_ok['BasicProfile']['second_last_name'];
				
				}else{
					$return['result'] = false; 	
					$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
				}
			
			}else{
				
				// didn't validate logic
				$errors = $this->BasicProfile->validationErrors;
				foreach($errors as $k=>$v){
					$tmp = 'basic_profile_'.$k;
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
						'BasicProfile' => Array
						(
							'id' => $request['id'],
							'document' => $request['document'],
							'first_name' => $request['first_name'],
							'second_name' => $request['second_name'],
							'first_last_name' => $request['first_last_name'],
							'second_last_name' => $request['second_last_name'],
						)
					);
		
		
		$this->BasicProfile->set($data);
		if($this->BasicProfile->validates()){
			
				if($this->BasicProfile->save($data)){
					
					$im_ok = $this->BasicProfile->read();
					
					$return['result'] =  'successful';
					$return['id'] =  $im_ok['BasicProfile']['id'];
					$return['document'] =  $im_ok['BasicProfile']['document'];
					$return['first_name'] =  $im_ok['BasicProfile']['first_name'];
					$return['second_name'] =  $im_ok['BasicProfile']['second_name'];
					$return['first_last_name'] =  $im_ok['BasicProfile']['first_last_name'];
					$return['second_last_name'] =  $im_ok['BasicProfile']['second_last_name'];
					
					
				}else{
					$return['result'] = false; 	
					$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
				}	
			
			}else{
				
				// didn't validate logic
				$errors = $this->BasicProfile->validationErrors;
				foreach($errors as $k=>$v){
					$tmp = 'basic_profile_'.$k;
					$return['Edit'.Inflector::camelize($tmp)] = $v[0];
				}
								
		}
		
		$this->set('return',$return);
		$this->render('add','ajax');		
	}
	public function getCurrentData(){
		$request = $this->request->query;
		
		$log = $this->BasicProfile->find('first',array(
														'conditions' => array('BasicProfile.id'=>$request['id'])
													));
		
		if($log){
		
			$return['result']			=  'successful';
			$return['id']				=  $log['BasicProfile']['id'];
			$return['document']			=  $log['BasicProfile']['document'];
			$return['first_name']		=  $log['BasicProfile']['first_name'];
			$return['second_name']		=  $log['BasicProfile']['second_name'];
			$return['first_last_name']	=  $log['BasicProfile']['first_last_name'];
			$return['second_last_name'] =  $log['BasicProfile']['second_last_name'];
			
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
						'BasicProfile' => Array
						(
							'id' => $request['id'],
							'deleted' => 1
						)
					);
		
		if($this->BasicProfile->save($data)){
			$return['result'] =  'successful';
		}else{
			$return['result'] = false; 	
			$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
		}	
		$this->set('return',$return);
		$this->render('add','ajax');
	}
	
	
}?> 
