<?php   session_start();
        
        include "../connection/connection.php";
        include "../lib_core/lib_core.php";
        include "../lib_empresas/lib_empresas.php";
        include "../lib_servicios/lib_servicios.php";
        include "../lib_pagos/lib_pagos.php";
        
        $usuario = $_SESSION['user'];
	    $password = $_SESSION['pass'];
	    
	    if($conn){
	        
	   $sql = $conn->query('select nombre from usuarios where usuario = "'.$usuario.'" and password = "'.$password.'";');
       
     
        while($fila = $sql->fetch()){
             $nombre = $fila['nombre'];
        }
	 
	 }else{
	   
            echo 'No hay conexion';
	   }
	   
	if($usuario == null || $usuario == ''){
	echo '<!DOCTYPE html>
        <html lang="es">
        <head>
        <title>GNU LiHab - Administración de Personal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="../../../img/favicon.png" />';
        skeleton();
       
        echo '</head><body>';
        echo '<br><div class="container">
                <div class="alert alert-danger" role="alert">';
        echo '<p align="center">
		<img src="../icons/status/task-attempt.png"  class="img-reponsive img-rounded"> 
		  Su sesión a caducado. Por favor, inicie sesión nuevamente</p>';
        echo '<a href="../logout.php"><hr>
		<button type="buton" class="btn btn-default btn-block">
		  <img src="../icons/status/dialog-password.png"  class="img-reponsive img-rounded"> Iniciar</button></a>';	
        echo "</div></div>";
        die();
        echo '</body></html>';
	}




?>


<!DOCTYPE html>
<html lang="es">
<head>
  <title>My Bill - Administración y Control de Cuentas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>
  
   <!-- Data Table Script -->
<script>
 $(document).ready(function(){
      $('#myTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });
  </script>
  <!-- END Data Table Script -->
  
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
<!--  side bar    -->
    <div class="col-sm-2 sidenav">
      <br>
      <div class="panel-group">
        <div class="panel panel-default">
        <div class="panel-heading">
            <img class="img-reponsive img-rounded" src="../icons/categories/preferences-desktop-peripherals.png" /> Menú</div>
      <div class="panel-body">

      <!--  collapse  -->
      <form action="#" method="POST">
      
       <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Empresas</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
        <li class="list-group-item">
            <button type="submit" class="btn btn-default btn-block" name="empresas">
                <img class="img-reponsive img-rounded" src="../icons/actions/view-choose.png" /> Listar</button>
        </li>
        <li class="list-group-item">
            <button type="submit" class="btn btn-default btn-block" name="historico_empresas">
                <img class="img-reponsive img-rounded" src="../icons/actions/view-calendar.png" /> Histórico</button>
        </li>
      </ul>
      
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Servicios</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
        
            <li class="list-group-item">
            <button type="submit" class="btn btn-default btn-block" name="servicios">
                <img class="img-reponsive img-rounded" src="../icons/actions/view-choose.png" /> Listar</button>
        </li>
        <li class="list-group-item">
            <button type="submit" class="btn btn-default btn-block" name="historico_servicios">
                <img class="img-reponsive img-rounded" src="../icons/actions/view-calendar.png" /> Histórico</button>
        </li>
        
      </ul>
      
      </div>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Pagos</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
      
      <ul class="list-group">
        
        <li class="list-group-item">
            <button type="submit" class="btn btn-default btn-block" name="pagos">
                <img class="img-reponsive img-rounded" src="../icons/actions/view-choose.png" /> Listar</button>
        </li>
        <li class="list-group-item">
            <button type="submit" class="btn btn-default btn-block" name="historico_pagoss">
                <img class="img-reponsive img-rounded" src="../icons/actions/view-calendar.png" /> Histórico</button>
        </li>
        
      </ul>
      
      </div>
    </div>
  </div>
  
  </form>
  
  <hr>
  <form action="#" method="POST">
    <button type="submit" class="btn btn-danger btn-block" name="exit">
    <img class="img-reponsive img-rounded" src="../icons/actions/system-shutdown.png" /> Salir</button>
  </form>
  
</div> 
      
      
<!-- end collapse -->
      </div>
    </div>
      
    </div>
    </div>
<!-- end side bar -->

    <div class="col-sm-10"><br>
        <form action="#" method="POST">
        <button type="submit" class="btn btn-default btn-block" name="home">
                <img class="img-reponsive img-rounded" src="../icons/actions/go-home.png" /> Home</button>
        </form><br>
      <div class="alert alert-success">
      <h4>Bienvenido/a <small><?php echo $nombre; ?></small></h4>
      </div>
      <hr>
      
<!-- main -->
      
      <?php 
      if($conn){
        
        if(isset($_POST['home'])){
            echo '<a href="main.php"></a>';
        }
        if(isset($_POST['exit'])){
           echo '<div class="alert alert-success">
            <strong>Hasta Luego!</strong>
            <meta http-equiv="refresh" content="3;URL=../logout.php "/>
            </div>';
        }
        
        // ============ EMPRESAS ============= //
        
        if(isset($_POST['empresas'])){
            empresas($conn);            
        }
        if(isset($_POST[nueva_empresa])){
            formNewEmpresa();
        }
        if(isset($_POST['add_empresa'])){
            $cod_empresa = $_POST['cod_empresa'];
            $descripcion = $_POST['descripcion'];
            addNewEmpresa($cod_empresa,$descripcion,$conn);
        }
        if(isset($_POST['editar_empresa'])){
            $id = $_POST['id'];
            formEditEmpresa($id,$conn);
        }
        if(isset($_POST['update_empresa'])){
            $id = $_POST['id'];
            $cod_empresa = $_POST['cod_empresa'];
            $descripcion = $_POST['descripcion'];
            editEmpresa($id,$cod_empresa,$descripcion,$conn);
        }
        if(isset($_POST['borrar_empresa'])){
            $id = $_POST['id'];
            formEliminarEmpresa($id,$conn);
        }
        if(isset($_POST['delete_empresa'])){
            $id = $_POST['id'];
            deleteEmpresa($id,$conn);
        }
        
        // ============= END EMPRESAS =============== //
        
        // ============ SERVICIOS ============= //
        if(isset($_POST['servicios'])){
            servicios($conn);
        }
        if(isset($_POST['nuevo_servicio'])){
            formNewServicio();
        }
        if(isset($_POST['add_servicio'])){
            $cod_cliente = $_POST['cod_cliente'];
            $descripcion = $_POST['descripcion'];
            addNewServicio($cod_cliente,$descripcion,$conn);
        }
        if(isset($_POST['editar_servicio'])){
            $id = $_POST['id'];
            formEditServicio($id,$conn);
        }
        if(isset($_POST['update_servicio'])){
            $id = $_POST['id'];
            $cod_servicio = $_POST['cod_cliente'];
            $descripcion = $_POST['descripcion'];
            editServicio($id,$cod_servicio,$descripcion,$conn);
        }
        if(isset($_POST['borrar_servicio'])){
            $id = $_POST['id'];
            formEliminarServicio($id,$conn);
        }
        if(isset($_POST['delete_servicio'])){
            $id = $_POST['id'];
            deleteServicio($id,$conn);
        }
        
        // ============= END SERVICIOS =============== //
        
        // ============ PAGOS ============= //
        if(isset($_POST['pagos'])){
            pagos($conn);
        }
        
        
      
      }else{
      
        echo "No tenemos conexion";
      }
      
      
      
      
      
      ?>
<!-- end main -->
    </div>
</div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
