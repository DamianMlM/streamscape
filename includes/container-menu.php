<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    // Obtén todos los elementos con la clase "dropdown-btn" y guárdalos en la variable "dropdown"
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    // Itera sobre cada elemento en "dropdown"
    for (i = 0; i < dropdown.length; i++) {
    // Agrega un evento de escucha de clic al elemento actual
    dropdown[i].addEventListener("click", function() {
        // Alterna la clase "active" en el elemento actual
        this.classList.toggle("active");
        
        // Obtén el siguiente elemento hermano del botón actual
        var dropdownContent = this.nextElementSibling;
        
        // Verifica si el contenido del dropdown está visible o no
        if (dropdownContent.style.display === "block") {
        // Si está visible, ocúltalo
        dropdownContent.style.display = "none";
        } else {
        // Si está oculto, muéstralo
        dropdownContent.style.display = "block";
        }
    });
    }

    // Obtén el elemento con el id "btn-menu" y guárdalo en la variable "btnMenu"
    const btnMenu = document.getElementById("btn-menu");
    // Obtén el primer elemento con la clase "container-menu" y guárdalo en la variable "containerMenu"
    const containerMenu = document.querySelector(".container-menu");
    // Obtén el primer elemento con la clase "cont-menu" y guárdalo en la variable "contMenu"
    const contMenu = document.querySelector(".cont-menu");

    // Agrega un evento de escucha de clic al elemento "btnMenu"
    btnMenu.addEventListener("click", () => {
    // Alterna la clase "visible" en "containerMenu"
    containerMenu.classList.toggle("visible");
    // Alterna la clase "visible" en "contMenu"
    contMenu.classList.toggle("visible");
    });
  </script>