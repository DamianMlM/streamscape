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
    xmlhttp.open("GET","get_series.php?plataforma="+str,true);
    xmlhttp.send();
  }
  

