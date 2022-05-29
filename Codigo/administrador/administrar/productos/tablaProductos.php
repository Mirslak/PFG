<?php
    //Incluimos el conector a la Base de datos 
    include "../../../database/conexion.php";


    //Incluimos el fichero donde están las funciones
    include '../../includes/DAO/DAO_Productos.php';

?>

<div class="row">
	<div class="col-sm-12">
		<table width="100%" class="display" id="example" cellspacing="0">
			<table class="table table-hover table-striped table-bordered table-sm" id="TablaProductos">
				<thead>
					<tr style="text-align: center; border: white 1px solid; background: green; color: white;">
						<td>#</td>	
						<td>Nombre</td>
						<td>Precio</td>
						<td>Descripción</td>
						<td>Marca</td>
						<td>Editar</td>
						<td>Eliminar</td>
					</tr>
				</thead>
				<tbody>
					<?php
						//Contador
						$i=0;

    						$consulta = mostrarProductos($conexion);
						
						//Recorreremos la tabla de los usuarios y mostraremos sus datos
						while($mostrar = mysqli_fetch_array($consulta)) {


							//Aumentamos el contador
							$i++;
							$id_producto=$mostrar['id_producto'];
                			?>
						<tr style="text-align: center;">
							<td><strong><?php echo $i ?></strong></td>
							<td><strong><?php echo $mostrar['nombre']; ?></strong></td>
							<td><strong><?php echo $mostrar['precio']; ?></strong></td>
							<td><strong><?php echo $mostrar['descripcion']; ?></strong></td>
							<td><strong><?php echo $mostrar['marca']; ?></strong></td>
							<td>
								<a class="btn btn-warning btn-sm" href="editarProductos.php?id=<?php echo $id_producto; ?>">
								<span class="fas fa-edit"></span>
								</a>
							</td>
							<td> 
								<a class="btn btn-danger btn-sm" onClick="return confirm('¿Estas seguro de que quieres eliminar este Producto?');" href="eliminarProductos.php?id=<?php echo $id_producto; ?>">
								<span class="fas fa-trash-alt"></span>
								</a> 
							</td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#TablaProductos').DataTable({
			language : {
				url : "../../plugins/es-ES.json"
			}
		});
	});
</script>