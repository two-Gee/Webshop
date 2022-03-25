<?php
session_start();

?>
<?php
//Fügt Produkte zu Einkaufswagen hinzu oder löscht welche
include 'db_funktionen.php';
$dbconn=db_connect();
//Überprüft ob Produkt hinzufügt oder gelöscht werden soll
if($_POST['anzahl']>0){
    //Überprüft ob der Session bereits ein einkaufwagen zugeordnet ist, falls nicht wird eine neuer erstellt
    if(!isset($_SESSION['einkaufswagenID'])) {
        //Überprüft ob Nutzer angemeldet ist, wenn nicht wird nur die SessionID in der DB gespeichert
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
    //Löscht einen Burger aus der Datenbank heraus
    $sql1 ="SELECT * FROM einkaufswageneintrag WHERE burgerID=".$_POST['burgerID']." AND einkaufswagenID=".$_SESSION['einkaufswagenID']." LIMIT 1";
    $result=db_query($sql1);
    $r=$result->fetch_assoc();
    $sql2 = "DELETE FROM einkaufswageneintrag WHERE einkaufswageneintragID=".$r['einkaufswageneintragID'];
    db_query($sql2);
}
?>
