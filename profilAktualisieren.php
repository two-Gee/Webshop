<?php
include 'db_funktionen.php';
session_start();
$dbconn=db_connect();
//Ändert Profildaten
if(isset($_SESSION['angemeldet'])){
    $sql = "SELECT * FROM kunde WHERE EMail = ?";

    //prepare string against sql Injection
    $preparedStatement = $dbconn->prepare($sql);
    $preparedStatement->bind_param('s', $_POST['email']);
    if(!$preparedStatement->execute()){
        die($preparedStatement->error);
    }
    $result=$preparedStatement->get_result();
    $preparedStatement->close();
    $r=$result->fetch_assoc();
    if($result->num_rows > 0 AND $r['kundenID']!=$_SESSION['kundenID']) {
        echo "<script> 
                alert('Mit dieser E-Mail Adresse wurde bereits ein Konto erstellt'); 
                </script>";
    }else {

        $sql = "UPDATE webshop.kunde SET vorname=?, nachname=?, geschlecht=?, geburtsdatum=?, Straße=?, Hausnummer=?, PLZ=?, Ort=?, IBAN=?, EMail=?, password=? WHERE kundenID=".$_SESSION['kundenID'];

        //prepare string against sql Injection

        //bind parameters
        $geschlecht = null;
        switch ($_POST['geschlecht']) {
            case 1:
                $geschlecht = "weiblich";
                break;
            case 2:
                $geschlecht = "männlich";
                break;
            case 3:
                $geschlecht = "divers";
                break;
        }
        //Überprüft ob password geändert werden soll oder nicht
        if(isset($_POST['password'])){
            $sql = "UPDATE webshop.kunde SET vorname=?, nachname=?, geschlecht=?, geburtsdatum=?, Straße=?, Hausnummer=?, PLZ=?, Ort=?, IBAN=?, EMail=?, password=? WHERE kundenID=".$_SESSION['kundenID'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $preparedStatement = $dbconn->prepare($sql);
            $preparedStatement->bind_param("sssssssssss", $_POST['vorname'], $_POST['nachname'], $geschlecht, $_POST['geburtsdatum'], $_POST['straße'], $_POST['hausnummer'], $_POST['plz'], $_POST['ort'], $_POST['iban'], $_POST['email'], $password);
            if (!$preparedStatement->execute()) {
                die($preparedStatement->error);
            }
        }else {
            $sql= "UPDATE webshop.kunde SET vorname=?, nachname=?, geschlecht=?, geburtsdatum=?, Straße=?, Hausnummer=?, PLZ=?, Ort=?, IBAN=?, EMail=? WHERE kundenID=".$_SESSION['kundenID'];
            $preparedStatement = $dbconn->prepare($sql);
            $preparedStatement->bind_param("ssssssssss", $_POST['vorname'], $_POST['nachname'], $geschlecht, $_POST['geburtsdatum'], $_POST['straße'], $_POST['hausnummer'], $_POST['plz'], $_POST['ort'], $_POST['iban'], $_POST['email']);
            if (!$preparedStatement->execute()) {
                die($preparedStatement->error);
            }
        }

        //close Statement connection
        $result=$preparedStatement->get_result();
        $preparedStatement->close();
        $dbconn->close();
        $_SESSION['name'] = $_POST['vorname']. ' ' .$_POST['nachname'];
        $_SESSION['email'] = $_POST['email'];

        echo "<script> alert('Erfolgreich geändert!'); </script>";
        echo "<script> 
            history.back(); 
            </script>";
    }
}
?>
