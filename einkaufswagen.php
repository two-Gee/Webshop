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
            <div class='col-sm'>
            <?php
            include 'db_funktionen.php';
            $gesamtpreis=0.0;
                if(isset($_SESSION['einkaufswagenID'])) {
                    $result = db_query("SELECT b.burgerID AS burgerID, b.preis AS preis, b.bild AS bild, b.bezeichnung AS bezeichnung, COUNT(b.bezeichnung) AS anzahl FROM webshop.einkaufswageneintrag AS e, webshop.burger AS b WHERE e.burgerID=b.burgerID AND einkaufswagenID='".$_SESSION['einkaufswagenID']."' GROUP BY b.bezeichnung");
                    while ($row = $result->fetch_assoc()) {
                        $gesamtpreis=$gesamtpreis+$row['anzahl']*$row['preis'];
                        echo " 
                        <div class='row border-bottom my-2 pb-2'>
                            <div class='col'>
                                <img src='bilder/".$row['bild'] . "' width=70% height=auto>
                            </div>
                            <div class='col pt-4'>
                                <p>" . $row['bezeichnung'] . "</p>
                                <p>" . $row['preis']* $row['anzahl']." €</p>
                            </div>
                            <div class='col text-center pt-4'>
                                <i>Anzahl: <i id='anzahl'>".$row['anzahl']."</i></i>
                                <i class='btn fa-solid fa-plus' onclick='anzahlAendern(".$row['burgerID'].", 1)' ></i>
                                <i class='btn fa-solid fa-minus' onclick='anzahlAendern(".$row['burgerID'].", -1)'></i>
                            </div>
                         </div>
                        ";
                    }
                }else{
                    echo "<p class='text-center h3 py-5 my-5'>Noch keine Produkte im Einkaufswagen</p>";
            }
            ?>
            </div>
            <div class="col-sm">
                <div class="text-center pb-3 mt-4">
                    Gesamtpreis:
                    <?php
                    echo $gesamtpreis;
                    ?>
                     €
                </div>
                <?php
                if(isset($_SESSION['angemeldet'])){
                    echo "
                    <div class='text-center pt-5'>
                    <button class='btn btn-lg btn-outline-success'>Zur Kasse</button>
                    </div>
                    ";
                }else{
                    echo"
                    <div class='text-center pt-5'>
                    <p>Sie müssen sich erst anmelden, bevor Sie bezahlen können</p>
                    </div>
                    ";
                }
                ?>

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
    function anzahlAendern(id, anzahlHinzufuegen) {
        var id=id;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "einkaufswagenverwalten.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xhr.send("burgerID="+id+"&anzahl="+anzahlHinzufuegen);
        var anzahl=parseInt(document.getElementById("anzahl").innerHTML);
        var neueanzahl=anzahl+anzahlHinzufuegen;
        if(neueanzahl<=0){
            location.reload();
        }else {
            document.getElementById("anzahl").innerHTML = neueanzahl;
        }
    }
</script>
</body>
</html>


