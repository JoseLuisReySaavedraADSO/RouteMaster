$(document).ready(function () {
    let selectedStartLocation = null;

    // Manejar clic en los elementos de ubicación
    $(".location-point").click(function () {
        const locationId = $(this).data("location-id");
        selectedStartLocation = locationId;
        // console.log('Hiciste clic en un punto con ID:', selectedStartLocation); // Verifica si este mensaje aparece en la consola
        // Resaltar el punto seleccionado de alguna manera (por ejemplo, cambiando el color)
        console.log('Hiciste clic en un punto con ID:', selectedStartLocation)

        $(".location-point").removeClass("selected");
        $(this).addClass("selected");
    });

    // Manejar clic en el botón "Calcular ruta"
    $(".calculate-route-button").click(function () {
        if (selectedStartLocation !== null) {
            // Asignar el valor del punto de inicio al campo del formulario
            $("#startLocation").val(selectedStartLocation);

            // Enviar el formulario para calcular la ruta TSP
            $("#calculate-route-form").submit();
        } else {
            // Mostrar un mensaje de error si no se seleccionó un punto de inicio
            alert("Selecciona un punto de inicio antes de calcular la ruta.");
        }
    });
});


function openPopup(locationId) {
    // Oculta todos los popups abiertos
    var popups = document.querySelectorAll('.popup');
    for (var i = 0; i < popups.length; i++) {
        popups[i].style.display = 'none';
    }

    // Muestra el popup específico
    var popup = document.getElementById('myPopup_' + locationId);
    popup.style.display = 'block';
}

function closePopup(locationId) {
    // Oculta el popup específico
    var popup = document.getElementById('myPopup_' + locationId);
    popup.style.display = 'none';
}