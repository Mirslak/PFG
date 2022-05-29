<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php   

 include "../database/conexion.php";
 include "../DAO/Factura.php";

     //recojo la ruta del archivo conexión
     $ruta = '../database/conexion.php';
     //si no existe el archivo conexión nos redirige a la pagina de instalación
     if(!file_exists($ruta)){
          echo"<script>window.open('../../instalacion/index.php','_self')</script>";
     }

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Compra</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <!-- Font Awesome -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      </head>  
      <body>  
     <nav class="navbar navbar-default" style="background-color:#dc3545 ;">
          <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand " href="../index.php"><img src="../../Imagenes/img-read/Distribuciones.png" width="30" alt=""></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php" style="color:#f1f1f1"><span class="fas fa-home" style="color: yellow"></span> Inicio</a></li>
                    <li><a href="../sesion/cuenta.php" style="color:#f1f1f1"><span class="fas fa-address-card" style="color: yellow"></span> Mi Cuenta</a></li>
                    <li><a href="../sesion/logout.php" style="color:#f1f1f1"><span class="fas fa-power-off"></span> Salir</a></li>
               </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
          </nav>


           <div class="container" style="width:800px;">  
               <div align="center">
                    <h2 class="text-success fw-bold fs-1 mt-5 mb-5">ZONA DE COMPRA</h2>
               </div>

                <ul class="nav nav-tabs">  
                     <li class="active"><a data-toggle="tab" href="#products">PRODUCTOS</a></li>  
                     <li><a data-toggle="tab" href="#cart">CARRITO <span class="badge"><?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]); } else { echo '0';}?></span></a></li>  
                </ul>  
                <div class="tab-content">  
                     <div id="products" class="tab-pane fade in active">  
                     <?php  
                     $query = "SELECT * FROM producto ORDER BY id_producto ASC";  
                     $result = mysqli_query($conexion, $query);  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                     <div class="col-md-4" style="margin-top:12px;">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">  
                               <img src="../../Imagenes/productos/<?php echo $row["foto"]; ?>" class="img-responsive"/><br />  
                               <h4 class="text-info"><?php echo $row["nombre"]; ?></h4>  
                               <h4 class="text-danger"> <?php echo $row["precio"]; ?> €</h4>  
                               <input type="text" name="quantity" id="quantity<?php echo $row["id_producto"]; ?>" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" id="name<?php echo $row["id_producto"]; ?>" value="<?php echo $row["nombre"]; ?>" />  
                               <input type="hidden" name="hidden_price" id="price<?php echo $row["id_producto"]; ?>" value="<?php echo $row["precio"]; ?>" />  
                               <input type="button" name="add_to_cart" id="<?php echo $row["id_producto"]; ?>" style="margin-top:5px;" class="btn btn-warning form-control add_to_cart" value="AÑADIR AL CARRO" />  
                          </div>  
                     </div>  
                     <?php  
                     }  
                     ?>  
                     </div>  <div id="cart" class="tab-pane fade">  
                          <div class="table-responsive" id="order_table">  
                               <table class="table table-bordered">  
                                    <tr>  
                                         <th width="40%">Nombre del producto</th>  
                                         <th width="10%">Cantidad</th>  
                                         <th width="20%">Precio</th>  
                                         <th width="15%">Total</th>  
                                         <th width="5%">Ación</th>  
                                    </tr>  
                                    <?php  
                                    if(!empty($_SESSION["shopping_cart"]))  
                                    {  
                                         $total = 0;  
                                         foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                         {                                               
                                    ?>  
                                    <tr>  
                                         <td><?php echo $values["product_name"]; ?></td>  
                                         <td><input type="text" name="quantity[]" id="quantity<?php echo $values["id_producto"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["id_producto"]; ?>" class="form-control quantity" /></td>  
                                         <td align="right"> <?php echo $values["precio"]; ?> €</td>  
                                         <td align="right"> <?php echo number_format($values["product_quantity"] * $values["precio"], 2); ?> €</td>  
                                         <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Eliminar</button></td>  
                                    </tr>  
                                    <?php  
                                              $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                                         }  
                                    ?>  
                                    <tr>  
                                         <td colspan="3" align="right">Total</td>  
                                         <td align="right">€ <?php echo number_format($total, 2); ?></td>  
                                         <td></td>  
                                    </tr>  
                                    <tr>  
                                         <td colspan="5" align="center">  
                                              <form method="post" action="factura.php">  
                                                   <input type="submit" name="factura" class="btn btn-warning" value="Place Order" />  
                                              </form>  
                                         </td>  
                                    </tr>  
                                    <?php  
                                    }  
                                    ?>  
                               </table>  
                          </div>  
                     </div>  
                </div>  
           </div>  
           <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(data){  
      $('.add_to_cart').click(function(){  
           var product_id = $(this).attr("id");  
           var product_name = $('#name'+product_id).val();  
           var product_price = $('#price'+product_id).val();  
           var product_quantity = $('#quantity'+product_id).val();  
           var action = "add";  
           if(product_quantity > 0)  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          product_id:product_id,   
                          product_name:product_name,   
                          product_price:product_price,   
                          product_quantity:product_quantity,   
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                          swal("Producto añadido correctamente", "", "success");
                     }  
                });  
           }  
           else  
           {  
               swal("Introduzca una cantidad", "Ha selecionado un producto sin cantidad.", "warning");
           }  
      });  
      $(document).on('click', '.delete', function(){  
           var product_id = $(this).attr("id");  
           var action = "remove";  

          swal({
          title: "¿Está seguro?",
          text: "Esto eliminará el producto de su lista.",
          icon: "warning",
          buttons: ["Cancelar", "Aceptar"],
          })
          .then((willDelete) => {
          if (willDelete) {
               $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                     }  
                });  
               swal("El producto ha sido eliminado", {
                    icon: "success",
               });
          } else {
          swal("No hemos eliminado su producto.");
          }
          });
      });  
      $(document).on('keyup', '.quantity', function(){  
           var product_id = $(this).data("product_id");  
           var quantity = $(this).val();  
           var action = "quantity_change";  
           if(quantity != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, quantity:quantity, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  
 });  
 </script>


</body>
</html>
<?php
if(isset( $_POST['factura'])){

     echo "<script>
          swal({
          title: 'Pedido realizado con exito',
          text: 'Generando la factura',
          icon: 'success',
          });
         </script>";
     
         echo'<meta http-equiv="Refresh" content="1;url=factura.php">';
}
?>
