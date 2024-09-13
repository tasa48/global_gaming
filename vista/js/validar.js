function validar(){
//definir variables
var correo;
var clave;
var mensajes;
var mensajes2;

correo = document.getElementById('usuario').value;
clave = document.getElementById('clave').value;
mensajes="El correo o la clave no pueden quedar Vacios";
mensajes2="La clave debe tener como mínimo 6 caracteres";

if(correo===""||clave===""){
	//alert ("El correo o la clave no pueden quedar Vacios");
	document.getElementById('mensaje').innerHTML=mensajes;
	return false;
}

if(clave.length<6){
	document.getElementById('mensaje').innerHTML=mensajes2;
	return false;
}

}