//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#Preguntas_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#Preguntas_form')[0]); 
var idPreguntas= document.getElementById('idPreguntas').value; 
var accion = ''; 
if(idPreguntas === undefined || idPreguntas === ''){ 
accion = '../../controllers/Preguntas.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/Preguntas.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('Preguntas','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('Preguntas','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(idPreguntas){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/Preguntas.controllers.php?op=eliminar',{idPreguntas:idPreguntas}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('Preguntas', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('Preguntas', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/Preguntas.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.Categorias_idCategorias+'</td><td>'+ val.Tipo_Preguntas_idTipo_Preguntas+'</td><td>'+ val.EnunciadoPregunta+'</td><td>'+ val.FechaCreacion+'</td><td>'+ val.PreguntaPadre+'</td><td>'+ val.Ponderacion+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.idPreguntas+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.idPreguntas + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.idPreguntas+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablaPreguntas').html(html);
                    })
                }
                 
var editar = (idPreguntas) => {
                    
                    jQuery.post('../../controllers/Preguntas.controllers.php?op=uno', {
                        idPreguntas: idPreguntas
                    }, (unPreguntas) => {
                        unPreguntas = JSON.parse(unPreguntas);
document.getElementById('idPreguntas').value = unPreguntas.idPreguntas;
document.getElementById('Categorias_idCategorias').value = unPreguntas.Categorias_idCategorias;
document.getElementById('Tipo_Preguntas_idTipo_Preguntas').value = unPreguntas.Tipo_Preguntas_idTipo_Preguntas;
document.getElementById('EnunciadoPregunta').value = unPreguntas.EnunciadoPregunta;
document.getElementById('FechaCreacion').value = unPreguntas.FechaCreacion;
document.getElementById('PreguntaPadre').value = unPreguntas.PreguntaPadre;
document.getElementById('Ponderacion').value = unPreguntas.Ponderacion;
 document.getElementById('titleLabelPreguntas').innerHTML = 'Editar Usuario';
                        jQuery('#modalPreguntas').modal('show');
                    });
                };
var nuevoCategorias = () =>{ 
 $.post('../../controllers/Categorias.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val.idCategorias + '>' + val.idCategorias + '</option>'
                            });
                            $('#combo_idCategorias').html(html);
                        }) 
 
} 
var nuevoTipo = () =>{ 
 $.post('../../controllers/Tipo.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val.Preguntas + '>' + val.Preguntas + '</option>'
                            });
                            $('#combo_Preguntas').html(html);
                        }) 
 
} 
var nuevoPreguntaPadre = () =>{ 
 $.post('../../controllers/PreguntaPadre.controllers.php?op=todos', {}, (datos) => {
                            var html = '';
                            datos = JSON.parse(datos);
                            $.each(datos, (index, val) => {
                                html += '<option value=' + val. + '>' + val. + '</option>'
                            });
                            $('#combo_').html(html);
                        }) 
 
} 
var nuevo = () => {
nuevoCategorias();nuevoTipo();nuevoPreguntaPadre();  document.getElementById('titleLabelPreguntas').innerHTML = 'Nuevo Preguntas';};
var limpiacajas = () => {
document.getElementById('idPreguntas').value = '';
document.getElementById('Categorias_idCategorias').value = '';
document.getElementById('Tipo_Preguntas_idTipo_Preguntas').value = '';
document.getElementById('EnunciadoPregunta').value = '';
document.getElementById('FechaCreacion').value = '';
document.getElementById('PreguntaPadre').value = '';
document.getElementById('Ponderacion').value = '';
document.getElementById('idPreguntas').value = '';
                        jQuery('#modalPreguntas').modal('hide');
                        document.getElementById('titleLabelPreguntas').innerHTML = 'Nuevo Preguntas';};
 init(); 
