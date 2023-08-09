<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Granjas Ojai</title>

    <style>
th, td {
    white-space: normal; 
    word-break: break-all;
}
#toggleButton{
    position: absolute;
    margin-top: 100px;
    margin-left: 40px;
}
#dataTable {
  border-collapse: collapse;
  width: 100%;
  font-family: 'Poppins', sans-serif;
}
#dataTable_wrapper .dataTables_length,
#dataTable_wrapper .dataTables_filter,
#dataTable_wrapper .dataTables_info,
#dataTable_wrapper .dataTables_paginate {
    font-family: 'Inter', sans-serif;
}
#dataTable_wrapper .dataTables_filter {
  margin-top: -10px;  
}

#addButton{
    margin-top: -50px;
}
#toggleButton{
    position: absolute;
    margin-top: 100px;
    margin-left: 40px;
}

#menu a{
    font-family: 'Montserrat', sans-serif;
}
.fi-sr-users-medical{
    color: orange;
  }
  
  #menu li {
    margin-bottom: 10px;
  }

  #menu a {
    color: #000;
    text-decoration: none;
    display: flex;
    align-items: center;
  }

  #menu a:hover {
    color: orange;
  }

  #menu .icon {
    margin-right: 10px;
    color: orange;
  }
  .eliminar {
        background-color: #dc3545; 
        color: #fff;
        border: none; 
        padding: 8px 12px; 
        border-radius: 4px; 
        cursor: pointer; 
    }

    .eliminar:hover {
        background-color: #c82333;
    }

    .eliminar:active {
        background-color: #bd2130;
    }
    </style>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="images/logo_pagina.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">

    <script src="js/script.js"></script>
</head>
<body>
<nav id="navbar">
    <div class="logo"><img src="images/logo_pagina.png" alt="logo"></div>
<button id="toggleButton"><i class="fi fi-br-menu-burger"></i></button>
    <a href="index.html" class="logout-button"><i class="fi fi-br-exit"></i></a>
</nav>

<div id="menu">
        <ul>
            <br><br><br>
            <li><a href="licencias.html"><i class="fas fa-id-card icon"></i>Licencias</a></li><br>
            <li><a href="empleados.html"><i class="fas fa-users icon"></i>Empleados</a></li><br>
            <li><a href="vehiculos.html"><i class="fas fa-car icon"></i>Vehículos</a></li><br>
            <li><a href="area.php"><i class="fas fa-building icon"></i>Áreas</a></li><br>
            <li><a href="departamentos.php"><i class="fas fa-sitemap icon"></i>Departamentos</a></li><br>
            <li><a href="taller.html"><i class="fas fa-tools icon"></i>Taller</a></li><br>
            <li><a href="sucursales.html"><i class="fas fa-map-marker-alt icon"></i>Sucursales</a></li><br>
            <li><a href="usuarios.html"><i class="fi fi-sr-users-medical"></i>Usuarios</a></li>
            <br><br><br><br><br>
            <li><a href="doc/ManualUsuario.pdf"><i class="fi fi-rr-document"></i> Manual</a></li>
        </ul>
    </div>
    
    <div id="content">
        <h1>Departamentos</h1>
        <button class="add-button" id="addButton"><i class="fi fi-sr-plus-small"></i> Agregar</button><br>

        <div id="myForm">
            <h2>Agregar Departamentos</h2>
            <form id="formData" method="post" action="guardar_departamento.php">
                <label for="nombre">Nombre del departamento:</label><br>
                <input type="text" name="nombre" id="nombre" required><br>

                <label for="descripcion">Descripción:</label><br>
                <textarea name="descripcion" id="descripcion" required></textarea><br>

                <label for="comentarios">Comentarios:</label><br>
                <textarea name="comentarios" id="comentarios"></textarea><br>

                <input class="enviar" type="submit" value="Guardar">
                <button type="button" id="cancelButton">Cancelar</button>
            </form>
        </div>

        <table id="dataTable" class="display" style="width: 100%;">
    <thead>
            <th width="20%">Nombre del departamento</th>
            <th>Descripción</th>
            <th>Comentarios</th>
            <th width="10%">Acciones</th>
            </thead>
            <tbody id="tablaDepartamentosBody">
                <?php include 'mostrar_departamentos.php'; ?>
            </tbody>
        </table>

        <div id="dataContainer"></div>
    </div>
      
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function() {
    var dataTable = $('#dataTable').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        }
    });
    function buscarEnDataTable(searchTerm) {
        dataTable.search(searchTerm).draw();
    }

    $("#searchInputNavbar").on("keyup", function() {
        var searchTerm = $(this).val();
        buscarEnDataTable(searchTerm);
    });
});

                function toggleMenu() {
    var menu = document.getElementById('menu');
    var content = document.getElementById('content');
    menu.classList.toggle('hidden');
    content.classList.toggle('hidden');
}

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

document.addEventListener("DOMContentLoaded", function() {
    var dataTable = document.getElementById("dataTable");
    var dataContainer = document.getElementById("dataContainer");

});
formData.onsubmit = function (event) {
            event.preventDefault();
            var form = event.target;
            var formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    console.log(data.message);
                }
            })
            .catch(error => {
                console.error('Error al enviar el formulario:', error);
            });
        };
 
    function eliminarDepartamento(id) {
        if (confirm("¿Estás seguro de que deseas eliminar este departamento?")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload();
                }
            };
            xhr.open("POST", "eliminar_departamento.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("id=" + id);
        }
    }
    var buttons = document.getElementsByClassName("eliminar");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function() {
            var departamentoId = this.getAttribute("data-id");
            eliminarDepartamento(departamentoId);
        });
    }
        var searchInput = document.getElementById("searchInput");
        searchInput.addEventListener("keyup", buscarEnBaseDeDatos);
    </script>
</body>
</html>
