<?php
   ## BASE DE DATOS
   include '../../../includes/database.php';

   ## LECTURA DE VALOR
   $draw = $_POST['draw'];
   $row = $_POST['start'];
   $rowperpage = $_POST['length']; // Filas por página
   $columnIndex = $_POST['order'][0]['column']; // Índice de columna
   $columnName = $_POST['columns'][$columnIndex]['data']; // Columna
   $columnSortOrder = $_POST['order'][0]['dir']; // ASC O DESC
   $searchValue = $_POST['search']['value']; // Valor de búsqueda

   ## BUSCAR
   $searchQuery = " ";
   if($searchValue != ''){
      $searchQuery = " and (usuario like '%".$searchValue."%' or
      nombre like '%".$searchValue."%' or
      apellido1 like '%".$searchValue. "%' or
      apellido2 like '%".$searchValue. "%' or
      dni like '%".$searchValue. "%' or
      correo like '%".$searchValue. "%' or
      telefono like '%".$searchValue. "%' or
      fechaValidez like '%".$searchValue. "%')";
   }

   ## Número total de sin filtrar
   $sel = $base_de_datos->query("select count(*) as allcount from usuarios");
   $records = $sel->fetch(PDO::FETCH_OBJ);
   $totalRecords = $records->allcount;

   ## Número total de filtrados
   $sel = $base_de_datos->query("select count(*) as allcount from usuarios WHERE 1".$searchQuery);
   $records = $sel->fetch(PDO::FETCH_OBJ);
   $totalRecordwithFilter = $records->allcount;

   ## Fetch Resultados
   $empQuery = "select * from usuarios WHERE 1".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
   $empRecords = $base_de_datos->query($empQuery);
   $usuarios = $empRecords->fetchAll(PDO::FETCH_OBJ);
   $data = array();

   foreach($usuarios as $usuario){
      $data[] = array(
         "usuario"=>$usuario->usuario,
         "nombre"=>$usuario->nombre,
         "apellido1"=>$usuario->apellido1,
         "apellido2"=>$usuario->apellido2,
         "dni"=>$usuario->dni,
         "correo"=>$usuario->correo,
         "telefono"=>$usuario->telefono,
         "fechaValidez"=>$usuario->fechaValidez,
      );
   }

   ## Response de JSON
   $response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
   );

   echo json_encode($response);
?>