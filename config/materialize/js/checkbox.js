function toggleCheckboxes(radio) {
    var radios = document.getElementsByName('id_escola');
    for (var i = 0; i < radios.length; i++) {
        if (radios[i] !== radio) {
            radios[i].checked = false;
        }
    }
}

function checkboxes(radio) {
    var radios = document.getElementsByName('id_sala');
    for (var i = 0; i < radios.length; i++) {
        if (radios[i] !== radio) {
            radios[i].checked = false;
        }
    }
}

$(document).ready(function(){
    $('#data').inputmask('99/99/9999', { placeholder: 'dd/mm/yyyy' });
});

