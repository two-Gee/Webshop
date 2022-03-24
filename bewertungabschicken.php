<?php
session_start();

//submit_rating.php
include 'db_funktionen.php';
echo $_POST['bewertung'];
$dbconn=db_connect();
if (isset($_SESSION["angemeldet"])) {
    if($_POST['bewertung']==0){
        echo "<script>alert('Sie müssen eine Bewertung auswählen');</script>";
    }else{
        echo $_POST['bewertung'];
        $datum=date("Y-m-d");

        $sql = "INSERT INTO webshop.bewertung ( bewertung, bewertungstext, datum, kundenID, burgerID) VALUES (?, ?, ?, ?, ?)";
        $prep=$dbconn->prepare($sql);
        $prep->bind_param("sssii", $_POST["bewertung"], $_POST["bewertungstext"],$datum, $_SESSION['kundenID'], $_POST['burgerID'] );

        $prep->execute();
        echo "<script>alert('Die Bewertung wurde erfolgreich abgeschickt');</script>";
    }





}else{
    echo "<script>alert('Sie müssen sich erst anmelden bevor sie eine Bewertung schreiben können');</script>";
}

echo "<script>location.href='burgerdetails.php?burgerID=".$_POST['burgerID']."'</script>";


