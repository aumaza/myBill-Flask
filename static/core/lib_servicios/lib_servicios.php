<?php

// ===================== LISTADOS ===================== //
/*
** funcion lista todas las empresas
*/
function servicios($conn){

if($conn){
	
	$sql = $conn->query('select * from servicios;');
	
	$count = 0;
	echo '<div class="container">
          <div class="alert alert-info">
            <strong>Servicios</strong>
          </div>
          <div class="table-responsive"><br>';
            
            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Código Servicio</th>
		    <th class='text-nowrap text-center'>Servicio</th>
		    <th>&nbsp;</th>
		    </thead>";


	while($fila = $sql->fetch()){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['cod_servicio']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td class='text-nowrap'>";
			 
			 echo '<form action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                    
                <button type="submit" class="btn btn-primary btn-sm" name="editar_servicio">
                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar</button>
                <button type="submit" class="btn btn-danger btn-sm" name="borrar_servicio">
                    <img class="img-reponsive img-rounded" src="../icons/actions/trash-empty.png" /> Eliminar</button>
              </form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form action="#" method="POST">
                <button type="submit" class="btn btn-success btn-sm" name="nuevo_servicio">
                    <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Servicio</button>
              </form><hr>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Servicios:  ' .$count; echo '</button>';
		echo '</div></div>';
		}else{
		  echo 'Connection Failure...';
		}

    

}


//========================== FORMULARIOS ==========================//
/*
** formulario de alta de empresas
*/

function formNewServicio(){


    echo ' <form action="#" method="POST">
  <div class="container">
  <div class="panel panel-primary">
  <div class="panel-heading" align="center">Nuevo Servicio</div>
  <div class="panel-body">
  
  <div class="form-group">
    <label for="email">Código Cliente:</label>
    <input type="text" class="form-control" id="empresa"  name="cod_cliente" required>
  </div>
  
  <div class="form-group">
    <label for="pwd">Descripción:</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
  </div><hr>
  
 
  
  <button type="submit" class="btn btn-default" name="add_servicio">
    <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar</button>
</form>

</div></div></div>'; 

}

/*
** formulario de edicion de empresas
*/

function formEditServicio($id,$conn){

    $sql = $conn->query('select * from servicios where id = "'.$id.'";');
       
     
        while($fila = $sql->fetch()){
             $cod_empresa = $fila['cod_servicio'];
             $descripcion = $fila['descripcion'];
        }

    echo ' <form action="#" method="POST">
            <input type="hidden" name="id" value="'.$id.'">
 
 <div class="container">
  <div class="panel panel-primary">
  <div class="panel-heading" align="center">Editar Servicio</div>
  <div class="panel-body">
  
  <div class="form-group">
    <label for="email">Código Cliente:</label>
    <input type="text" class="form-control" id="empresa" name="cod_cliente" value="'.$cod_servicio.'" required>
  </div>
  
  <div class="form-group">
    <label for="pwd">Descripción:</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="'.$descripcion.'" required>
  </div><hr>
  
 
  
  <button type="submit" class="btn btn-default" name="update_servicio">
    <img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok.png" /> Actualizar</button>
</form>

</div></div></div>'; 

}


/*
** funcion para eliminar un registro de empresa
*/
function formEliminarServicio($id,$conn){

        $sql = $conn->query('select * from servicios where id = "'.$id.'";');
       
     
        while($fila = $sql->fetch()){
             $descripcion = $fila['descripcion'];
        }
            
            echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-danger">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/status/security-low.png" /> Servicios - Eliminar Registro</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                <div class="alert alert-danger">
		  <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por eliminar el registro: <strong>'.$descripcion.'</strong></p>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="delete_servicio">Aceptar</button><br>
            
            </form>
	      <a href="main.php"><button type="button" class="btn btn-danger btn-block">Cancelar</button></a>
            </div>
            </div>
            
            </div>
            </div>
            </div>';
}

// ============================ PERSISTENCIA ======================= //
/*
** persistencia de en base de datos
*/
function addNewServicio($cod_cliente,$descripcion,$conn){
    
    $sql = $conn->query('select cod_servicio, descripcion from servicios where cod_servicio = "'.$cod_cliente.'" or descripcion = "'.$descripcion.'";');
    $count = 0;
    while($filas = $sql->fetch()){
       $count++;
    }
    
             
    if($count == 0){
            
           
           $insert = 'INSERT INTO servicios (cod_servicio,descripcion) VALUES("'.$cod_servicio.'", "'.$descripcion.'")';
           $stmt = $conn->prepare($insert);
                     
             $resval = $stmt->execute();
                
               
            if($resval){
            
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Registro Agregado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			   
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Agregar el Registro. ';
			    echo "</div>";
			    echo "</div>";
		    }
		    }else{
		    
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Ya existe registro de esa Empresa. Verifique el Código de Servicio o la Descripción de la misma. No puede haber dos Servicios con la misma Descripción o Código';
			    echo "</div>";
			    echo "</div>";
			    exit;
		    
		    }

}

/*
** persistencia de en base de datos
*/
function editServicio($id,$cod_servicio,$descripcion,$conn){
    
         
           $update = 'update servicios set cod_servicio = "'.$cod_servicio.'", descripcion =  "'.$descripcion.'" where id = "'.$id.'"';
           $stmt = $conn->prepare($update);
          
           
             $resval = $stmt->execute();
                
               
            if($resval){
            
            echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Registro Aactualizado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			   
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Actualizar el Registro. ';
			    echo "</div>";
			    echo "</div>";
		    }

}

/*
** funcion que elimina registro de empresas
*/
function deleteServicio($id,$conn){

    $delete = 'delete from servicios where id = "'.$id.'"';
    $stmt = $conn->prepare($delete);
    $resval = $stmt->execute();
    
    if($resval){
		    echo "<br>";
		    echo '<div class="container">';
		    echo '<div class="alert alert-success" alert-dismissible">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		    echo '<img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok-apply.png" /> Registro Eliminado Satisfactoriamente.';
		    echo "</div>";
		    echo "</div>";
    }else{
			    echo "<br>";
			    echo '<div class="container">';
			    echo '<div class="alert alert-warning" alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Hubo un problema al Eliminar el Registro.'  .mysqli_error($conn);
			    echo "</div>";
			    echo "</div>";
		    }

}

?>
