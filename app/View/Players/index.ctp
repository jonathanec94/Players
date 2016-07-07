<?php echo $this->Html->script('playerScript'); ?>

<a onclick="addPlayer()" class="btn btn-primary btn-width" style="width:140px;"><i class="fa fa-plus"></i>Add player</a>

<?php echo $this->form->create("Player"); ?>
<table class="table" id="playerTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Player</th>
			<th>Country</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(sizeof($players)> 0 ){
			$counter = 0 ;
			foreach($players as $player){
				$playerId = $player['Player']['id'];
				echo '<tr id="row-'.$playerId.'">';
					echo '<td> '.$playerId. $this->form->input("id",array("label"=>false, "name"=> "data[Player][$counter][id]", "value"=>$playerId, "type"=>"hidden")).'</td>';

					echo '<td> '.$this->form->input("name",array("label"=>false, "name"=> "data[Player][$counter][name]", "value"=>$player["Player"]["name"])).'</td>';
					echo '<td> '.$this->form->input("country_id",array("label"=>false, "name"=> "data[Player][$counter][country_id]", "type"=> "select", "values"=>$countries, "selected"=>$player["Player"]["country_id"])).'</td>';
					echo '<td><a onclick="deletePlayer('.$playerId.')">Delete</a></td>';
				echo '</tr>';

				$counter++;
			}
		}
		else {
				echo '<tr>';
					echo '<td colspan="4">No players found!</tr>';
				echo '</tr>';
		}
		?>
	</tbody>
</table>
<?php echo $this->form->end("save"); ?>