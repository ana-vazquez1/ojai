var form = document.getElementById("myForm");
var addButton = document.getElementById("addButton");
var cancelButton = document.getElementById("cancelButton");
var formData = document.getElementById("formData");
var dataContainer = document.getElementById("dataContainer");
var editingData = null;
var isEditing = false;

addButton.onclick = function () {
    form.style.display = "block";
    formData.reset();
    editingData = null;
    isEditing = false;
};

cancelButton.onclick = function () {
    form.style.display = "none";
};

formData.addEventListener("submit", function (event) {
    event.preventDefault();

    var nombre = document.getElementById("nombre").value;
    var descripcion = document.getElementById("descripcion").value;
    var comentarios = document.getElementById("comentarios").value;

    if (editingData) {
        // Actualizar los datos en el rectángulo editado
        var dataRect = editingData;
        var h3 = dataRect.querySelector("h3");
        var pTags = dataRect.querySelectorAll("p");

        h3.textContent = nombre;
        pTags[0].textContent = descripcion;
        pTags[1].textContent = comentarios;

        editingData = null;
        isEditing = false;
    } else {
        // Agregar un nuevo rectángulo al contenedor de datos
        var newRect = document.createElement("div");
        newRect.className = "dataRect";
        newRect.innerHTML = '<h3>' + nombre + '</h3><p>' + descripcion + '</p><p>' + comentarios + '</p>' +
            '<div class="buttonContainer">' +
            '<button class="editButton">Editar</button> <button class="deleteButton">Eliminar</button>' +
            '</div>';

        // Asignar evento de clic al botón de editar
        var editButton = newRect.querySelector(".editButton");
        editButton.addEventListener("click", editData.bind(null, newRect, nombre, descripcion, comentarios));

        // Asignar evento de clic al botón de eliminar
        var deleteButton = newRect.querySelector(".deleteButton");
        deleteButton.addEventListener("click", confirmDeleteData.bind(null, newRect));

        dataContainer.appendChild(newRect);
    }

    form.style.display = "none";
    formData.reset();
});

function editData(dataRect, nombre, descripcion, comentarios) {
    editingData = dataRect;
    isEditing = true;

    document.getElementById("nombre").value = nombre;
    document.getElementById("descripcion").value = descripcion;
    document.getElementById("comentarios").value = comentarios;

    form.style.display = "block";
}

function confirmDeleteData(dataRect) {
    var confirmation = confirm("¿Estás seguro de que deseas eliminar estos datos?");

    if (confirmation) {
        dataContainer.removeChild(dataRect);
    }
}