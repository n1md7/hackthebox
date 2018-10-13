<?php
class Home extends Controller{
	protected function Index(){
		Restrict::view();
		
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), 'main.php');
	}
	
}
