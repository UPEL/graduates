<style type="text/css">
	.login-container{
		padding: 10px;
	}
	.login-a-block{
		width: 260px;
		border: 1px solid #5A5A5A;
	}
	.login-sign-in{
		background: black;
		padding: 5px;
		opacity: 0.65;
		color: white;
		font-weight: bold;
		
	}
	.login-form-container{
		padding: 10px;
	}
	
</style>	
<div class="login-container">	
	<div class="login-a-block">
		<div class="login-sign-in">Entrar</div>
			<div class="login-form-container">
				<?php
					echo $this->Form->create('User', array('action' => 'login'));
					echo $this->Form->input('email',array('label'=>'Email:','class'=>'input-basic'));
					echo $this->Form->input('password',array('label'=>'Clave:','class'=>'input-basic'));
					echo $this->Form->end('Entrar');
				?>
			</div>
	</div>
</div>
