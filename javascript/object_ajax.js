    function showSeries(str) {
    // Esta función toma una cadena como entrada y muestra los resultados de una solicitud web a `get_series.php` en el elemento con el ID `txtHint`.
  
    // Si la cadena está vacía, la función no hace nada.
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    }
  
    // Crea un objeto XMLHttpRequest.
    var xmlhttp;
    if (window.XMLHttpRequest) {
      // código para IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // código para IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
  
    // Establece el controlador de eventos onreadystatechange para el objeto XMLHttpRequest.
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        // Si la solicitud es exitosa, muestra el texto de respuesta en el elemento con el ID `txtHint`.
        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
      }
    };
  
    // Abre el objeto XMLHttpRequest con el método GET y la URL `get_series.php`, y envía la solicitud.
    xmlhttp.open("GET","get_series.php?q="+str,true);
    xmlhttp.send();
  }
  

//   function validaForm() { // Esta función se utiliza para validar un formulario.
  
//     // Obtener el índice seleccionado de la opción en el elemento con el ID "ComboSeries".
//     var id_serie = document.getElementById("ComboSeries").selectedIndex;
  
//     // Verificar si no se ha seleccionado ninguna opción o se ha seleccionado la opción con índice 0.
//     if (id_serie == null || id_serie.length == 0 || id_serie == "0") {
//       // Mostrar una alerta indicando que se olvidó seleccionar una serie.
//       alert("Olvidaste seleccionar una serie");
  
//       // Cambiar el fondo del elemento "ComboSeries" a color rosa.
//       document.getElementById("ComboSeries").style.background = "pink";
  
//       // Darle el enfoque al elemento "ComboSeries".
//       document.getElementById("ComboSeries").focus();
  
//       // Devolver false para indicar que el formulario no es válido.
//       return false;
//     }
  
//     // Obtener el índice seleccionado de la opción en el elemento con el ID "Combo_plataforma".
//     var id_plataforma = document.getElementById("Combo_plataforma").selectedIndex;
  
//     // Verificar si no se ha seleccionado ninguna opción o se ha seleccionado la opción con índice 0.
//     if (id_plataforma == null || id_plataforma.length == 0 || id_plataforma == "0") {
//       // Mostrar una alerta indicando que se olvidó seleccionar una plataforma.
//       alert("Olvidaste seleccionar una plataforma");
  
//       // Cambiar el fondo del elemento "Combo_plataforma" a color rosa.
//       document.getElementById("Combo_plataforma").style.background = "pink";
  
//       // Darle el enfoque al elemento "Combo_plataforma".
//       document.getElementById("Combo_plataforma").focus();
  
//       // Devolver false para indicar que el formulario no es válido.
//       return false;
//     }
//   }
  

