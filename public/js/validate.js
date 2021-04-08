function validationNumber(element) {
    element.value = element.value.replace(/[^\d.]+/g, '');
}


function validationNumberPhone(element) {
    var expresion = /^3[\d]{9}$/;
    if (isNaN(element.value) || !expresion.test(element.value)) {
        $('#validate').html(
            '<div class="alert alert-danger"> \
            <ul> \
                <li>Escriba de forma correcta el número de teléfono</li> \
            </ul> \
        </div>');
        $('#enviar').attr('disabled', true);
    } else {
        $('#enviar').attr('disabled', false);
        $('#validate').html("");
    }
}

function validationNumberId(element) {
    var expresion = /^[0-9]{6,10}$/g;
    if (isNaN(element.value) || !expresion.test(element.value)) {
        $('#validate').html(
            '<div class="alert alert-danger"> \
            <ul> \
                <li>Escriba de forma correcta el número de cédula</li> \
            </ul> \
        </div>');
        $('#enviar').attr('disabled', true);
    } else {
        $('#validate').html("");
        $('#enviar').attr('disabled', false);
    }
}