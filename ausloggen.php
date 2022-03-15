<?php
session_start();
echo "<script> alert('Erfolgreich ausgeloggt!'); location.href='index.php'; </script>";
session_regenerate_id();
session_destroy();
?>