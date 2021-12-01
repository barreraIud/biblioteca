roles
<?php 
include_once 'Views/Base/head.php';
include_once 'Views/Base/navbar.php';
?>


<!-- Inicio Contenido  -->

<style>
/* header */
.text-white-50 { color: rgba(255, 255, 255, .5); }
.bg-crimson { background: linear-gradient(40deg,#ffd86f,#fc6262) !important; }
.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
/* fin header */






</style>

<!-- Aquí debería haber un div de clase con el nombre de la vista, para editar mejor en css -->
<main role="main" class="container flex-fill "  style="max-width:59.6% !important;"> <!-- se amplía el container similar a mdb5 -->
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-crimson rounded box-shadow ">
        <div class="px-3 py-1" style="background-color: rgb(41, 41, 41); border-radius: 7px;">

        <!-- <img class="mr-3" src="Assets/img/test/logoReciclado.jpg" width="48" height="48"> -->

        <h2 id="logo-main" class="mb-0" style="font-size: 55px;">
        	<span id="logo-text" contenteditable="true" style="color: rgb(255, 136, 71);">
            	<span style="font-family: 'Akronim';">TalentEat</span></span>&nbsp;<span id="logo-icon" style="box-shadow: rgba(255, 136, 71, 1) 0px 3px 10px 0px, rgba(0, 0, 0, 0.2) 0px 3px 10px 0px !important;background-color: rgb(255 255 255);border-radius: 49%;/* color: rgb(255, 136, 71); */"><i class="fal fa-soup" style="margin-left: 10px;margin-right: 10px;color: rgb(255, 136, 71);"></i>
            	</span>
        </h2>

         </div>
        <div class="lh-100 " style="color: #474747">
            <h6 class="mb-0  lh-100"></h6>
            <small></small>




        </div>


        <div class="row ml-auto " >
        	<!-- Botón accionador del modal -->
		    <!-- Waves effect para que el efecto no sea claro sino oscuro y de profundidad. -->
		    <button type="button" class="btn btn-info btn-rounded btn-md waves-effect float-right" data-toggle="modal" data-target="#modalAgregar">Agregar Rol</button>
        </div>
    </div>

   
    <div class="my-3 p-3 bg-white rounded box-shadow  ">
        <h6 class="border-bottom border-gray pb-2 mb-0">Info</h6>
        <div class="media text-muted pt-3 table-responsive">

            <table width="100%" class="table table-bordered ">
			  <thead>
			    <tr>
			      <th scope="col">Nombre</th>
			      <th scope="col">Creado</th>
			      <th scope="col">Modificado</th>
			      <th scope="col">Status</th>
                              
			      <th width="10px" scope="col">Opciones</th>
			    </tr>
			  </thead>
			  <tbody>
<?php foreach($obj_rol as $rol_data){ ?>
			    <tr id="row<?= $rol_data->rol_id; ?>">			      
			      <td><?= $rol_data->rol_nombre; ?></td>
			      <td><?= $rol_data->rol_fecha_creado; ?></td>
			      <td><?= $rol_data->rol_fecha_modificado; ?></td>
			      <td width="3%" data-role="status"><?= $rol_data->rol_status; ?></td>
			      <td >
			      	<div class="row col-12" > 
				      		<div  class="col-lg-6 "> 
					      		<a onclick="actualizar('<?= $rol_data->rol_id; ?>' , '<?= $rol_data->rol_nombre; ?>','<?= $rol_data->rol_status; ?>')"  
					      		  data-toggle="modal" 
								  type="button"
								  class="btn-rounded btn-floating waves-effect btn-sm"
								  data-ripple-color="dark"
								>
								  <i class="far fa-edit" style="color: #4f4f4f !important;"></i>
								</a>
							</div>

							<div class="col-lg-6 " >
								
									<a onclick="eliminarv2('<?= $rol_data->rol_id; ?>')"  
								  type="button"
								  class=" btn-danger btn-rounded btn-floating  waves-effect btn-sm mr-5" 
								  data-ripple-color="dark" 
									>
								  <i class="far fa-trash-alt"></i>
									</a>
								
					      	</div>
					      	

			      	</div>
			      </td>	
			    </tr>
			    
			  <?php } ?>
			  </tbody>
			</table>

        </div>
        <small class="d-block text-right mt-3"> <a href="#">Reportar error</a> </small>
    </div>
    
</main>

<div class="container" style="max-width:69.6% !important;">
	
</div>

<!-- INICIO MODAL INSERTAR -->
<div class="modal animated zoomIn faster" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTitle"
  aria-hidden="true">
  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
    	<form class="needs-validation" novalidate action="roles" method="POST" name="formAdd">
	      <div class="modal-header text-center">
	        <h5 class="modal-title w-100 font-weight-bold dark-grey-text my-3" id="exampleModalLongTitle">Agregar Rol</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
	      	<div class="row form-row">
	      		<div class="col-md-6">
		      		<div class="md-form mb-5"><!-- md-form da algo de estilo y margin -->
		      		  <label data-error="wrong" data-success="right" for="nombre">Nombre</label>
			          <input type="text" id="nombre" name="nombre" class="form-control " required>
			          

			          <div class="invalid-feedback"> <!-- Mensaje que saldrá al terminar de validar -->
				        Por favor, escribe un nombre.
				      </div>
			        </div>
                          
		      	<div class="col-md-12">
		      		
		      		<div class="md-form mb-5">
		      			<label data-error="wrong" data-success="right" for="status">Status</label>
			        	<input type="text" id="status" name="status" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Ingrese un estado válido.
				      	</div>
			        </div>

		      	</div>
		      	
		      	<input type="hidden" name='exe' value='add'>

	      	</div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Guardar</button>
	      </div>
      </form>
    </div> <!-- Fin content -->
  </div>
</div>
</div>
<!-- FIN MODAL INSERTAR -->
<!-- INICIO MODAL ACTUALIZAR -->
<div class="modal animated zoomIn faster" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="modalActualizarTitle"
  aria-hidden="true">
  
  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
    	<form class="needs-validation" novalidate action="roles" method="POST" name="formUpd">
	      <div class="modal-header text-center">
	        <h5 class="modal-title w-100 font-weight-bold dark-grey-text my-3" id="exampleModalLongTitle">Actualizar Rol</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
	      	<div class="row form-row">
	                 <div class="col-md-6">
		      	         <div class="md-form mb-5">
		      		  <label data-error="wrong" data-success="right" for="updtNombre">Nombre</label>
			          <input type="text" id="updtNombre" name="nombre" class="form-control active"  required>
			          

			          <div class="invalid-feedback"> 
				        Por favor, escribe un nombre.
				      </div>
			        </div>

			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="updtState">State</label>
			        	<input type="text" id="updtStatus" name="status" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un estado válido.
				</div>
			        </div>
                                 
                         </div>
		            <input type="hidden" id="updtId" name='id'>
		      	<input type="hidden" name='exe' value='update'>     
                       </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Actualizar</button><!--
-->	      </div>

      </form>
    </div>  
  </div>
</div>



<!-- FIN MODAL ACTUALIZAR -->

 <div class="container">
 	<button onclick="alerta()" type="button" class="btn btn-primary">Test alertas</button>
 </div>
<script>
	function eliminarv2(id){
		Swal.fire({
		  title: 'Por favor, confirmar',
		  showClass: {
		    popup: 'animated zoomIn faster'
		  },
		  text: "Está seguro que desea eliminar este elemento?",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Sí, elimínalo!',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {

			//js con jquery+ajax
			var datos = {
						"ajax" : "softdelete",
						"id" : id
					}			

		  if (result.isConfirmed) {
		  	
			  	$.ajax({
					type: "POST",
					url: "/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/roles",
					data: datos,
					success: function(respuesta){//va al archivo con las post y en respuesta nos manda el retorno que tenemos en el 'receptor'.
						console.log(" "+respuesta)
						if(respuesta==1){
							$('#row'+id).children('td[data-role=status]').text('0');
							
							Swal.fire(
						      'Borrado!',
						      'El proveedor id:'+id+' ha sido borrado.',
						      'success'
						    )
							//$('#row'+id).remove(); //para no superadmins, poner un if de check de global rol
							 // si lo desactivó, entonces modifique la tabla, campo status a 0
						}else{
							alert("El id: ! "+id+" Está inactivo!")
						}
					}
				});
		    
		  }

		})
		return false;//retorno de la función
	}
</script>
<script>(function() {// Script para validar de bootstrap
	'use strict';
	window.addEventListener('load', function() {
	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.getElementsByClassName('needs-validation');
	// Loop over them and prevent submission
	var validation = Array.prototype.filter.call(forms, function(form) {
	form.addEventListener('submit', function(event) {
	if (form.checkValidity() === false) {
	event.preventDefault();
	event.stopPropagation();
	}
	form.classList.add('was-validated');
	}, false);
	});
	}, false);
	})();
</script>
<script>
	
document.querySelector("#title").innerHTML += '<a href="">roles</a>'

</script>

<script> 
function actualizar(id, nombre, status){
		document.getElementById("updtId").value = id
		document.getElementById("updtNombre").value = nombre
		document.getElementById("updtStatus").value = status
		$('#updtNombre').add('#updtStatus').trigger("change"); //label bug fixed, que no va a top
		$('#modalActualizar').modal('show')
            }
            function eliminar(id){
		var datos = {
						"ajax" : "softdelete",
						"id" : id
					}
			
			$.ajax({
				type: "POST",
				url: "/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/roless",
				data: datos,
				success: function(respuesta){//va al archivo con las post y en respuesta nos manda el retorno que tenemos en el 'receptor'.
					console.log(" "+respuesta)
					if(respuesta==1){
						alert("Id: "+id+" Eliminado correctamente!")
						//$('#row'+id).remove(); //para no superadmins, poner un if de check de global rol
						$('#row'+id).children('td[data-role=status]').text('0'); // si lo desactivó, entonces modifique la tabla, campo status a 0
					}else{
						alert("El id: ! "+id+" Está inactivo!")
					}
				}
			});
			return false;
	}

	$(document).ready(function(){
		//console.log("test: "+respuesta)


		$(".btnEliminar").click(function(){
			console.log("Es: "+"<?= $rol_data->rol_id; ?>")
			var datos = {"ajax" : "softdelete"}
			var id = $(".tblId").attr('id'); 
			$.ajax({
				type: "POST",
				url: "/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/roles",
				data: datos,
				success: function(respuesta){
					console.log(" "+respuesta)
					if(respuesta==1){
						alert("Respuesta exitosa! "+id)
					}else{
						alert("Respuesta fallida!")
					}
				}
			});
			return false;

		});
	});
</script>

<?php 
include_once 'Views/Base/footer.php';
 ?>