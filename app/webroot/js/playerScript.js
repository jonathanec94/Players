function addPlayer(){
	//gets the length of the table / the number will be the place for the new player object. 
	var playerLength = $('#playerTable tbody tr').length;
	var json = [];
	var HtmlStr = "<tr><td>New Player</td><td><input type='text' name='data[Player]["+playerLength+"][name]'</td>"

	HtmlStr += "<td><select name='data[Player]["+playerLength+"][country_id]'>";

	$.get("/eloomi/countries/getCountries", function(data){
		json = JSON.parse(data);

		for(var i = 0; i< json.length; i++){
			console.log(json[i]['Country']['id']);
			HtmlStr += "<option value='"+json[i]['Country']['id']+"'>"+json[i]['Country']['name']+"</option>"
		}

		HtmlStr += "</select></td>";
		 $('#playerTable').append(HtmlStr);

	});
	
}

function deletePlayer(id){
	console.log(id);

	var json = [];
	$.ajax({
    url: '/eloomi/players/deletePlayer/'+id,
    type: 'DELETE',
    success: function(data) {
        json = JSON.parse(data);
        if(json['deleted'] == 1){
        	$("#row-"+id).remove();
        }
    }
});
}