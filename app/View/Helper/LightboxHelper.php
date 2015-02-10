<?php class LightboxHelper extends AppHelper {
    //public $helpers = array('Html');
    
    public function start($namespace) {
       
		return		'<div id="ligtbox-container-'.$namespace.'" >
					<div id="ligtbox-white-'.$namespace.'" class="white_content"  style="display:none;">';
       
    }
    public function end($namespace) {
		
		return 	'</div>
				<div id="ligtbox-black-'.$namespace.'" class="black_overlay" style="display:none;"></div>
				</div>';
    }
    
    
} ?>		
