<?php

// ===================== LISTADOS ===================== //
/*
** funcion lista todas los pagos
*/
function pagos($conn){

if($conn){
	
	$sql = $conn->query('select * from pagos;');
	
	$count = 0;
	echo '<div class="container">
          <div class="alert alert-info">
            <strong>Pagos Realizados</strong>
          </div>
          <div class="table-responsive"><br>';
            
            echo "<table class='display compact' style='width:100%' id='myTable'>";
              echo "<thead>
		    <th class='text-nowrap text-center'>Servicio</th>
		    <th class='text-nowrap text-center'>Empresa</th>
		    <th class='text-nowrap text-center'>Primer Venc.</th>
		    <th class='text-nowrap text-center'>Segundo Venc.</th>
		    <th class='text-nowrap text-center'>Fecha de Pago</th>
		    <th class='text-nowrap text-center'>Importe</th>
		    <th>&nbsp;</th>
		    </thead>";


	while($fila = $sql->fetch()){
			  // Listado normal
			 echo "<tr>";
			 echo "<td align=center>".$fila['servicio']."</td>";
			 echo "<td align=center>".$fila['empresa']."</td>";
			 echo "<td align=center>".$fila['vencimiento_1']."</td>";
			 echo "<td align=center>".$fila['vencimiento_2']."</td>";
			 echo "<td align=center>".$fila['f_pago']."</td>";
			 echo "<td align=center>".$fila['monto']."</td>";
			 echo "<td class='text-nowrap'>";
			 
			 echo '<form action="#" method="POST">
                    <input type="hidden" name="id" value="'.$fila['id'].'">
                    
                <button type="submit" class="btn btn-primary btn-sm" name="editar_pago">
                    <img class="img-reponsive img-rounded" src="../icons/actions/document-edit.png" /> Editar</button>
                <button type="submit" class="btn btn-danger btn-sm" name="borrar_pago">
                    <img class="img-reponsive img-rounded" src="../icons/actions/trash-empty.png" /> Eliminar</button>
              </form>';
			 echo "</td>";
			 $count++;
		}

		echo "</table>";
		echo "<br>";
		echo '<form action="#" method="POST">
                <button type="submit" class="btn btn-success btn-sm" name="nuevo_pago">
                    <img class="img-reponsive img-rounded" src="../icons/actions/list-add.png" /> Agregar Pago</button>
              </form><hr>';
		echo '<button type="button" class="btn btn-primary">Cantidad de Pagos:  ' .$count; echo '</button>';
		echo '</div></div>';
		}else{
		  echo 'Connection Failure...';
		}

    mysqli_close($conn);

}




?>
