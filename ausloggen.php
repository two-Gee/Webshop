<?php
session_start();
echo "<script> alert('Erfolgreich ausgeloggt!'); location.href='index.php'; </script>";
//Beim Ausloggen wird die Session erneuert, somit ist das eingeloggte Konto nicht mehr gespeichert.
session_regenerate_id();
session_destroy();
?>