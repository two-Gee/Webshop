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
            $result=$dbconn->query("SELECT einkaufswagenID FROM einkaufswagen WHERE sessionID='".session_id()."'");
            $row=$result->fetch_assoc();
            $insID=$row['einkaufswagenID'];
            echo $insID;
            $_SESSION['einkaufswagenID']=$insID;
            echo $_SESSION['einkaufswagenID'];
        }else{
            $sql= "INSERT INTO einkaufswagen (kundenID, sessionID) VALUES (null, '".session_id()."') ";
            $dbconn->query($sql);
            $result=$dbconn->query("SELECT einkaufswagenID FROM einkaufswagen WHERE sessionID='".session_id()."'");
            $row=$result->fetch_assoc();
            $insID=$row['einkaufswagenID'];
            echo $insID;
            $_SESSION['einkaufswagenID']=$insID;
            echo $_SESSION['einkaufswagenID'];
        }
    }
    echo "<script> 
                alert('".$_SESSION['einkaufswagenID']."');    
                </script>";
    echo $_SESSION['einkaufswagenID'];
    $sql = "INSERT INTO einkaufswageneintrag (burgerID, einkaufswagenID) VALUES (?,?)";
    $preparedStatement = $dbconn->prepare($sql);
    $preparedStatement->bind_param('ii', $_POST['burgerID'], $_SESSION['einkaufswagenID']);
    if (!$preparedStatement->execute()) {
        die($preparedStatement->error);
    }
    $result = $preparedStatement->get_result();
    $preparedStatement->close();
    echo "<script> 
                alert('Zum Einkaufswagen hinzugefügt'); 
                location.href='index.php'; 
                </script>";
}else{
    $sql1 ="SELECT * FROM einkaufswageneintrag WHERE burgerID=".$_POST['burgerID']." AND einkaufswagenID=".$_SESSION['einkaufswagenID']." LIMIT 1";
    $result=db_query($sql1);
    $r=$result->fetch_assoc();
    $sql2 = "DELETE FROM einkaufswageneintrag WHERE einkaufswageneintragID=".$r['einkaufswageneintragID'];
    db_query($sql2);
    echo "Test";
}
?>
