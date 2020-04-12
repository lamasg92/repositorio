$(".dpto").change(function(event){

	var id_dpto = event.target.value;

	console.log(id_dpto);

	$.get("carreras/"+id_dpto+"",function(response,departamento){

		for (var i =0; response.length; i++) {
		
		
		$("#carrera").append("<option value='"+response[i].id+"'>"response[i].nombre_carrera"</option>")
	
  	}

  })

})