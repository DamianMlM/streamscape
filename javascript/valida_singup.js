function myFunction() {
    var x = document.getElementById("clave_user");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
function myFunction1() {
    var x = document.getElementById("repeat");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
function validaFormUsuarioSingUp(){

    var usuario = document.getElementById("name_user").value;

    var correo = document.getElementById("correo_user").value;

    var clave = document.getElementById("clave_user").value;

    var claverepeat = document.getElementById("repeat").value;

    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


        if(usuario == null || usuario.length == 0 || usuario == "0" || usuario.includes(" ")){
            alert("Olvidaste ingresar un nombre de usuario, no debe contener espacios");
            document.getElementById("name_user").style.background="pink";
            document.getElementById("name_user").focus();
            return false;
        }
        else if (correo == null || correo.length == 0 || /^\s+$/.test(correo)) {
            alert("Debes escribir una dirección de correo electrónico");
            document.getElementById("correo_user").style.background = 'pink';
            document.getElementById("correo_user").focus();
            return false;
        }
        else if (!regex.test(correo)) {
            alert("Por favor, introduce una dirección de correo electrónico válida");
            document.getElementById("correo_user").style.background = 'pink';
            document.getElementById("correo_user").focus();
            return false;
        }
        else if (clave == null || clave.length == 0 || /^\s+$/.test(clave)){
            alert("Debes ingresar una contraseña");
            // document.getElementById("clave_user").value = "";
            document.getElementById("clave_user").style.background = 'pink';
            document.getElementById("clave_user").focus();
            return false; 
          } else if (clave.length < 8 || !/\d/.test(clave) || !/[!@#$%^&*]/.test(clave)) {
            alert("La contraseña debe tener al menos 8 caracteres, 1 número y 1 carácter especial (!@#$%^&*)");
            // document.getElementById("clave_user").value = "";
            document.getElementById("clave_user").style.background = 'pink';
            document.getElementById("clave_user").focus();
            return false;
          }
        else if (clave != claverepeat){
            alert("Las contraseñas no coinciden");
            // document.getElementById("clave_user").value = "";
            document.getElementById("repeat").style.background = 'pink';
            document.getElementById("repeat").focus();
            return false; 
          } 
        return true;
    }
   