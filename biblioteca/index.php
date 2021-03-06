<!DOCTYPE html>
<html lang="en">
  <header>  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meeta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css"  href="Css/styles.css"> 
  </header>
 
 <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-4 me-0 px-3" href="#">Sistema de Biblioteca IU Digital</a>
  <img src="images/IUDigital.png">
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Consultar Libro</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="view/agregar.php">Agregar Libro</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="view/prestar.php">Prestar Libro</a>
                </div>
            </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-lg-end pt-3 pb-2 mb-3 border-bottom">
          <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">configuraci??n</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            Calendario
          </button>
 <! ?????? formulario??????>


   <! ?????? fin formulario??????>

      <div class="table-responsive">
         <h2>Secci??n de consulta</h2>
<form class="row g-3 needs-validation" novalidate method="POST" action="controller/agregarController.php">
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Autor</label>
    <input type="text" class="form-control" id="autor" value="por favor digite autor" required>
    <div class="valid-feedback">
       Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Libro</label>
    <input type="text" class="form-control" id="libro" value="por favor digite Libro" required>
    <div class="valid-feedback">
       Looks good!
    </div>
  </div>
 <div class="col-md-4">
    <label for="validationCustom01" class="form-label">C??digo de libro</label>
    <input type="text" class="form-control" id="codLib" value="por favor digite ejemplar" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="Buscar" value="Buscar">Iniciar b??squeda</button>
  </div>
</form>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">codigo</th>
              <th scope="col">titulo</th>
              <th scope="col">autor</th>
              <th scope="col">ISBN</th>
              <th scope="col">paginas</th>
            </tr>
       
            <tr>
                <td><?php echo $rows['codL'];?></td>
                <td><?php echo $rows['titulo'];?></td>
                <td><?php echo $rows['autor'];?></td>
                <td><?php echo $rows['isbn'];?></td>
                <td><?php echo $rows['paginas'];?></td>

            </tr>
            <?php
             ?>
        </table>
      </div>
      </div>
     
    </main>
  </div>
</div>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  </body>
</html>
