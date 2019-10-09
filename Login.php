<?PHP

$conexion = mysqli_connect('localhost', 'monicar', 'PTh1LOap', 'monicar');

$usuario = $_POST["usuario"];
$pass = $_POST["contrasena"];

$Statement = mysqli_prepare($conexion, "SELECT * FROM Datos_Usuario WHERE correo = ? AND contracena = ?");
mysqli_stmt_bind_param($statement, "ss",$usuario,$pass);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement,$id_user,$nombre,$apellido,$correo,$contrasena,$fechanac,$sexo);


$response = array();
$response["succeess"] = false;

while (mysqli_stmt_fetch($statement)) {
    $response["success"] = true;
    $response["nombre"] = $nombre;
    $response["apellido"] = $apellido;
    $response["fechanac"] = $fechanac;
    $response["sexo"] = $sexo;
}

echo json_encode($response);


?>