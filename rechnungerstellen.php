<?php
session_start();
include "db_funktionen.php";
if(isset($_SESSION)){
    $dbconn=db_connect();
    $sql = "INSERT INTO webshop.rechnung (einkaufswagenID, kundenID, vornamel, nachnamel, straßel, hausnummerl, plzl, ortl, datum, uhrzeit) VALUES (?,?,?,?,?,?,?,?,?,?)";

    //Datenbankabfrage preparen um SQL Injection zu verhindern
    $preparedStatement = $dbconn->prepare($sql);
    //Parameter binden
    $date=date("Y-m-d");
    $time=date("H:i:s");
    echo $time;
    $preparedStatement->bind_param("iissssssss", $_SESSION['einkaufswagenID'], $_SESSION['kundenID'], $_POST['vornamel'], $_POST['nachnamel'], $_POST['straßel'], $_POST['hausnummerl'], $_POST['plzl'], $_POST['ortl'], $date, $time);
    $preparedStatement->execute();
    $sql="DELETE FROM webshop.einkaufswageneintrag WHERE einkaufswagenID=".$_SESSION['einkaufswagenID'];
    db_query($sql);
    echo "<script>alert('Bestellung wurde erfolgreich aufgegeben'); location.href='index.php';</script>";
}else{
    echo "<script>location.href='index.php';</script>";
}
?>
