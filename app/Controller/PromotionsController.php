<?php class PromotionsController extends AppController {

	public function index(){
		
		// debug(Inflector::pluralize('marca')); //-> marcas
		// debug(Inflector::singularize('promotions')); //-> promotion
		
		$logs = $this->Promotion->find('all',array(
														'conditions' => array('Promotion.deleted'=>0),
														'order' => array('Promotion.created DESC')
													));
		$this->set(compact('logs'));		
	
	}
	
	public function view($id){

		$this->loadModel('Specialty');
		$this->loadModel('BasicProfile');
		$this->loadModel('Graduate');		
		
		$promotion = $this->Promotion->find('first',array(
														'conditions' => array('Promotion.deleted'=>0,'Promotion.id'=>$id),
														'contain' => array()
													));
										
		$pre_logs = $this->BasicProfile->find('all',array(
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
		
										
		foreach($pre_logs as $k => $v){
			if($v['AcademicProfile']){
				
				$ok = false;
				foreach($v['AcademicProfile'] as $k2 => $v2){
					if($v2['promotion_id']==$id){
						$ok = true;
					}
				}
				if($ok){
					$logs[$k] = $v;
				}
			} 
		}
									
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
		
		$this->set(compact('logsGraduates','logsPromotions','logsSpecialties','promotion','logs','id'));
	
	}
	
	public function add(){
		$request = $this->request->query;
		
		$data = 	array
					(
						'Promotion' => Array
						(
							'name' => $request['name'],
							'date' => $request['date']
						)
					);
		
		$this->Promotion->set($data);
		if($this->Promotion->validates()){
			
				if($this->Promotion->save($data)){
					
					$log = $this->Promotion->read();
					
					$return['result'] =  'successful';
					$return['id'] =  $log['Promotion']['id'];
					
					$return['name'] =  $log['Promotion']['name'];
					$return['date'] =  $log['Promotion']['date'];
				
				}else{
					$return['result'] = false; 	
					$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
				}
			
			}else{
				
				// didn't validate logic
				$errors = $this->Promotion->validationErrors;
				foreach($errors as $k=>$v){
					$tmp = 'promotion_'.$k;
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
						'Promotion' => Array
						(
							'id' => $request['id'],
							'name' => $request['name'],
							'date' => $request['date']
						)
					);
		
		$this->Promotion->set($data);
		if($this->Promotion->validates()){
			
				if($this->Promotion->save($data)){
					
					$log = $this->Promotion->read();
					
					$return['result']	 =  'successful';
					$return['id']		 =  $log['Promotion']['id'];
					$return['name']		 =  $log['Promotion']['name'];
					$return['date']		 =  $log['Promotion']['date'];
					
				}else{
					$return['result'] = false; 	
					$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
				}	
			
			}else{
				
				// didn't validate logic
				$errors = $this->Promotion->validationErrors;
				foreach($errors as $k=>$v){
					$tmp = 'promotion_'.$k;
					$return['Edit'.Inflector::camelize($tmp)] = $v[0];
				}
								
		}
		
		$this->set('return',$return);
		$this->render('add','ajax');		
	}
	public function getCurrentData(){
		$request = $this->request->query;
		
		$log = $this->Promotion->find('first',array(
														'conditions' => array('Promotion.id'=>$request['id'])
													));
		
		if($log){
			$return['result']			=  'successful';
			$return['id']				=  $log['Promotion']['id'];
			$return['name']				=  $log['Promotion']['name'];
			$return['date']				=  $log['Promotion']['date'];
						
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
						'Promotion' => Array
						(
							'id' => $request['id'],
							'deleted' => 1
						)
					);
		
		if($this->Promotion->save($data)){
			$return['result'] =  'successful';
		}else{
			$return['result'] = false; 	
			$return['error'] = 'Ups! Hubo un error inesperado. Contanta con el cientifico mas cercano.'; 	
		}	
		$this->set('return',$return);
		$this->render('add','ajax');
	}
	
	
}?> 
