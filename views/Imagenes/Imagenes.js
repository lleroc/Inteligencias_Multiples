//TODO: Inicializa la funcion de javascript
function init() {
  $("#Imagenes_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}
var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($("#Imagenes_form")[0]);
  var idImagenes = document.getElementById("idImagenes").value;
  var accion = "";
  if (idImagenes === undefined || idImagenes === "") {
    accion = "../../controllers/Imagenes.controllers.php?op=insertar";
  } else {
    accion = "../../controllers/Imagenes.controllers.php?op=actualizar";
  }
  $.ajax({
    url: accion,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    cache: false,
    success: (res) => {
      res = JSON.parse(res);
      if (res == "ok") {
        Swal.fire("Imagenes", "Se guardó con exito", "success");
        cargaTabla();

        limpiacajas();
      } else {
        Swal.fire("Imagenes", "Ocurrió un error al guardar", "error");
      }
    },
  });
};
$(document).ready(() => {
  cargaTabla();
});
function eliminar(idImagenes) {
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
        "../../controllers/Imagenes.controllers.php?op=eliminar",
        { idImagenes: idImagenes },
        function (data) {
          data = JSON.parse(data);
          if (data == true) {
            Swal.fire("Imagenes", "Se Elimino Correctamente", "success");
            cargaTabla();
          } else {
            Swal.fire("Imagenes", "Error al Elminar el registro", "error");
          }
        }
      );
    }
  });
}
var cargaTabla = () => {
  var html = "";
  var Usuario_IdRoles = document.getElementById("Usuario_IdRoles").value;
  $.post("../../controllers/Imagenes.controllers.php?op=todos", (datos) => {
    datos = JSON.parse(datos);
    $.each(datos, (index, val) => {
      html +=
        "<tr><td>" +
        (index + 1) +
        "</td><td>" +
        val.Opciones_Respuestas_idOpciones_Respuestas +
        "</td><td>" +
        val.Preguntas_idPreguntas +
        "</td><td>" +
        val.TituloImagen +
        "</td><td>" +
        val.URLImagen +
        "</td><td>" +
        val.DescripcionImagen +
        "</td>";
      if (Usuario_IdRoles === "1") {
        html +=
          "<td><button type=button; onClick=editar(" +
          val.idImagenes +
          ") class=btn&#32;btn-outline-success>Editar</button>";
      }
      if (Usuario_IdRoles === "1") {
        html +=
          "<button type=button onClick=eliminar(" +
          val.idImagenes +
          ") class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>";
      }
      if (Usuario_IdRoles === "2" || Usuario_IdRoles === "2") {
        html +=
          "<td><button type=button onClick=editar(" +
          val.idImagenes +
          ") class=btn&#32;btn-outline-success>Editar</button></tr>";
      }
    });
    $("#tablaImagenes").html(html);
  });
};

var editar = (idImagenes) => {
  jQuery.post(
    "../../controllers/Imagenes.controllers.php?op=uno",
    {
      idImagenes: idImagenes,
    },
    (unImagenes) => {
      unImagenes = JSON.parse(unImagenes);
      document.getElementById("idImagenes").value = unImagenes.idImagenes;
      document.getElementById(
        "Opciones_Respuestas_idOpciones_Respuestas"
      ).value = unImagenes.Opciones_Respuestas_idOpciones_Respuestas;
      document.getElementById("Preguntas_idPreguntas").value =
        unImagenes.Preguntas_idPreguntas;
      document.getElementById("TituloImagen").value = unImagenes.TituloImagen;
      document.getElementById("URLImagen").value = unImagenes.URLImagen;
      document.getElementById("DescripcionImagen").value =
        unImagenes.DescripcionImagen;
      document.getElementById("titleLabelImagenes").innerHTML =
        "Editar Usuario";
      jQuery("#modalImagenes").modal("show");
    }
  );
};
var nuevoOpciones = () => {
  $.post("../../controllers/Opciones.controllers.php?op=todos", {}, (datos) => {
    var html = "";
    datos = JSON.parse(datos);
    $.each(datos, (index, val) => {
      html +=
        "<option value=" + val.Respuestas + ">" + val.Respuestas + "</option>";
    });
    $("#combo_Respuestas").html(html);
  });
};
var nuevoPreguntas = () => {
  $.post(
    "../../controllers/Preguntas.controllers.php?op=todos",
    {},
    (datos) => {
      var html = "";
      datos = JSON.parse(datos);
      $.each(datos, (index, val) => {
        html +=
          "<option value=" +
          val.idPreguntas +
          ">" +
          val.idPreguntas +
          "</option>";
      });
      $("#combo_idPreguntas").html(html);
    }
  );
};
var nuevo = () => {
  nuevoOpciones();
  nuevoPreguntas();
  document.getElementById("titleLabelImagenes").innerHTML = "Nuevo Imagenes";
};
var limpiacajas = () => {
  document.getElementById("idImagenes").value = "";
  document.getElementById("Opciones_Respuestas_idOpciones_Respuestas").value =
    "";
  document.getElementById("Preguntas_idPreguntas").value = "";
  document.getElementById("TituloImagen").value = "";
  document.getElementById("URLImagen").value = "";
  document.getElementById("DescripcionImagen").value = "";
  document.getElementById("idImagenes").value = "";
  jQuery("#modalImagenes").modal("hide");
  document.getElementById("titleLabelImagenes").innerHTML = "Nuevo Imagenes";
};
init();
