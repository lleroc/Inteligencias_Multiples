//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#Opciones_Respuestas_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#Opciones_Respuestas_form')[0]); 
var idOpciones_Respuestas= document.getElementById('idOpciones_Respuestas').value; 
var accion = ''; 
if(idOpciones_Respuestas === undefined || idOpciones_Respuestas === ''){ 
accion = '../../controllers/Opciones_Respuestas.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/Opciones_Respuestas.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('Opciones_Respuestas','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('Opciones_Respuestas','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(idOpciones_Respuestas){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/Opciones_Respuestas.controllers.php?op=eliminar',{idOpciones_Respuestas:idOpciones_Respuestas}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('Opciones_Respuestas', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('Opciones_Respuestas', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/Opciones_Respuestas.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.Preguntas_idPreguntas+'</td><td>'+ val.TextoOpcion+'</td><td>'+ val.Valor+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.idOpciones_Respuestas+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.idOpciones_Respuestas + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.idOpciones_Respuestas+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablaOpciones_Respuestas').html(html);
                    })
                }
                 
var editar = (idOpciones_Respuestas) => {
                    
                    jQuery.post('../../controllers/Opciones_Respuestas.controllers.php?op=uno', {
                        idOpciones_Respuestas: idOpciones_Respuestas
                    }, (unOpciones_Respuestas) => {
                        unOpciones_Respuestas = JSON.parse(unOpciones_Respuestas);
document.getElementById('idOpciones_Respuestas').value = unOpciones_Respuestas.idOpciones_Respuestas;
document.getElementById('Preguntas_idPreguntas').value = unOpciones_Respuestas.Preguntas_idPreguntas;
document.getElementById('TextoOpcion').value = unOpciones_Respuestas.TextoOpcion;
document.getElementById('Valor').value = unOpciones_Respuestas.Valor;
 document.getElementById('titleLabelOpciones_Respuestas').innerHTML = 'Editar Usuario';
                        jQuery('#modalOpciones_Respuestas').modal('show');
                    });
                };
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
var nuevo = () => {
nuevoPreguntas();  document.getElementById('titleLabelOpciones_Respuestas').innerHTML = 'Nuevo Opciones_Respuestas';};
var limpiacajas = () => {
document.getElementById('idOpciones_Respuestas').value = '';
document.getElementById('Preguntas_idPreguntas').value = '';
document.getElementById('TextoOpcion').value = '';
document.getElementById('Valor').value = '';
document.getElementById('idOpciones_Respuestas').value = '';
                        jQuery('#modalOpciones_Respuestas').modal('hide');
                        document.getElementById('titleLabelOpciones_Respuestas').innerHTML = 'Nuevo Opciones_Respuestas';};
 init(); 
