<?php
include 'db_funktionen.php';
$dbconn=db_connect();
session_start();
//neuen Burger in Datenbank hinzufügen
if(isset($_SESSION['admin'])){
    $ziel="bilder/";
    $zieldatei=$ziel.basename($_FILES["bild"]['name']);
    $datei=basename($_FILES["bild"]['name']);
    //hochladen von Bild
    if(move_uploaded_file($_FILES["bild"]["tmp_name"], $zieldatei)){
        echo "erfolgreich hochgeladen";
        echo $datei;
    }
    //Einfügen von neuem Burger in die Datenbank
    $sql="INSERT INTO webshop.burger (bezeichnung, beschreibung, kategorieID, preis, bild) VALUE (?, ?, ?, ?, ?)";
    $prep=$dbconn->prepare($sql);
    $t=2;
    $prep->bind_param("ssids", $_POST['bezeichnung'], $_POST['beschreibung'], $t, $_POST['preis'], $datei);
    $prep->execute();
    echo "<script>alert('Erfolgreich hinzugefügt')</script>";
}
echo "<script>location.href='admin.php'</script>";
