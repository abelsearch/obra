<?php
include "../db_config.php";

if($_POST['ver_id'])
{
$id = $_POST['ver_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM cliente WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<table border='0' width='20%'>";
//while( $row = mysqli_fetch_array($result) )
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$id = $row['id'];
$razon_social=$row['razon_social']; 
$nombre_comercial=$row['nombre_comercial']; 
$rfc=$row['rfc']; 
$calle=$row['calle']; 
$colonia=$row['colonia']; 
$numero=$row['numero']; 
$codigo_postal=$row['codigo_postal']; 
$ciudad=$row['ciudad']; 
$estado=$row['estado']; 
$telefono=$row['telefono']; 
$nombre_contacto=$row['nombre_contacto']; 
$correo=$row['correo']; 

 $response .= "<h5>Detalles del Cliente</h5>";

 $response .= "<tr>";
 $response .= "<td>Razón Social : </td><td>".$razon_social."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Nombre Comercial : </td><td>".$nombre_comercial."</td>";
 $response .= "</tr>"; 

  $response .= "<tr>";
 $response .= "<td>RFC : </td><td>".$rfc."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Calle : </td><td>".$calle."</td>";
 $response .= "</tr>"; 

 $response .= "<tr>";
 $response .= "<td>Colonia : </td><td>".$colonia."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Numero : </td><td>".$numero."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Código Postal : </td><td>".$codigo_postal."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Ciudad : </td><td>".$ciudad."</td>";
 $response .= "</tr>"; 

 $response .= "<tr>";
 $response .= "<td>Estado : </td><td>".$estado."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Telefono : </td><td>".$telefono."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Nombre Contacto : </td><td>".$nombre_contacto."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Correo : </td><td>".$correo."</td>";
 $response .= "</tr>"; 

}
$response .= "</table>";

echo $response; 
} 
else{
	echo "Ocurrio un problema";
} 

//exit;
//}

}
catch(PDOException $e){
	echo $e->getMessage();
}

}