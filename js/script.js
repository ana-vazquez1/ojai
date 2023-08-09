function toggleMenu() {
    var menu = document.getElementById('menu');
    var content = document.getElementById('content');
    menu.classList.toggle('hidden');
    content.classList.toggle('hidden');
}

// Evento de clic en el botón de menú
document.getElementById('toggleButton').addEventListener('click', toggleMenu);

var form = document.getElementById("myForm");
var button = document.getElementById("openFormButton");
var cancelButton = document.getElementById("cancelButton");
var formData = document.getElementById("formData");
var dataBody = document.getElementById("dataBody");
var editingRow = null;
var isEditing = false;

button.onclick = function () {
    if (!isEditing) {
        form.style.display = "block";
    }
};

cancelButton.onclick = function () {
    if (isEditing) {
        form.style.display = "none";
    } else {
        form.style.display = "none";
        formData.reset();
    }
};