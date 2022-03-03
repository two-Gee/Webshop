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
/*
if($_POST['login-btn']=='Login'){
    echo '<script>window.alert("test")</script>';
    $result=db_query('Select * FROM kunden WHERE email=' .'$_POST[email]');
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        if(password_verify($_POST[password], row[password])){

        }else{

        }
    }

}elseif ($_POST['login-btn']=='Registrieren'){
    $sql = "INSERT INTO kunden (`vorname`, `nachname`, `geschlecht, 'geburtsdatum', 'Straße', 'Hausnummer', 'PLZ', 'ort', 'IBAN', 'EMail', 'password`) VALUES (?, ?, ?, ?)" ;

    //prepare string against sql Injection
    $preparedStatement = $db->prepare($sql);
    //bind parameters
    $preparedStatement->bind_param("sss", $userName, $userMail, $userText);
    if(!$preparedStatement->execute()){
        die($preparedStatement->error);
    }
    //close Statement connection
    $preparedStatement->close();
    $db->close();
    echo "<script> 
    alert('Erfolgreich hinzuffügt!'); 
     location.href='../index.html'; 
    </script>";
}
*/
?>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>