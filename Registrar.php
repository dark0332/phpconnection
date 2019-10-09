<?PHP

$con = mysqli_connect("localhost", "monicar", "PTh1LOap", "monicar");

$var = $_POST[];

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];
$fechanac = $_POST["fechanac"];
$sexo = $_POST["sexo"];

$Statement = mysqli_prepare($con, "INSERT INTO Datos_Usuario (nombre,apellido,correo,contrasena,fecha_nacimiento,sexo) VALUES (?,?,?,?,?,?)");

mysqli_stmt_bind_param($statement, "ssis",$nombre,$apellido,$correo,$contrasena,$fechanac,$sexo);
mysqli_stmt_execute($statement);

$response = array();
$response["succeess"] = true;
echo json_encode($response);


?>