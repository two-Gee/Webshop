<?php
session_start();
include "db_funktionen.php";
if($_SESSION['admin']){
    $sql="SELECT * FROM webshop.burger";
    $result=db_query($sql);
    while($row=$result->fetch_assoc()){

        //Überprüfung ob checkbox von Burger angeklickt wurde
        if(isset($_POST[$row['burgerID']])){

            $sql = "DELETE FROM burger WHERE burgerID=".$row['burgerID'];
            db_query($sql);
            //zugehöriges Bild loeschen
            unlink("bilder/".$row['bild']);
            echo "<script>alert('Erfolgreich gelöscht')</script>";

        }
    }
}
echo "<script>location.href='admin.php'</script>";
