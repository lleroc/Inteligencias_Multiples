//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#Encuestas_Respuestas_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#Encuestas_Respuestas_form')[0]); 
var idEncuestas_Respuestas= document.getElementById('idEncuestas_Respuestas').value; 
var accion = ''; 
if(idEncuestas_Respuestas === undefined || idEncuestas_Respuestas === ''){ 
accion = '../../controllers/Encuestas_Respuestas.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/Encuestas_Respuestas.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('Encuestas_Respuestas','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('Encuestas_Respuestas','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(idEncuestas_Respuestas){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/Encuestas_Respuestas.controllers.php?op=eliminar',{idEncuestas_Respuestas:idEncuestas_Respuestas}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('Encuestas_Respuestas', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('Encuestas_Respuestas', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/Encuestas_Respuestas.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.Encuestados_idEncuestados+'</td><td>'+ val.Encuestas_idEncuestas+'</td><td>'+ val.Preguntas_idPreguntas+'</td><td>'+ val.Opciones_Respuestas_idOpciones_Respuestas+'</td><td>'+ val.FechaRespuesta+'</td><td>'+ val.RespuestaTexto+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.idEncuestas_Respuestas+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.idEncuestas_Respuestas + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.idEncuestas_Respuestas+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablaEncuestas_Respuestas').html(html);
                    })
                }
                 
var editar = (idEncuestas_Respuestas) => {
                    
                    jQuery.post('../../controllers/Encuestas_Respuestas.controllers.php?op=uno', {
                        idEncuestas_Respuestas: idEncuestas_Respuestas
                    }, (unEncuestas_Respuestas) => {
                        unEncuestas_Respuestas = JSON.parse(unEncuestas_Respuestas);
document.getElementById('idEncuestas_Respuestas').value = unEncuestas_Respuestas.idEncuestas_Respuestas;
document.getElementById('Encuestados_idEncuestados').value = unEncuestas_Respuestas.Encuestados_idEncuestados;
document.getElementById('Encuestas_idEncuestas').value = unEncuestas_Respuestas.Encuestas_idEncuestas;
document.getElementById('Preguntas_idPreguntas').value = unEncuestas_Respuestas.Preguntas_idPreguntas;
document.getElementById('Opciones_Respuestas_idOpciones_Respuestas').value = unEncuestas_Respuestas.Opciones_Respuestas_idOpciones_Respuestas;
document.getElementById('FechaRespuesta').value = unEncuestas_Respuestas.FechaRespuesta;
document.getElementById('RespuestaTexto').value = unEncuestas_Respuestas.RespuestaTexto;
 document.getElementById('titleLabelEncuestas_Respuestas').innerHTML = 'Editar Usuario';
                        jQuery('#modalEncuestas_Respuestas').modal('show');
                    });
                };
var nuevoEncuestados = () =>{ 
 $.post('../../controllers/Encuestados.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val.idEncuestados + '>' + val.idEncuestados + '</option>'
                            });
                            $('#combo_idEncuestados').html(html);
                        }) 
 
} 
var nuevoEncuestas = () =>{ 
 $.post('../../controllers/Encuestas.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val.idEncuestas + '>' + val.idEncuestas + '</option>'
                            });
                            $('#combo_idEncuestas').html(html);
                        }) 
 
} 
var nuevoPreguntas = () =>{ 
 $.post('../../controllers/Preguntas.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val.idPreguntas + '>' + val.idPreguntas + '</option>'
                            });
                            $('#combo_idPreguntas').html(html);
                        }) 
 
} 
var nuevoOpciones = () =>{ 
 $.post('../../controllers/Opciones.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val.Respuestas + '>' + val.Respuestas + '</option>'
                            });
                            $('#combo_Respuestas').html(html);
                        }) 
 
} 
var nuevo = () => {
nuevoEncuestados();nuevoEncuestas();nuevoPreguntas();nuevoOpciones();  document.getElementById('titleLabelEncuestas_Respuestas').innerHTML = 'Nuevo Encuestas_Respuestas';};
var limpiacajas = () => {
document.getElementById('idEncuestas_Respuestas').value = '';
document.getElementById('Encuestados_idEncuestados').value = '';
document.getElementById('Encuestas_idEncuestas').value = '';
document.getElementById('Preguntas_idPreguntas').value = '';
document.getElementById('Opciones_Respuestas_idOpciones_Respuestas').value = '';
document.getElementById('FechaRespuesta').value = '';
document.getElementById('RespuestaTexto').value = '';
document.getElementById('idEncuestas_Respuestas').value = '';
                        jQuery('#modalEncuestas_Respuestas').modal('hide');
                        document.getElementById('titleLabelEncuestas_Respuestas').innerHTML = 'Nuevo Encuestas_Respuestas';};
 init(); 
