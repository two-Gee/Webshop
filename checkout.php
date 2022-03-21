<?php
session_start();
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
<div class="container text-center">
    <p class="h2">
        <i class="fa-solid fa-burger"></i>
        juicyBurger
    </p>
    <?php
    include 'db_funktionen.php';
    $gesamtpreis=0.0;
    if(isset($_SESSION['einkaufswagenID'])) {
        $result = db_query("SELECT b.burgerID AS burgerID, b.preis AS preis, b.bild AS bild, b.bezeichnung AS bezeichnung, COUNT(b.bezeichnung) AS anzahl FROM webshop.einkaufswageneintrag AS e, webshop.burger AS b WHERE e.burgerID=b.burgerID AND einkaufswagenID='" . $_SESSION['einkaufswagenID'] . "' GROUP BY b.bezeichnung");
        while ($row = $result->fetch_assoc()) {
            $gesamtpreis = $gesamtpreis + $row['anzahl'] * $row['preis'];
        }
    }
    ?>
    <?php
    $sql= 'SELECT * FROM webshop.kunde WHERE kundenID=' .$_SESSION['kundenID'];
    $result=db_query($sql);
    $r=$result->fetch_assoc();
    ?>
                        <div class='row'>
                            <div class="col-sm mt-5">
                                <h5>Rechnungsadresse <i class="ms-1 fa-solid fa-user-pen" id="button" onclick="bearbeiten()"></i></h5>
                                <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="straße" class="form-label">Straße</label>
                                    <input type="text" class="form-control" id="straße" value="<?php echo $r['Straße'] ?>"readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="hausnummer" class="form-label">Hausnummer</label>
                                    <input type="text" class="form-control" id="hausnummer" value="<?php echo $r['Hausnummer'] ?>"readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="plz" class="form-label">PLZ</label>
                                    <input type="number" class="form-control" id="plz" placeholder="<?php echo $r['PLZ'] ?>"readonly>
                                </div>
                                <div class="col-12">
                                    <label for="iban" class="form-label">IBAN</label>
                                    <input type="text" class="form-control" id="iban" value="<?php echo $r['IBAN'] ?>"readonly>
                                </div>
                                </form>
                            </div>
                            <div class='col-sm'>
                                <div class="text-center border mt-5 shadow mx-5">
                                    <p>
                                    Zwischensumme:
                                        <i>
                                            <?php
                                            echo $gesamtpreis;
                                            ?>
                                        </i>
                                    €</p>
                                    <p>
                                        Versand:
                                        <i>
                                            <?php
                                            $versand=0;
                                            if($gesamtpreis>15){
                                               echo 0;
                                            }else{
                                                echo 4;
                                                $versand=4;
                                            }
                                            ?>
                                        </i>
                                        €</p>
                                    <p>
                                        Gesamtpreis:
                                        <i>
                                            <?php
                                            echo $gesamtpreis+$versand;
                                            ?>
                                        </i>
                                        €</p>
                            </div>
                            </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>

</script>
</body>
</html>


