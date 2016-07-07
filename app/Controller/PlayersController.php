<?php 

class PlayersController extends AppController {

	public function index(){
		$this->layout ='default_layout';
		$this->loadModel('Player');
		$this->loadModel('Country');

		//This method insert if its  new player object or edit its already exists. 
		if($this->request->is(array("post","put"))){
			if($this->Player->saveMany($this->request->data['Player'])){
				echo "Success";
			}
			else {
				echo "Fail, try agian";
			}
		}



		//gets all the players & countries from the database.
		$players = $this->Player->find("all");

		$countries = $this->Country->find("list",array("fields"=>array("id","name")));

		//set variable for the view
		$this->set("players", $players);
		$this->set("countries", $countries);
	}

	public function deletePlayer($id = null){
		$this->autoRender = false;
		$this->loadModel('Player');

		// The deleted method, return 1 if deleted
		$deleted = $this->Player->delete($id);

		return '{"deleted":"'.$deleted.'"}';
	}


	//REST / find player by ID
	// Im not using this, on the practices.
	//url : http://localhost/eloomi/players/getPlayer/3
	public function getPlayer($id = null){
		$this->autoRender = false;
		$this->loadModel('Player');

		$player = $this->Player->findById($id);
		if(!isset($player['Player'])){
			return "Error";
		}
		else {
			return json_encode($player);
		}
	}


}
?>