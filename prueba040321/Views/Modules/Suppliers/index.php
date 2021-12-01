
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
		    <button type="button" class="btn btn-info btn-rounded btn-md waves-effect float-right" data-toggle="modal" data-target="#modalAgregar">Agregar Proveedor</button>
        </div>
    </div>

   
    <div class="my-3 p-3 bg-white rounded box-shadow  ">
        <h6 class="border-bottom border-gray pb-2 mb-0">Info</h6>
        <div class="media text-muted pt-3 table-responsive">

            <table width="100%" class="table table-bordered ">
			  <thead>
			    <tr>
			      <th scope="col">Nombre</th>
			      <th scope="col">Correo</th>
			      <th scope="col">Teléfono</th>
			      <th scope="col">Dirección</th>
			      <th scope="col">Creado</th>
			      <th scope="col">Modificado</th>
			      <th scope="col">status</th>
			      <th width="10px" scope="col">Opciones</th>
			    </tr>
			  </thead>
			  <tbody>
<?php foreach($obj_Supplier as $supplier_data){ ?>
			    <tr id="row<?= $supplier_data->prv_id; ?>">			      
			      <td><?= $supplier_data->prv_nombre; ?></td>
			      <td><?= $supplier_data->prv_correo; ?></td>
			      <td><?= $supplier_data->prv_telefono; ?></td>
			      <td><?= $supplier_data->prv_direccion; ?></td>
			      <td><?= $supplier_data->prv_fecha_creado; ?></td>
			      <td><?= $supplier_data->prv_fecha_modificado; ?></td>
			      <td width="3%" data-role="status"><?= $supplier_data->prv_status; ?></td>
			      <td >
			      	<div class="row col-12" > <!-- ver otra forma de arreglar el espaciado de los botones con este col-12 y abajo mr-5 wtf pendiente.. -->
			      		
				      		<!-- PARA REPARAR EL BUG QUE AL EDITAR, EL MODAL CARGUE DATOS DESACTUALIZADOS, MANDAR EL TEXTO DEL TD! PENDIENTE -->
				      		<!-- o intentar modificar la variable, creandola en el modelo y accediendola con parent, y la variable obj en el método render
				      		que tome esa variable del modelo, a ver si se corrige el error, aunque no creo porque en el momento en que la vista se renderiza
				      		obtiene su valor obj_supplier, pero en el post con ajax no va a entrar a esa función, no se va a actualizar el valor
				      		en la variable local, sería manejar todo con una sola variable global la del padre, y ver si la variable si se actualizó en la vista wtf -->
				      		<div  class="col-lg-6 "> 
					      		<a onclick="actualizar( '<?= $supplier_data->prv_id; ?>' , '<?= $supplier_data->prv_nombre; ?>','<?= $supplier_data->prv_correo; ?>', '<?= $supplier_data->prv_telefono; ?>', '<?= $supplier_data->prv_direccion; ?>', '<?= $supplier_data->prv_status; ?>' )"  
					      		  data-toggle="modal" 
								  type="button"
								  class="btn-rounded btn-floating waves-effect btn-sm"
								  data-ripple-color="dark"
								>
								  <i class="far fa-edit" style="color: #4f4f4f !important;"></i>
								</a>
							</div>

							<div class="col-lg-6 " >
								
									<a onclick="eliminarv2('<?= $supplier_data->prv_id; ?>')"  
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
    	<form class="needs-validation" novalidate action="suppliers" method="POST" name="formAdd">
	      <div class="modal-header text-center">
	        <h5 class="modal-title w-100 font-weight-bold dark-grey-text my-3" id="exampleModalLongTitle">Agregar Proveedor</h5>
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
			        	<label data-error="wrong" data-success="right" for="correo">Correo</label>
			        	<input type="email" id="correo" name="correo" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un correo válido.
				      	</div>
			        </div>

			        
		      	</div>

		      	<div class="col-md-6">
		      		
		      		<div class="md-form mb-5">
		      			<label data-error="wrong" data-success="right" for="telefono">Teléfono</label>
			        	<input type="text" id="telefono" name="telefono" class="form-control " required>			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un número de teléfono.
				      	</div>
			        </div>
			        
			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="direccion">Dirección</label>
			        	<input type="text" id="direccion" name="direccion" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa una dirección.
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
    	<form class="needs-validation" novalidate action="suppliers" method="POST" name="formUpd">
	      <div class="modal-header text-center">
	        <h5 class="modal-title w-100 font-weight-bold dark-grey-text my-3" id="exampleModalLongTitle">Actualizar Proveedor</h5>
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
			        	<label data-error="wrong" data-success="right" for="updtCorreo">Correo</label>
			        	<input type="email" id="updtCorreo" name="correo" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un correo válido.
				      	</div>
			        </div>

			        
		      	</div>

		      	<div class="col-md-6">
		      		
		      		<div class="md-form mb-5">
		      			<label data-error="wrong" data-success="right" for="updtTelefono">Teléfono</label>
			        	<input type="text" id="updtTelefono" name="telefono" class="form-control " required>			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa un número de teléfono.
				      	</div>
			        </div>
			        
			        <div class="md-form mb-5">
			        	<label data-error="wrong" data-success="right" for="updtDireccion">Dirección</label>
			        	<input type="text" id="updtDireccion" name="direccion" class="form-control " required>
			        	
			        	<div class="invalid-feedback"> 
				        	Por favor, ingresa una dirección.
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
					url: "/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/suppliers",
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
	
document.querySelector("#title").innerHTML += '<a href=""> Proveedores</a>'

</script>

<!--  x.querySelector("#Hola").innerHTML = "Hello World!"; -->


<script>
	function actualizar(id, nombre, correo, telefono, direccion, status){
		//alert("El id es: "+id)
		//location.href = "users" //redireccionar
		//location.href='http://localhost/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/suppliers/edit/'+id		
		//-document.getElementById("updtNombre").onchange()
		document.getElementById("updtId").value = id
		document.getElementById("updtNombre").value = nombre
		document.getElementById("updtCorreo").value = correo
		document.getElementById("updtTelefono").value = telefono
		document.getElementById("updtDireccion").value = direccion
		document.getElementById("updtStatus").value = status
		$('#updtNombre').add('#updtCorreo').add('#updtTelefono').add('#updtDireccion').add('#updtStatus').trigger("change"); //label bug fixed, que no va a top
		$('#modalActualizar').modal('show')

		//alert("mensaje: "+id+nombre+correo+telefono);
	}

	function eliminar(id){
		var datos = {
						"ajax" : "softdelete",
						"id" : id
					}
			
			$.ajax({
				type: "POST",
				url: "/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/suppliers",
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
			console.log("Es: "+"<?= $supplier_data->prv_id; ?>")
			var datos = {"ajax" : "softdelete"}
			var id = $(".tblId").attr('id'); 
			$.ajax({
				type: "POST",
				url: "/projects/%5b1%5d%20Interacpedia/15474_vanilla/v1/suppliers",
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