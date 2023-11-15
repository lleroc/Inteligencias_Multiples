//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#Encuestados_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#Encuestados_form')[0]); 
var idEncuestados= document.getElementById('idEncuestados').value; 
var accion = ''; 
if(idEncuestados === undefined || idEncuestados === ''){ 
accion = '../../controllers/Encuestados.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/Encuestados.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('Encuestados','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('Encuestados','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(idEncuestados){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/Encuestados.controllers.php?op=eliminar',{idEncuestados:idEncuestados}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('Encuestados', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('Encuestados', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/Encuestados.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.CedulaEncuestado+'</td><td>'+ val.NombresEncuestado+'</td><td>'+ val.ApellidosEncuestado+'</td><td>'+ val.CorreoElectronico+'</td><td>'+ val.Edad+'</td><td>'+ val.Genero+'</td><td>'+ val.FechaNacimiento+'</td><td>'+ val.LugarNacimiento+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.idEncuestados+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.idEncuestados + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.idEncuestados+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablaEncuestados').html(html);
                    })
                }
                 
var editar = (idEncuestados) => {
                    
                    jQuery.post('../../controllers/Encuestados.controllers.php?op=uno', {
                        idEncuestados: idEncuestados
                    }, (unEncuestados) => {
                        unEncuestados = JSON.parse(unEncuestados);
document.getElementById('idEncuestados').value = unEncuestados.idEncuestados;
document.getElementById('CedulaEncuestado').value = unEncuestados.CedulaEncuestado;
document.getElementById('NombresEncuestado').value = unEncuestados.NombresEncuestado;
document.getElementById('ApellidosEncuestado').value = unEncuestados.ApellidosEncuestado;
document.getElementById('CorreoElectronico').value = unEncuestados.CorreoElectronico;
document.getElementById('Edad').value = unEncuestados.Edad;
document.getElementById('Genero').value = unEncuestados.Genero;
document.getElementById('FechaNacimiento').value = unEncuestados.FechaNacimiento;
document.getElementById('LugarNacimiento').value = unEncuestados.LugarNacimiento;
 document.getElementById('titleLabelEncuestados').innerHTML = 'Editar Usuario';
                        jQuery('#modalEncuestados').modal('show');
                    });
                };
var nuevo = () => {
  document.getElementById('titleLabelEncuestados').innerHTML = 'Nuevo Encuestados';};
var limpiacajas = () => {
document.getElementById('idEncuestados').value = '';
document.getElementById('CedulaEncuestado').value = '';
document.getElementById('NombresEncuestado').value = '';
document.getElementById('ApellidosEncuestado').value = '';
document.getElementById('CorreoElectronico').value = '';
document.getElementById('Edad').value = '';
document.getElementById('Genero').value = '';
document.getElementById('FechaNacimiento').value = '';
document.getElementById('LugarNacimiento').value = '';
document.getElementById('idEncuestados').value = '';
                        jQuery('#modalEncuestados').modal('hide');
                        document.getElementById('titleLabelEncuestados').innerHTML = 'Nuevo Encuestados';};
 init(); 
