function validaLogin(){
	// Coloca aquí tu código de validación
	var valorCorreo = document.getElementById("correo_usuario").value;
	var valorClave = document.getElementById("txtpassword").value;
	var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

	if (valorCorreo == null || valorCorreo.length == 0 || /^\s+$/.test(valorCorreo)) {
	alert("Debes escribir una dirección de correo electrónico");
	document.getElementById("correo_usuario").style.background = 'pink';
	document.getElementById("correo_usuario").focus();
	return false;
	}
	else if (!regex.test(valorCorreo)) {
	alert("Por favor, introduce una dirección de correo electrónico válida");
	document.getElementById("correo_usuario").style.background = 'pink';
	document.getElementById("correo_usuario").focus();
	return false;
	}
	else if (valorClave == null || valorClave.length == 0 || /^\s+$/.test(valorClave)){
		alert("Debes ingresar tu contraseña");
		document.getElementById("txtpassword").value = "";
		document.getElementById("txtpassword").style.background = 'pink';
		document.getElementById("txtpassword").focus();
		return false;  
		
	} //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
	return true; 
}	
