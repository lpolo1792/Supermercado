<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Recuperamos los valores enviados por el formulario
  $primerNombre = $_POST["PrimerNombre"];
  $segundoNombre = $_POST["SegundoNombre"];
  $apellidos = $_POST["Apellidos"];
  $email = $_POST["EMail"];
  $documentoIdentidad = $_POST["DocumentoIdentidad"];
  $contraseña = $_POST["Contraseña"];
  $ciudad = $_POST["Ciudad"];

  // Validamos que los campos requeridos no estén vacíos
  if (empty($primerNombre) || (empty($segundoNombre) ||empty($apellidos) || empty($email) || empty($documentoIdentidad) || empty($contraseña) || empty($ciudad))) {
    echo "Por favor completa todos los campos requeridos.";
  } else {
    // Conectamos a la base de datos
    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "supermercado";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertamos los valores en la base de datos
    $sql = "INSERT INTO usuarios (PrimerNombre, SegundoNombre, Apellidos, EMail, DocumentoIdentidad, Contraseña, Ciudad) VALUES ('$primerNombre', '$segundoNombre', '$apellidos', '$email', '$documentoIdentidad', '$contraseña', '$ciudad')";

    if ($conn->query($sql) === TRUE) {
      echo "Registro exitoso.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>
