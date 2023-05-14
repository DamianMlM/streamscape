
function validaForm(){

    var nombre_plataforma = document.getElementById("name_plataforma").value;

    var url = document.getElementById("url_plataforma").value;

    var no_titulos = document.getElementById("titulos_plataforma").value;

    var suscripcion = document.getElementById("tipo_suscripcion").selectedIndex;

    if(nombre_plataforma == null || nombre_plataforma.length == 0 || nombre_plataforma == "0" ){
            alert("Olvidaste poner el nombre de la plataforma");
            document.getElementById("name_plataforma").style.background="pink";
            document.getElementById("name_plataforma").focus();
            return false;
        }
    else if(url == null || url.length == 0 || url == "0"){
            alert("Olvidaste poner el url de la plataforma");
            document.getElementById("url_plataforma").style.background="pink";
            document.getElementById("url_plataforma").focus();
            return false;
        }   
        else if(no_titulos == null || no_titulos.length == 0 || !/^([0-9])*$/.test(no_titulos)){
            alert("Debes escribir la cantidad de titulos que tiene la plataforma (Solo puedes ingresar números)");
            document.getElementById("titulos_plataforma").value = "";
            document.getElementById("titulos_plataforma").style.background="pink";
            document.getElementById("titulos_plataforma").focus();
        return false;
        }
    else if(suscripcion == null || suscripcion.length == 0 || suscripcion == "0")
        {
            alert("Olvidaste seleccionar el tipo de suscripcion");
            document.getElementById("tipo_suscripcion").style.background="pink";
            document.getElementById("tipo_suscripcion").focus();
            return false;
        }   
    return true;
    }
