$(".dpto").change(function(event){

	var id_dpto = event.target.value;
    
    $.get("carreras/",{id:id_dpto},function(response){
           
           console.log(response);

		$("carrera").empty();
		for (var i =0; response.length; i++) {

	         console.log(response[i]);
		
		//$("#carrera").append("<option value='"+response[i].id"'>"response[i].nombre_carrera"</option>")
	
  	}

  })

})
