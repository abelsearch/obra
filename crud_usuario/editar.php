<?php
include "../db_config.php";

if($_POST['edit_id'])
{
$id = $_POST['edit_id'];
try{ 
$stmt=$db_con->prepare("SELECT * FROM usuario WHERE id=:id");
if($stmt->execute(array(':id'=>$id)))
{
$response = "<center><form>";
//while( $row = mysqli_fetch_array($result) )
$row=$stmt->fetch(PDO::FETCH_ASSOC);{
$id = $row['id'];
$nombre=$row['nombre']; 
$password=$row['password'];  
$tipo=$row['tipo'];
 
 //$response .= "<div class=".'form-group'.">";
 $response .= "<input type=".'hidden'." id=".'id'."  value=".$id.">";
 //$response .= "</div>"; 

 //$response .= "<center>";
 $response .= "<b>Nombre:</b> <input type=".'text'." id=".'nombre2'."  value='".$nombre."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</center>";

 //$response .= "<tr>";
 $response .= "<b>Password:</b> <input type=".'text'." id=".'password2'." value='".$password."' style=".'border:none;'."".'text-align:center;'.">";
 //$response .= "</tr>";

 //$response .= "<tr>";
 $response .= "<b>Tipo de usuario:</b> <input type=".'text'."  value='".$tipo."' style=".'border:none;'."".'text-align:center;'." readonly>";
 //$response .= "</tr>"; 


}
$response .= "</form></center>";

echo $response; 
} 
else{
	echo "Ocurrio un problema";
} 

}
catch(PDOException $e){
	echo $e->getMessage();
}

}

