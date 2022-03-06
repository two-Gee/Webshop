<?php
session_start();
echo "<script> alert('Erfolgreich ausgeloggt!'); location.href='index.php'; </script>";
session_destroy();
?>