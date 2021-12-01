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
<main role="main" class="container flex-fill "  style="max-width:69.6% !important;"> <!-- se amplía el container similar a mdb5 -->
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
		    <button type="button" class="btn btn-info btn-rounded btn-md waves-effect float-right" data-toggle="modal" data-target="#modalAgregar">Agregar Usuarios</button>
        </div>
    </div>

   
    <div class="my-3 p-3 bg-white rounded box-shadow  ">
        <h6 class="border-bottom border-gray pb-2 mb-0">Info</h6>
        <div class="media text-muted pt-3 table-responsive">

            <table width="100%" class="table table-bordered ">
			  <thead>
			    <tr>
			      <th scope="col">Nombre</th>
			      <th scope="col">Apellido</th>
			      <th scope="col">Alias</th>
			      <th scope="col">Password</th>
			      <th scope="col">Foto</th>
			      <th scope="col">NombreFoto</th>
			      <th scope="col">Creado</th>
			      <th scope="col">Modificado</th>
			      <th scope="col">status</th>
                              
			      <th width="10px" scope="col">Opciones</th>
			    </tr>
			  </thead>
			  <tbody>
<?php foreach($obj_users as $user_data){ ?>
			    <tr id="row<?= $user_data->usu_id; ?>">			      
			      <td><?= $user_data->usu_nombre; ?></td>
			      <td><?= $user_data->usu_apellido; ?></td>
			      <td><?= $user_data->usu_alias; ?></td>
			      <td><?= $user_data->usu_pass; ?></td>
			      <td><?= $user_data->usu_foto_ruta; ?></td>
			      <td><?= $user_data->usu_foto_nombre; ?></td>
			      <td><?= $user_data->usu_fecha_creado; ?></td>
			      <td><?= $user_data->usu_fecha_modificado; ?></td>
			      <td width="3%" data-role="status"><?= $user_data->usu_status; ?></td>
			      <td >
			      	<div class="row col-12" > <!-- ver otra forma de arreglar el espaciado de los botones con este col-12 y abajo mr-5 wtf pendiente.. -->
			      		
				      		<!-- PARA REPARAR EL BUG QUE AL EDITAR, EL MODAL CARGUE DATOS DESACTUALIZADOS, MANDAR EL TEXTO DEL TD! PENDIENTE -->
				      		<!-- o intentar modificar la variable, creandola en el modelo y accediendola con parent, y la variable obj en el método render
				      		que tome esa variable del modelo, a ver si se corrige el error, aunque no creo porque en el momento en que la vista se renderiza
				      		obtiene su valor obj_supplier, pero en el post con ajax no va a entrar a esa función, no se va a actualizar el valor
				      		en la variable local, sería manejar todo con una sola variable global la del padre, y ver si la variable si se actualizó en la vista wtf -->
				      		<div  class="col-lg-6 "> 
					      		<a onclick="actualizar( '<?= $user_data->usu_id; ?>' , '<?= $user_data->usu_nombre; ?>', '<?= $user_data->usu_apellido; ?>','<?= $user_data->usu_alias; ?>', '<?= $user_data->usu_pass; ?>', '<?= $user_data->usu_foto_ruta; ?>', '<?= $user_data->usu_foto_nombre; ?>','<?= $user_data->usu_status; ?>')"  
					      		  data-toggle="modal" 
								  type="button"
								  class="btn-rounded btn-floating waves-effect btn-sm"
								  data-ripple-color="dark"
								>
								  <i class="far fa-edit" style="color: #4f4f4f !important;"></i>
								</a>
							</div>

							<div class="col-lg-6 " >
								
									<a onclick="eliminarv2('<?= $user_data->usu_id; ?>')"  
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
    	<form class="needs-validation" novalidate action="users" method="POST" name="formAdd">
	      <div class="modal-header text-center">
	        <h5 class="modal-title w-100 font-weight-bold dark-grey-text my-3" id="exampleModalLongTitle">Agregar Usuario</h5>
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

			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="correo">Apellido</label>
			        	<input type="text" id="apellido" name="apellido" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un apellido válido.
				      	</div>
			        </div>
			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="correo">Alias</label>
			        	<input type="text" id="alias" name="alias" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un alias válido.
				      	</div>
			        </div>
			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="correo">Password</label>
			        	<input type="text" id="password" name="password" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un password válido.
				      	</div>
			        </div>
			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="correo">Foto_ruta</label>
			        	<input type="text" id="foto_ruta" name="foto_ruta" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa una foto válido.
				      	</div>
			        </div>
			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="correo">Foto_nombre</label>
			        	<input type="text" id="foto_nombre" name="foto_nombre" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un nombre de foto válido.
				      	</div>
			        </div>
                            
     <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuMenu" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    Rol id
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuMenu">
      <?php
      //$obj_users->rol_nombre
      foreach($obj_users as $user_data){ ?>
        <button class="dropdown-item" type="button" value="<?= $user_data->rol_id; ?>"><?= $user_data->rol_nombre; ?> </button>
        
      <?php } ?>
  </div>
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

		      	<div class="col-md-12">
		      		
		      		<!-- <script> //YYYY-MM-DD HH:MM:SS Formato de datetime sql
		      			/* var d = new Date,
					    dformat = [d.getMonth()+1,
					               d.getDate(),
					               d.getFullYear()].join('-')+' '+
					              [d.getHours(),
					               d.getMinutes(),
					               d.getSeconds()].join(':');

					    document.write(dformat) */ //este no es la gran idea, después toca anteponer un 0 para los de 1 solo dígito ej 1 => 01



		      			
		      			
		      		</script> -->

		      		<?php 
		      			//
			      		//-date_default_timezone_set('America/Bogota'); // Establece la zona horaria.
			      		/* Forma Larga para obtener la fecha
		      			$date = new DateTime(); //Devuelve la fecha actual en formado año-mes-dia hora-minutos-segundos-milisegundos. ej: "2021-02-08 02:26:05.329147"
		      			//echo $date->getTimestamp(); //Devuelve la marca de tiempo Unix que representa la fecha. 		      			
		      			echo $date->format('Y-m-d H:i:s'); //El formato de salida es: YYYY-mm-dd HH:ii:ss 2000-01-01 00:00:00
		      			
		      			// $tz = $date->getTimezone(); //imprimir zona horaria
		      			// echo $tz->getName();
		      			*/

		      			//-echo date('Y-m-d H:i:s');
		      		?>

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



<!-- FIN MODAL INSERTAR -->





<!-- INICIO MODAL ACTUALIZAR -->
<div class="modal animated zoomIn faster" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="modalActualizarTitle"
  aria-hidden="true">
  
  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
    	<form class="needs-validation" novalidate action="users" method="POST" name="formUpd">
	      <div class="modal-header text-center">
	        <h5 class="modal-title w-100 font-weight-bold dark-grey-text my-3" id="exampleModalLongTitle">Actualizar Usuario</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        

	      	<div class="row form-row">
	      		<div class="col-md-6">
		      		<div class="md-form mb-5">
		      		  <label class="" data-error="wrong" data-success="right" for="updtNombre">Nombre</label>
			          <input type="text" id="updtNombre" name="nombre" class="form-control active"  required>
			          

			          <div class="invalid-feedback"> 
				        Por favor, escribe un nombre.
				      </div>
			        </div>

			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="updtApellido">Apellido</label>
			        	<input type="text" id="updtApellido" name="apellido" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un apellido.
				      	</div>
			        </div>
                                          <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="updtFotoRuta">Foto</label>
			        	<input type="text" id="updtFotoRuta" name="foto_ruta" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa una foto.
				      	</div>
			        </div>
			        
		      	</div>

		      	<div class="col-md-6">
		      		
		      		<div class="md-form mb-5">
		      			<label data-error="wrong" data-success="right" for="updtAlias">Alias</label>
			        	<input type="text" id="updtAlias" name="alias" class="form-control " required>			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un alias.
				      	</div>
			        </div>
		      		<div class="md-form mb-5">
		      			<label data-error="wrong" data-success="right" for="updtAlias">Password</label>
			        	<input type="text" id="updtPassword" name="password" class="form-control " required>			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un password.
				      	</div>
			        </div>
			        
			        
			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="updtFotoNombre">Foto</label>
			        	<input type="text" id="updtFotoNombre" name="foto_nombre" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un nombre para la foto
				      	</div>
			        </div>

		      	</div>

		      	<div class="col-md-12">
		      		
		      		<div class="md-form mb-5">
		      			<label data-error="wrong" data-success="right" for="updtStatus">Status</label>
			        	<input type="text" id="updtStatus" name="status" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Ingrese un estado válido.
				      	</div>
			        </div>

		      	</div>



		      	
		      	<input type="hidden" id="updtId" name='id'>
		      	<input type="hidden" name='exe' value='update'>






	      	</div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Actualizar</button>
	      </div>

      </form>
    </div> <!-- Fin content -->
  </div>
</div>



<!-- FIN MODAL ACTUALIZAR -->





 <div class="container">
 	<button onclick="alerta()" type="button" class="btn btn-primary">Test alertas</button>
 </div>

<script> 
function actualizar(id, nombre, apellido, alias, password, foto_ruta, foto_nombre, status){
		document.getElementById("updtId").value = id
		document.getElementById("updtNombre").value = nombre
		document.getElementById("updtApellido").value = apellido
		document.getElementById("updtAlias").value = alias
		document.getElementById("updtPassword").value = password
		document.getElementById("updtFotoRuta").value = foto_ruta
		document.getElementById("updtFotoNombre").value = foto_nombre
		document.getElementById("updtStatus").value = status
		$('#updtNombre').add('#updtApellido').add('#updtAlias').add('#updtPassword').add('#updtFotoRuta').add('#updtFotoNombre').add('#updtStatus').trigger("change"); //label bug fixed, que no va a top
		$('#modalActualizar').modal('show')
            }
</script>

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
					url: "/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/users",
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
	
document.querySelector("#title").innerHTML += '<a href=""> Usuarios</a>'

</script>

<!--  x.querySelector("#Hola").innerHTML = "Hello World!"; -->



<script>
//	function actualizar(id, nombre, apellido, alias, password, foto_ruta, foto_nombre, fecha_creado, fecha_modificado, status){
//		//alert("El id es: "+id)
//		//location.href = "users" //redireccionar
//		//location.href='http://localhost/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/suppliers/edit/'+id		
//		//-document.getElementById("updtNombre").onchange()
////		document.getElementById("updtId").value = id
////		document.getElementById("updtNombre").value = nombre
////		document.getElementById("updtApellido").value = apellido
////		document.getElementById("updtAlias").value = alias
////		document.getElementById("updtPasword").value = password
////		document.getElementById("updtFotoRuta").value = foto_ruta
////		document.getElementById("updtFotoNombre").value = foto_nombre
////		document.getElementById("updtStatus").value = status
////		$('#updtNombre').add('#updtApellido').add('#updtAlias').add('#updtFotoRuta').add('#updtFotoNombre').add('#updtStatus').trigger("change"); //label bug fixed, que no va a top
//		$('#modalActualizar').modal('show')

		//alert("mensaje: "+id+nombre+correo+telefono);
	

	function eliminar(id){
		var datos = {
						"ajax" : "softdelete",
						"id" : id
					}
			
			$.ajax({
				type: "POST",
				url: "/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/users",
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
			console.log("Es: "+"<?= $user_data->usu_id; ?>")
			var datos = {"ajax" : "softdelete"}
			var id = $(".tblId").attr('id'); 
			$.ajax({
				type: "POST",
				url: "/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/users",
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