function validaAltaSerie(){
            
            
    var id_plataforma = document.getElementById("Combo_plataforma").selectedIndex;

    // var id_serie = document.getElementById("id_serie").value;
        
    var nombre_serie = document.getElementById("name_serie").value;
    
    var genero_serie = document.getElementById("txt_genero").value;
    
    var fecha = document.getElementById("txt_fecha").value;
    
    var idioma = document.getElementById("combo_idioma").selectedIndex;
    
    var clasificacion = document.getElementById("combo_clasificacion").selectedIndex;
    
    var temporadas = document.getElementById("txt_temporadas").value;
    
    var puntuacion = document.getElementById("combo_puntuacion").selectedIndex;

    var director = document.getElementById("txt_director").value;

    var actor = document.getElementById("txt_actor").value;

    var descripcion = document.getElementById("txt_descripcion").value;


    if(id_plataforma == null || id_plataforma.length == 0 || id_plataforma == "0")
        {
            alert("Olvidaste seleccionar una plataforma");
            document.getElementById("Combo_plataforma").style.background="pink";
            document.getElementById("Combo_plataforma").focus();
            return false;
        }
        
        else if(nombre_serie == null || nombre_serie.length == 0 || /^\s+$/.test(nombre_serie)){
            alert("Olvidaste poner el nombre de la serie");
            document.getElementById("name_serie").style.background="pink";
            document.getElementById("name_serie").focus();
            return false;
        }
        else if(genero_serie == null || genero_serie.length == 0 || /^\s+$/.test(genero_serie) || /\d/.test(genero_serie)){
            alert("Olvidaste poner el genero de la serie, no debe llevar numeros");
            document.getElementById("txt_genero").style.background="pink";
            document.getElementById("txt_genero").focus();
            return false;
        }
        else if(fecha == null || fecha.length == 0 || /^\s+$/.test(fecha)){
            alert("Olvidaste poner la fecha de estreno");
            document.getElementById("txt_fecha").style.background="pink";
            document.getElementById("txt_fecha").focus();
            return false;
        }
        else if(idioma == null || idioma.length == 0 || idioma == "0"){
                alert("Olvidaste seleccionar el idioma de la serie");
                document.getElementById("combo_idioma").style.background="pink";
                document.getElementById("combo_idioma").focus();
                return false;
        }
        else if(clasificacion == null || clasificacion.length == 0 || clasificacion == "0"){
                alert("Olvidaste seleccionar una clasificacion de la serie");
                document.getElementById("combo_clasificacion").style.background="pink";
                document.getElementById("combo_clasificacion").focus();
                return false;
        }
        else if(temporadas == null || temporadas.length == 0 || !/^([0-9])*$/.test(temporadas)){
            alert("Debes escribir el numero de temporadas (Solo puedes ingresar números)");
            document.getElementById("txt_temporadas").value = "";
            document.getElementById("txt_temporadas").style.background="pink";
            document.getElementById("txt_temporadas").focus();
            return false;
        }
        else if(puntuacion == null || puntuacion.length == 0 || puntuacion == "0"){
                alert("Olvidaste seleccionar la puntuacion de la serie");
                document.getElementById("combo_puntuacion").style.background="pink";
                document.getElementById("combo_puntuacion").focus();
                return false;
        }
        else if(director == null || director.length == 0 || /^\s+$/.test(director) || /\d/.test(director)){
            alert("Olvidaste poner el nombre del director, no debe llevar numeros");
            document.getElementById("txt_director").style.background="pink";
            document.getElementById("txt_director").focus();
            return false;
        }
        else if(actor == null || actor.length == 0 || /^\s+$/.test(actor) || /\d/.test(actor)){
            alert("Olvidaste poner el actor principal de la serie, no debe llevar numeros");
            document.getElementById("txt_actor").style.background="pink";
            document.getElementById("txt_actor").focus();
            return false;
        }
        else if(descripcion == null || descripcion.length == 0 || /^\s+$/.test(descripcion)){
            alert("Olvidaste poner una descripcion o sinopsis de la serie");
            document.getElementById("txt_descripcion").style.background="pink";
            document.getElementById("txt_descripcion").focus();
            return false;
        }
        return true;
    }
