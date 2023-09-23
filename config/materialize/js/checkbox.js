function toggleCheckboxes(checkbox) {
    var checkboxes = document.getElementsByName('id_escola[]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] !== checkbox) {
            checkboxes[i].checked = false;
        }
    }
}