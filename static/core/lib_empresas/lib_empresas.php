<?php


/*
** funcion lista todas las empresas
*/
function empresas($conn){

if($conn){
	
	$sql = $conn->query('select * from empresas;');
	
	$count = 0;
	echo '<div class="container">
          <div class="alert alert-info">
            <strong>Empresas</strong>
          </div>
          <div class="table-responsive"><br>';
            
            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Código Empresa</th>
		    <th class='text-nowrap text-center'>Empresa</th>
		    <th>&nbsp;</th>
		    </thead>";


	while($fila = $sql->fetch()){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['cod_empresa']."</td>";
			 echo "<td align=center>".$fila['descripcion']."</td>";
			 echo "<td class='text-nowrap'>";
			 
			 echo '<form action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                    
                <button type="submit" class="btn btn-primary btn-sm" name="editar_empresa">
                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar</button>
                <button type="submit" class="btn btn-danger btn-sm" name="borrar_empresa">
                    <img class="img-reponsive img-rounded" src="../icons/actions/trash-empty.png" /> Eliminar</button>
              </form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form action="#" method="POST">
                <button type="submit" class="btn btn-success btn-sm" name="nueva_empresa">
                    <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Empresa</button>
              </form><hr>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Empresas:  ' .$count; echo '</button>';
		echo '</div></div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}



//========================== FORMULARIOS ==========================//
/*
** formulario de alta de empresas
*/

function formNewEmpresa(){


    echo ' <form action="#" method="POST">
  <div class="container">
  <div class="panel panel-primary">
  <div class="panel-heading" align="center">Nueva Empresa</div>
  <div class="panel-body">
  
  <div class="form-group">
    <label for="email">Código Empresa:</label>
    <input type="text" class="form-control" id="empresa" maxlength="4" minlength="4" name="cod_empresa" required>
  </div>
  
  <div class="form-group">
    <label for="pwd">Descripción:</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
  </div><hr>
  
 
  
  <button type="submit" class="btn btn-default" name="add_empresa">
    <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar</button>
</form>

</div></div></div>'; 

}


/*
** formulario de edicion de empresas
*/

function formEditEmpresa($id,$conn){

    $sql = $conn->query('select * from empresas where id = "'.$id.'";');
       
     
        while($fila = $sql->fetch()){
             $cod_empresa = $fila['cod_empresa'];
             $descripcion = $fila['descripcion'];
        }

    echo ' <form action="#" method="POST">
            <input type="hidden" name="id" value="'.$id.'">
 
 <div class="container">
  <div class="panel panel-primary">
  <div class="panel-heading" align="center">Editar Empresa</div>
  <div class="panel-body">
  
  <div class="form-group">
    <label for="email">Código Empresa:</label>
    <input type="text" class="form-control" id="empresa" maxlength="4" minlength="4" name="cod_empresa" value="'.$cod_empresa.'" required readonly>
  </div>
  
  <div class="form-group">
    <label for="pwd">Descripción:</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" value="'.$descripcion.'" required>
  </div><hr>
  
 
  
  <button type="submit" class="btn btn-default" name="update_empresa">
    <img class="img-reponsive img-rounded" src="../icons/actions/dialog-ok.png" /> Actualizar</button>
</form>

</div></div></div>'; 

}


/*
** funcion para eliminar un registro de empresa
*/
function formEliminarEmpresa($id,$conn){

        $sql = $conn->query('select * from empresas where id = "'.$id.'";');
       
     
        while($fila = $sql->fetch()){
             $descripcion = $fila['descripcion'];
        }
            
            echo '<div class="container">
		    <div class="row">
		      <div class="col-sm-8">
            
            <div class="panel panel-danger">
	      <div class="panel-heading">
		<img class="img-reponsive img-rounded" src="../icons/status/security-low.png" /> Empresas - Eliminar Registro</div>
            <div class="panel-body">
            
            <form action="main.php" method="POST">
	      <input type="hidden" class="form-control" name="id" value="'.$id.'">
            
                <div class="alert alert-danger">
		  <img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> <strong>Atención!</strong><hr>
		    <p>Está por eliminar el registro: <strong>'.$descripcion.'</strong></p>
		    <p>Si está seguro, presione Aceptar, de lo contrario presione Cancelar.</p>
                </div><hr>
            
            <button type="submit" class="btn btn-success btn-block" name="delete_empresa">Aceptar</button><br>
            
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
function addNewEmpresa($cod_empresa,$descripcion,$conn){
    
    $sql = $conn->query('select cod_empresa, descripcion from empresas where cod_empresa = "'.$cod_empresa.'" or descripcion = "'.$descripcion.'";');
    $count = 0;
    while($filas = $sql->fetch()){
       $count++;
    }
    
             
    if($count == 0){
            
           
           $insert = 'INSERT INTO empresas (cod_empresa,descripcion) VALUES("'.$cod_empresa.'", "'.$descripcion.'")';
           $stmt = $conn->prepare($insert);
           
          // $stmt->bindParam(':cod_empresa', $cod_empresa);
          // $stmt->bindParam(':descripcion', $descripcion);
           
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
			    echo '<img class="img-reponsive img-rounded" src="../icons/status/task-attempt.png" /> Ya existe registro de esa Empresa. Verifique el Código de Empresa o la Descripción de la misma. No puede haber dos Empresas con la misma Descripción o Código';
			    echo "</div>";
			    echo "</div>";
			    exit;
		    
		    }

}


/*
** persistencia de en base de datos
*/
function editEmpresa($id,$cod_empresa,$descripcion,$conn){
    
         
           $update = 'update empresas set cod_empresa = "'.$cod_empresa.'", descripcion =  "'.$descripcion.'" where id = "'.$id.'"';
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
function deleteEmpresa($id,$conn){

    $delete = 'delete from empresas where id = "'.$id.'"';
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
