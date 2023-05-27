<?php
// Conectamos a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supermercado";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }
    $nombre = $_POST["usuario"];
    $pass = $_POST["password"];

    $queryusuario = mysqli_query($conn,"SELECT * FROM usuarios WHERE PrimerNombre ='$nombre' and pass = '$pass'");
    $nr	= mysqli_num_rows($queryusuario);
    if ($nr == 1 )  
	{ 
				header("Location: index2.html");
	}
else
	{
	echo "<script> alert('Usuario, contraseña.');window.location= 'login.html' </script>";
	} 
    ?>