<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
<?php
include 'db_funktionen.php';
$dbconn=db_connect();
if($_POST['anzahl']>0){
    if(!isset($_SESSION['einkaufswagenID'])) {
        if(isset($_SESSION['angemeldet'])) {
            $sql= "INSERT INTO einkaufswagen (kundenID, sessionID) VALUES ('".$_SESSION['kundenID']."', '".session_id()."') ";
            $dbconn->query($sql);
            $_SESSION['einkaufswagenID']=mysqli_insert_id($dbconn);
        }else{
            $sql= "INSERT INTO einkaufswagen (kundenID, sessionID) VALUES (null, '".session_id()."') ";
            $dbconn->query($sql);
            $_SESSION['einkaufswagenID']=mysqli_insert_id($dbconn);
        }
    }
    /*
        $sql = "SELECT * FROM kunde WHERE EMail = ?";

        //prepare string against sql Injection
        $preparedStatement = $dbconn->prepare($sql);
        $preparedStatement->bind_param('s', $_POST['email']);
        if (!$preparedStatement->execute()) {
            die($preparedStatement->error);
        }
        $result = $preparedStatement->get_result();
        $preparedStatement->close();
        if ($result->num_rows > 0) {
            echo "<script> 
                alert('Mit dieser E-Mail Adresse wurde bereits ein Konto erstellt'); 
                location.href='index.php'; 
                </script>";
        } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO kunde (vorname, nachname, geschlecht, geburtsdatum, Straße, Hausnummer, PLZ, Ort, IBAN, EMail, password) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

            //prepare string against sql Injection
            $preparedStatement = $dbconn->prepare($sql);
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
            $preparedStatement->bind_param("sssssssssss", $_POST['vorname'], $_POST['nachname'], $geschlecht, $_POST['geburtsdatum'], $_POST['straße'], $_POST['hausnr'], $_POST['plz'], $_POST['ort'], $_POST['iban'], $_POST['email'], $password);
            if (!$preparedStatement->execute()) {
                die($preparedStatement->error);
            }
            //close Statement connection
            $result = $preparedStatement->get_result();
            $preparedStatement->close();
            $dbconn->close();
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row['kundenID'];
            $_SESSION['name'] = $row['vorname'] . ' ' . $row['nachname'];
            $_SESSION['email'] = $row['email'];

            $_SESSION['angemeldet'] = true;
            echo "<script> alert('Erfolgreich hinzugefügt!'); location.href='index.php'; </script>";
        }
*/
}
?>
