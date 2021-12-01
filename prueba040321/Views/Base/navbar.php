<!-- Se debe añadir un eco en php o texto de toda la ruta raiz para que cargue bien sino, añade el texto que se indique a la ruta actual... -->
<div id="title" align="center" style="margin-top: 30px;"><a href="<?=URL_ROOT?>asd" >Vista principal</a></div>
<!-- Al final borrar lo anterior, ya que es solo un adorno para indicar que vista es.. -->

<style>
	.nav-link, .navbar-brand{
		color: white;
		border-radius: 18px;

	}
	.nav-link:hover, .navbar-brand:hover{ color:Gainsboro; }

	
	


</style>





<div class="container " style="max-width:69.6% !important;">





<nav class="navbar navbar-expand-lg " style="background: linear-gradient(40deg,#fc6262,#DC143C) !important">
	<div class="container-fluid" >
		<a class="navbar-brand" href="#">Inicio</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor02">
			<ul class="navbar-nav  mr-auto mb-2 mb-lg-0">
				
				 <!-- Navbar dropdown -->
		        <li class="nav-item disabled dropdown" >
					<a 
						class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="" data-toggle="dropdown" aria-expanded="false">Usuarios
					</a>
					<!-- Contenido navbar dropdown -->
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a href="#" class="dropdown-item">Administrar Usuarios</a></li>
						<li><a href="#" class="dropdown-item">Administrar Roles</a></li>
					</ul>
				</li>

				 <li class="nav-item">
					<a class="nav-link" href="suppliers">Proveedores</a>
				</li>

				 <!-- Navbar dropdown -->
		        <li class="nav-item dropdown disabled">
					<a
						class="nav-link dropdown-toggle "
						href="#"
						id="navbarDropdown"
						role="button"
						data-toggle="dropdown"
						aria-expanded="false"
						><strike>Ingredientes</strike>
					</a>
					<!-- Contenido navbar dropdown -->
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a href="#" class="dropdown-item">Administrar Ingredientes</a></li>
						<li><a href="#" class="dropdown-item">Administrar Categorías</a></li>
					</ul>
				</li>

				 <!-- Navbar dropdown -->
		        <li class="nav-item dropdown disabled">
					<a
						class="nav-link dropdown-toggle "
						href="#"
						id="navbarDropdown"
						role="button"
						data-toggle="dropdown"
						aria-expanded="false"
						><strike>Productos</strike>
					</a>
					<!-- Contenido navbar dropdown -->
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a href="#" class="dropdown-item">Administrar Productos</a></li>
						<li><a href="#" class="dropdown-item">Administrar Categorías</a></li>
					</ul>
				</li>

				<li class="nav-item disabled">
					<a href="#" class="nav-link"><strike>Clientes</strike></a>
				</li>

				<!-- Navbar dropdown -->
		        <li class="nav-item dropdown disabled">
					<a
						class="nav-link dropdown-toggle "
						href="#"
						id="navbarDropdown"
						role="button"
						data-toggle="dropdown"
						aria-expanded="false"
						><strike>Ventas</strike>
					</a>
					<!-- Contenido navbar dropdown -->
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a href="#" class="dropdown-item">Administrar Ventas</a></li>
						<li><a href="#" class="dropdown-item">Generar Venta</a></li>
					</ul>
				</li>

				<!-- Navbar dropdown -->
		        <li class="nav-item dropdown disabled">
					<a
						class="nav-link dropdown-toggle "
						href="#"
						id="navbarDropdown"
						role="button"
						data-toggle="dropdown"
						aria-expanded="false"
						><strike>Reabastecer</strike>
					</a>
					<!-- Contenido navbar dropdown -->
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a href="#" class="dropdown-item">Administrar Solicitudes</a></li>
						<li><a href="#" class="dropdown-item">Generar Solicitud</a></li>
					</ul>
				</li>

			</ul>




			<ul class="navbar-nav">
				<!-- Icon dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
						<i class="colombia flag m-0"></i>
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li>
							<a class="dropdown-item" href="#"><i class="colombia flag"></i>Español
								<i class="fa fa-check text-success ml-2"></i></a>
							</li>
							<li><hr class="dropdown-divider"></li>
							<li>
								<a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English</a>
							</li>
							
						</ul>
					</li>
					<!-- Avatar -->
					<li class="nav-item dropdown" >
						<a  class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
							<img style="border-color: #92e6ff; border-style: solid; border-width: 1px;" src="Assets/img/test/iconpedia.jpg" class="rounded-circle" height="22" alt="" loading="lazy">
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">Perfil</a></li>
							<li><a class="dropdown-item" href="#">Ajustes</a></li>
							<li><a class="dropdown-item" href="#">Salir </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
</nav>






</div>


