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
    <div class="container">
        <p class="h1 text-center mb-4">Einkaufswagen</p>
        <div class="row">
            <div class='col'>
            <?php
            include 'db_funktionen.php';
            $gesamtpreis=0.0;
                if(isset($_SESSION['einkaufswagenID'])) {
                    $result = db_query("SELECT b.preis AS preis, b.bild AS bild, b.bezeichnung AS bezeichnung, COUNT(b.burgerID) AS anzahl FROM webshop.einkaufswageneintrag AS e, webshop.burger AS b WHERE e.burgerID=b.burgerID AND einkaufswagenID='".$_SESSION['einkaufswagenID']."' GROUP BY b.burgerID");
                    while ($row = $result->fetch_assoc()) {
                        $gesamtpreis=$gesamtpreis+$row['anzahl']*$row['preis'];
                        echo " 
                        <div class='row border-bottom my-2 pb-2'>
                            <div class='col'>
                                <img src='bilder/".$row['bild'] . "' width=70% height=auto>
                            </div>
                            <div class='col'>
                                <p>" . $row['bezeichnung'] . "</p>
                            </div>
                            <div class='col text-center pt-4'>
                                <i>Anzahl:  ".$row['anzahl']." </i>
                                <i class='fa-solid fa-plus'></i>
                                <i class='fa-solid fa-minus'></i>
                            </div>
                         </div>
                        ";
                    }
                }else{
                    echo "<p class='text-center h3 py-5 my-5'>Noch keine Produkte im Einkaufswagen</p>";
            }
                echo $gesamtpreis;
            ?>
            </div>
            <div class="col">
                <div class="text-center pb-3">
                    Gesamtpreis:
                    <?php
                    echo $gesamtpreis;
                    ?>
                     €
                </div>
                <div class="text-center pt-5">
                    <button class="btn btn-lg btn-outline-success">Zur Kasse</button>

                </div>
            </div>
        </div>

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


