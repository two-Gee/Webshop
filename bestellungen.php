<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/83d01b2ba6.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
<?php
include 'navbar.php';
?>
<div class="container pt-5">
    <?php
    //Auflistung von allen Bestellungen, die dem angemeldeten Konto zugeordnet sind, sortiert nach Bestelldatum und Zeit.
    $sql="SELECT * FROM webshop.rechnung WHERE kundenID=".$_SESSION['kundenID']." ORDER BY datum DESC, uhrzeit DESC";
    $result=db_query($sql);
    if($result->num_rows<1){
        echo "<h5 class='text-center'>Noch keine Bestellungen getätigt</h5>";
    }
    while($row=$result->fetch_assoc()){
        $gesamtpreis=0.0;
        $sql1="SELECT b.burgerID AS burgerID, b.preis AS preis, b.bild AS bild, b.bezeichnung AS bezeichnung, COUNT(b.bezeichnung) AS anzahl FROM webshop.einkaufswageneintrag AS e, webshop.burger AS b, webshop.rechnung AS r WHERE r.einkaufswagenID=e.einkaufswagenID AND e.burgerID=b.burgerID AND r.rechnungsID='".$row['rechnungsID']."' GROUP BY b.bezeichnung";
        $result1 = db_query($sql1);
        echo"
        <div class='row border my-3 shadow rounded'>
        <div class='col'>
        <p>".$row['datum']." ".$row['uhrzeit']."</p>
        </div>
        <div class='col'>
        ";
        while($row1=$result1->fetch_assoc()){
            $gesamtpreis=$gesamtpreis+$row1['anzahl']*$row1['preis'];
            echo "
            <p>".$row1['anzahl']." x ".$row1['bezeichnung']."</p>
            ";
        };
        echo "
        </div>
        <div class='col'>
            <p>Gesamtpreis: ".$gesamtpreis." €</p>    
        </div>
        <div class='col'>
            <p>Lieferadresse:</p>
            <p>".$row['vornamel']." ".$row['nachnamel']."</p>
            <p>".$row['straßel']." ".$row['hausnummerl']." ".$row['plzl']." ".$row['ortl']."</p>
        </div>
        </div>
        ";
    }
    ?>

</div>
<?php
include 'footer.php';
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>

</script>
</body>
</html>



