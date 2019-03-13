function fnEliminar(obj, valor) {
	var seccion = obj.parentNode.getElementsByTagName('input')[0].getAttribute('data-seccion');
	var id = obj.parentNode.parentNode.getElementsByTagName('th')[0].getElementsByTagName('a')[0].textContent;
    if (valor == 0) {
        valor = 1;
        obj.parentNode.innerHTML = '<a onclick="fnEliminars(this, 1);" href="javascript:;" class="es_publicado btn btn-success btn-rounded"><i class="fa fa-eye"></i></a><input type="hidden" name="folio" value="-" data-seccion="facturas">';
    }else {
    	valor = 0;
        obj.parentNode.innerHTML = '<a onclick="fnEliminars(this, 0);" href="javascript:;" class="es_publicado btn btn-blue-grey btn-rounded "><i class="fa fa-eye-slash"></i></a><input type="hidden" name="folio" value="-" data-seccion="facturas">';
    }       
    console.log(seccion+ " - "+id)
   	
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){

    };
    xhttp.open("GET", window.location.href+seccion+"/activar/"+id+"/"+valor);
    try{
    	xhttp.setRequestHeader("Content-Type","application/x-www-form-uriencoded");
 
    } catch(e){}    
    xhttp.send();
}

function fnEliminar2(obj, valor) {
	var seccion = obj.parentNode.getElementsByTagName('input')[0].getAttribute('data-seccion');
	var id = obj.parentNode.parentNode.getElementsByTagName('th')[0].getElementsByTagName('a')[0].textContent;
    if (valor == 2) {
        valor = 1;
        obj.parentNode.innerHTML = '<a onclick="fnEliminar2(this, 1);" href="javascript:;" class="tipo_de_pago btn btn-success btn-rounded"><i class="fa fa-eye"></i></a><input type="hidden" name="id" value="-" data-seccion="facturas">';
    }else {
    	valor = 2;
        obj.parentNode.innerHTML = '<a onclick="fnEliminar2(this, 2);" href="javascript:;" class="tipo_de_pago btn btn-blue-grey btn-rounded "><i class="fa fa-eye-slash"></i></a><input type="hidden" name="id" value="-" data-seccion="facturas">';
    }       
    console.log(seccion+ " - "+id)
   	
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){

    };
    xhttp.open("GET", window.location.href+seccion+"/activar/"+id+"/"+valor);
    try{
    	xhttp.setRequestHeader("Content-Type","application/x-www-form-uriencoded");
 
    } catch(e){}    
    xhttp.send();
}