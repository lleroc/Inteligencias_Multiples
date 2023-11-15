//TODO: Inicializa la funcion de javascript 
function init(){ 
$('#Categorias_form').on('submit',function(e){ 
guardaryeditar(e); 
});} 
var guardaryeditar=(e)=>{ 
e.preventDefault(); 
var formData = new FormData($('#Categorias_form')[0]); 
var idCategorias= document.getElementById('idCategorias').value; 
var accion = ''; 
if(idCategorias === undefined || idCategorias === ''){ 
accion = '../../controllers/Categorias.controllers.php?op=insertar' 
}else{ 
accion = '../../controllers/Categorias.controllers.php?op=actualizar' 
} 
$.ajax({url: accion ,type: "POST",data: formData,processData: false,contentType: false,cache : false,success: (res) => {res=JSON.parse(res); 
  if (res=='ok') {
                    Swal.fire('Categorias','Se guardó con exito','success');
                    cargaTabla();
                    
                limpiacajas();
                }else{
                    Swal.fire('Categorias','Ocurrió un error al guardar','error');
                } 
 }})} 
$(document).ready(()=>{ 
 cargaTabla();
}); 
function eliminar(idCategorias){
                    Swal.fire({
                        title: 'Eliminar!',
                        text: 'Desea Eliminar el Registro?',
                        icon: 'error',
                        confirmButtonText: 'Si',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $.post('../../controllers/Categorias.controllers.php?op=eliminar',{idCategorias:idCategorias}, function (data) {
                                data = JSON.parse(data);
                if (data == true) {
                    Swal.fire('Categorias', 'Se Elimino Correctamente', 'success');
                    cargaTabla();
                }else{
                    Swal.fire('Categorias', 'Error al Elminar el registro', 'error');
                }
                            });
                        }
                    });
                } 
var cargaTabla = () => {
                    var html = '';
                    var Usuario_IdRoles = document.getElementById('Usuario_IdRoles').value;
                    $.post('../../controllers/Categorias.controllers.php?op=todos', (datos) => {
                        datos = JSON.parse(datos);
                       $.each(datos, (index, val) => {
                           html += '<tr><td>' + (index + 1) + '</td><td>'+ val.Encuestas_idEncuestas+'</td><td>'+ val.NombreCategoria+'</td><td>'+ val.DescripcionCategoria+'</td><td>'+ val.NivelEducativo+'</td>';if((Usuario_IdRoles) === "1") {html +='<td><button type=button; onClick=editar('+ val.idCategorias+') class=btn&#32;btn-outline-success>Editar</button>'}  if ((Usuario_IdRoles) === "1") {html += '<button type=button onClick=eliminar(' + val.idCategorias + ') class=btn&#32;btn-outline-danger&#32;btn-icon>Eliminar</button></td></tr>';} if ((Usuario_IdRoles) === "2" || (Usuario_IdRoles) === "2") {html +='<td><button type=button onClick=editar('+ val.idCategorias+') class=btn&#32;btn-outline-success>Editar</button></tr>';}
                        });
                        $('#tablaCategorias').html(html);
                    })
                }
                 
var editar = (idCategorias) => {
                    
                    jQuery.post('../../controllers/Categorias.controllers.php?op=uno', {
                        idCategorias: idCategorias
                    }, (unCategorias) => {
                        unCategorias = JSON.parse(unCategorias);
document.getElementById('idCategorias').value = unCategorias.idCategorias;
document.getElementById('Encuestas_idEncuestas').value = unCategorias.Encuestas_idEncuestas;
document.getElementById('NombreCategoria').value = unCategorias.NombreCategoria;
document.getElementById('DescripcionCategoria').value = unCategorias.DescripcionCategoria;
document.getElementById('NivelEducativo').value = unCategorias.NivelEducativo;
 document.getElementById('titleLabelCategorias').innerHTML = 'Editar Usuario';
                        jQuery('#modalCategorias').modal('show');
                    });
                };
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
var nuevo = () => {
nuevoEncuestas();  document.getElementById('titleLabelCategorias').innerHTML = 'Nuevo Categorias';};
var limpiacajas = () => {
document.getElementById('idCategorias').value = '';
document.getElementById('Encuestas_idEncuestas').value = '';
document.getElementById('NombreCategoria').value = '';
document.getElementById('DescripcionCategoria').value = '';
document.getElementById('NivelEducativo').value = '';
document.getElementById('idCategorias').value = '';
                        jQuery('#modalCategorias').modal('hide');
                        document.getElementById('titleLabelCategorias').innerHTML = 'Nuevo Categorias';};
 init(); 
