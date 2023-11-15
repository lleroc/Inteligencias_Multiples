//TODO: Inicializa la funcion de javascript
function init() {
  $("#Encuestas_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}
function formatDate(date) {
    var day = date.getDate();
    var month = date.getMonth() + 1; // Months are zero-based
    var year = date.getFullYear();
    day = day < 10 ? '0' + day : day;
    month = month < 10 ? '0' + month : month;
    return day + '-' + month + '-' + year;
}
var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($("#Encuestas_form")[0]);
  var idEncuestas = document.getElementById("idEncuestas").value;
  var accion = "";
  if (idEncuestas === undefined || idEncuestas === "") {
    accion = "../../controllers/Encuestas.controllers.php?op=insertar";
  } else {
    accion = "../../controllers/Encuestas.controllers.php?op=actualizar";
  }
  for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}
  $.ajax({
    url: accion,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    cache: false,
    success: (res) => {
        console.log(res);
      res = JSON.parse(res);
      if (res == "ok") {
        Swal.fire("Encuestas", "Se guardó con exito", "success");
        cargaTabla();

        limpiacajas();
      } else {
        Swal.fire("Encuestas", "Ocurrió un error al guardar", "error");
      }
    },
  });
};
$(document).ready(() => {
  cargaTabla();
});
function eliminar(idEncuestas) {
  Swal.fire({
    title: "Eliminar!",
    text: "Desea Eliminar el Registro?",
    icon: "error",
    confirmButtonText: "Si",
    showCancelButton: true,
    cancelButtonText: "No",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../../controllers/Encuestas.controllers.php?op=eliminar",
        { idEncuestas: idEncuestas },
        function (data) {
          data = JSON.parse(data);
          if (data == true) {
            Swal.fire("Encuestas", "Se Elimino Correctamente", "success");
            cargaTabla();
          } else {
            Swal.fire("Encuestas", "Error al Elminar el registro", "error");
          }
        }
      );
    }
  });
}
var cargaTabla = () => {
  var html = "";
  var Usuario_IdRoles = document.getElementById("Usuario_IdRoles").value;
  $.post("../../controllers/Encuestas.controllers.php?op=todos", (datos) => {
    datos = JSON.parse(datos);

    console.log(datos);
    $.each(datos, (index, val) => {
      html +=
        "<tr><td>" +
        (index + 1) +
        "</td><td>" +
        val.TituloEncuesta +
        "</td><td>" +
        val.DescripcionEncuesta +
        "</td><td>" +
        (val.FechaInicio) +
        "</td><td>" +
        (val.FechaFin) +
        "</td><td>" +
        val.Activa +
        "</td>";
      if (Usuario_IdRoles === "1") {
        html +=
          "<td><button type=button; onClick=editar(" +
          val.idEncuestas +
          ") class=btn&#32;btn-outline-success>Editar</button>";
      }
      if (Usuario_IdRoles === "1") {
        html +=
          "<button type=button onClick=eliminar(" +
          val.idEncuestas +
          ") class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>";
      }
      if (Usuario_IdRoles === "2" || Usuario_IdRoles === "2") {
        html +=
          "<td><button type=button onClick=editar(" +
          val.idEncuestas +
          ") class=btn&#32;btn-outline-success>Editar</button></tr>";
      }
    });
    $("#tablaEncuestas").html(html);
  });
};

var editar = (idEncuestas) => {
  jQuery.post(
    "../../controllers/Encuestas.controllers.php?op=uno",
    {
      idEncuestas: idEncuestas,
    },
    (unEncuestas) => {
      unEncuestas = JSON.parse(unEncuestas);
      document.getElementById("idEncuestas").value = unEncuestas.idEncuestas;
      document.getElementById("TituloEncuesta").value =
        unEncuestas.TituloEncuesta;
      document.getElementById("DescripcionEncuesta").value =
        unEncuestas.DescripcionEncuesta;
      document.getElementById("FechaInicio").value = unEncuestas.FechaInicio;
      document.getElementById("FechaFin").value = unEncuestas.FechaFin;
      document.getElementById("Activa").value = unEncuestas.Activa;
      document.getElementById("titleLabelEncuestas").innerHTML =
        "Editar Encuesta";
      jQuery("#modalEncuestas").modal("show");
    }
  );
};
var nuevo = () => {
  document.getElementById("titleLabelEncuestas").innerHTML = "Nuevo Encuestas";
};
var limpiacajas = () => {
  document.getElementById("idEncuestas").value = "";
  document.getElementById("TituloEncuesta").value = "";
  document.getElementById("DescripcionEncuesta").value = "";
  document.getElementById("FechaInicio").value = "";
  document.getElementById("FechaFin").value = "";
  document.getElementById("Activa").value = "";
  document.getElementById("idEncuestas").value = "";
  jQuery("#modalEncuestas").modal("hide");
  document.getElementById("titleLabelEncuestas").innerHTML = "Nuevo Encuestas";
};
init();
