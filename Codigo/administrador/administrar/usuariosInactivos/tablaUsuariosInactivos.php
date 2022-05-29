<?php
    //Incluimos el conector a la Base de datos 
    include "../../../database/conexion.php";
    
    //Incluimos el fichero donde están las funciones
	include "../../includes/DAO/DAO_Usuarios.php";

?>

<div class="row">
	<div class="col-sm-12">
		<table width="100%" class="display" id="example" cellspacing="0">
			<table class="table table-hover table-striped table-bordered table-sm" id="TablaUsuariosInactivos">
				<thead>
					<tr style="text-align: center; border: white 1px solid; background: green; color: white;">
						<td>#</td>	
						<td>Usuario</td>
						<td>Nombre</td>
						<td>Apellido1</td>
						<td>Apellido2</td>
						<td>Email</td>
                        <td>DNI</td>
						<td>Teléfono</td>
						<td>ROL</td>
						<td>Editar</td>
						<td>Eliminar</td>
					</tr>
				</thead>
				<tbody>
					<?php
						//Contador
						$i=0;

    						$consulta = mostrarUsuariosInactivos($conexion);
						
						//Recorreremos la tabla de los usuarios y mostraremos sus datos
						while($mostrar = mysqli_fetch_array($consulta)) {


							//Aumentamos el contador
							$i++;
							$id_usuario=$mostrar['id'];
                			?>
						<tr style="text-align: center;">
							<td><strong><?php echo $i ?></strong></td>
							<td><strong><?php echo $mostrar['user']; ?></strong></td>
							<td><strong><?php echo $mostrar['nombre']; ?></strong></td>
							<td><strong><?php echo $mostrar['apellido1']; ?></strong></td>
							<td><strong><?php echo $mostrar['apellido2']; ?></strong></td>
							<td><strong><?php echo $mostrar['email']; ?></strong></td>
							<td><strong><?php echo $mostrar['dni']; ?></strong></td>
							<td><strong><?php echo $mostrar['telefono']; ?></strong></td>
							<td><strong><?php if($mostrar['rol_usuario'] == 1){ echo "Administrador";}else{ echo "Usuario";}  ?></strong></td>
							<td>
								<a class="btn btn-warning btn-sm" href="editarUsuarioInactivo.php?id=<?php echo $id_usuario; ?>">
								<span class="fas fa-edit"></span>
								</a>
							</td>
							<td> 
								<a class="btn btn-danger btn-sm" onClick="return confirm('¿Estas seguro de que quieres eliminar este usuario?');" href="eliminarUsuario.php?id=<?php echo $id_usuario; ?>">
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
		$('#TablaUsuariosInactivos').DataTable({
			language : {
				url : "../../plugins/es-ES.json"
			}
		});
	});
</script>