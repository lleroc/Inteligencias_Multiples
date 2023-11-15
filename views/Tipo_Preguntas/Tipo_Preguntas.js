//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#Tipo_Preguntas_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#Tipo_Preguntas_form')[0]); 
var idTipo_Preguntas= document.getElementById('idTipo_Preguntas').value; 
var accion = ''; 
if(idTipo_Preguntas === undefined || idTipo_Preguntas === ''){ 
accion = '../../controllers/Tipo_Preguntas.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/Tipo_Preguntas.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('Tipo_Preguntas','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('Tipo_Preguntas','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(idTipo_Preguntas){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/Tipo_Preguntas.controllers.php?op=eliminar',{idTipo_Preguntas:idTipo_Preguntas}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('Tipo_Preguntas', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('Tipo_Preguntas', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/Tipo_Preguntas.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.NombreTipo+'</td><td>'+ val.DescripcionTipo+'</td><td>'+ val.RequiereImagen+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.idTipo_Preguntas+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.idTipo_Preguntas + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.idTipo_Preguntas+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablaTipo_Preguntas').html(html);
                    })
                }
                 
var editar = (idTipo_Preguntas) => {
                    
                    jQuery.post('../../controllers/Tipo_Preguntas.controllers.php?op=uno', {
                        idTipo_Preguntas: idTipo_Preguntas
                    }, (unTipo_Preguntas) => {
                        unTipo_Preguntas = JSON.parse(unTipo_Preguntas);
document.getElementById('idTipo_Preguntas').value = unTipo_Preguntas.idTipo_Preguntas;
document.getElementById('NombreTipo').value = unTipo_Preguntas.NombreTipo;
document.getElementById('DescripcionTipo').value = unTipo_Preguntas.DescripcionTipo;
document.getElementById('RequiereImagen').value = unTipo_Preguntas.RequiereImagen;
 document.getElementById('titleLabelTipo_Preguntas').innerHTML = 'Editar Usuario';
                        jQuery('#modalTipo_Preguntas').modal('show');
                    });
                };
var nuevo = () => {
  document.getElementById('titleLabelTipo_Preguntas').innerHTML = 'Nuevo Tipo_Preguntas';};
var limpiacajas = () => {
document.getElementById('idTipo_Preguntas').value = '';
document.getElementById('NombreTipo').value = '';
document.getElementById('DescripcionTipo').value = '';
document.getElementById('RequiereImagen').value = '';
document.getElementById('idTipo_Preguntas').value = '';
                        jQuery('#modalTipo_Preguntas').modal('hide');
                        document.getElementById('titleLabelTipo_Preguntas').innerHTML = 'Nuevo Tipo_Preguntas';};
 init(); 
