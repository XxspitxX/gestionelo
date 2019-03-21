<?php 
    // inicialize variables
     $Nombre = "";
     $Apellido = "";
     $Ciudad = "";
     $Pais = "";
     $id = 0;

    //conect to database
    $db = mysqli_connect('localhost','root', '', 'gestionelo');

    // if save button is clicked
    if (isset($_POST['save'])) {
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Ciudad= $_POST['Ciudad'];
        $Pais= $_POST['Pais'];

        $query = "INSERT INTO info (Nombre, Apellido, Ciudad, Pais) VALUES('$Nombre','$Apellido', '$Ciudad', '$Pais')";
        mysqli_connect($db, $query);
        header('location: InformacionPersonal.php'); // redirect to InformacionPersonal page after inserting 
 
    }


?>