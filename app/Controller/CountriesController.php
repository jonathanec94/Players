<?php 

class CountriesController extends AppController {
	//REST FOR countries
	public function getCountries(){
		$this->autoRender = false;
		$this->loadModel('Country');

		$countries = $this->Country->find("all");

		return json_encode($countries);

	}
}
?>