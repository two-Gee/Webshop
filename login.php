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

if($_POST['login-btn']=='Login'){
    $sql = "SELECT * FROM kunde WHERE EMail = ?";

    //prepare string against sql Injection
    $preparedStatement = $dbconn->prepare($sql);
    $preparedStatement->bind_param('s', $_POST['email']);
    if(!$preparedStatement->execute()){
        die($preparedStatement->error);
    }
    $result=$preparedStatement->get_result();
    $preparedStatement->close();
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        if(password_verify($_POST['password'], $row['Password'])){
            $_SESSION['kundenID'] = $row['kundenID'];
            $_SESSION['angemeldet']=true;
            $_SESSION['name'] = $row['vorname']. ' ' .$row['nachname'];
            $_SESSION['email'] = $row['EMail'];
            $sql="SELECT * FROM webshop.kunde WHERE kundenID=".$_SESSION['kundenID'];
            $result=db_query($sql);
            $r=$result->fetch_assoc();
            if($r['admin']==1){
                $_SESSION['admin']=true;
            }
            echo "<script> 
            alert('Erfolgreich angemeldet!'); 
            </script>";

        }else{
            echo "<script> 
            alert('Falsche E-Mail Adresse oder falsche Password'); 
            </script>";
        }
    }
}elseif ($_POST['login-btn']=='Registrieren'){
    $sql = "SELECT * FROM kunde WHERE EMail = ?";

    //prepare string against sql Injection
    $preparedStatement = $dbconn->prepare($sql);
    $preparedStatement->bind_param('s', $_POST['email']);
    if(!$preparedStatement->execute()){
        die($preparedStatement->error);
    }
    $result=$preparedStatement->get_result();
    $preparedStatement->close();
    if($result->num_rows > 0) {
        echo "<script> 
                alert('Mit dieser E-Mail Adresse wurde bereits ein Konto erstellt'); 
                </script>";
    }else {
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
        $result=$preparedStatement->get_result();
        $preparedStatement->close();
        $dbconn->close();
        $sql="SELECT * FROM webshop.kunde WHERE EMail='".$_POST['email']."'";
        $result=db_query($sql);
        $row=$result->fetch_assoc();
        $_SESSION['kundenID'] = $row['kundenID'];
        $_SESSION['name'] = $row['vorname']. ' ' .$row['nachname'];
        $_SESSION['email'] = $row['email'];

        $_SESSION['angemeldet'] = true;
        echo "<script> alert('Erfolgreich hinzugefügt!'); </script>";
    }
}
if(isset($_SESSION['kundenID'])) {
    if (isset($_SESSION['einkaufswagenID']) and isset($_SESSION['kundenID'])) {
        $sql = "SELECT * FROM webshop.einkaufswagen AS e WHERE e.kundenID='" . $_SESSION['kundenID'] . "'";
        $result = db_query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sql = "UPDATE webshop.einkaufswageneintrag SET einkaufswagenID=" . $row['einkaufswagenID'] . " WHERE einkaufswagenID=" . $_SESSION['einkaufswagenID'];
            db_query($sql);
            $_SESSION['einkaufswagenID'] = $row['einkaufswagenID'];
        } else {
            $sql = "UPDATE webshop.einkaufswagen SET kundenID=" . $_SESSION['kundenID'] . " WHERE einkaufswagenID=" . $_SESSION['einkaufswagenID'];
            db_query($sql);
        }
    } else {
        $sql = "SELECT * FROM webshop.einkaufswagen WHERE kundenID=" . $_SESSION['kundenID'];
        $result = db_query($sql);
        if ($result->num_rows > 0) {
            $r = $result->fetch_assoc();
            $_SESSION['einkaufswagenID'] = $r['einkaufswagenID'];
        }
    }
}
echo "<script> 
            history.back(); 
            </script>";
?>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>