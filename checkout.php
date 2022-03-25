<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
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
            //Berechnung von Gesamtpreis
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
                                <!-- Rechnungsadresse-->
                                <h5>Rechnungsadresse</h5>
                                <form class="row g-3">
                                    <div class="col-md-6">
                                        <label for="vorname" class="form-label">Vorname</label>
                                        <input type="text" class="form-control" id="vorname" value="<?php echo $r['vorname'] ?>" readonly >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nachname" class="form-label">Nachname</label>
                                        <input type="text" class="form-control" id="nachname" value="<?php echo $r['nachname'] ?>" readonly >
                                    </div>
                                <div class="col-md-9">
                                    <label for="straße" class="form-label">Straße</label>
                                    <input type="text" class="form-control" id="straße" value="<?php echo $r['Straße'] ?>"readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="hausnummer" class="form-label">Hausnummer</label>
                                    <input type="text" class="form-control" id="hausnummer" value="<?php echo $r['Hausnummer'] ?>"readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="plz" class="form-label">PLZ</label>
                                    <input type="number" class="form-control" id="plz" value="<?php echo $r['PLZ'] ?>"readonly>
                                </div>
                                    <div class="col-md-6">
                                        <label for="ort" class="form-label">Ort</label>
                                        <input type="text" class="form-control" id="ort" value="<?php echo $r['Ort'] ?>" readonly>
                                    </div>
                                <div class="col-12">
                                    <label for="iban" class="form-label">IBAN</label>
                                    <input type="text" class="form-control" id="iban" value="<?php echo $r['IBAN'] ?>"readonly>
                                </div>
                                </form>
                                <!-- Lieferadresse-->
                                <!-- Nur Lieferadresse soll verändert werden können, da Rechnungsadresse mit Kontodaten übereinstimmen soll-->
                                <h5 class="pt-5">Lieferadresse <i class="fa-solid fa-pen-to-square" id="button" onclick="bearbeiten()"></i></h5>
                                <form class="row g-3" action="rechnungerstellen.php" method="post">
                                    <div class="col-md-6">
                                        <label for="vornamel" class="form-label">Vorname</label>
                                        <input type="text" name="vornamel" class="form-control" id="vornamel" value="<?php echo $r['vorname'] ?>" readonly >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nachname" class="form-label">Nachname</label>
                                        <input type="text" name="nachnamel" class="form-control" id="nachnamel" value="<?php echo $r['nachname'] ?>" readonly >
                                    </div>
                                    <div class="col-md-9">
                                        <label for="straße" class="form-label">Straße</label>
                                        <input type="text" name="straßel" class="form-control" id="straßel" value="<?php echo $r['Straße'] ?>"readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="hausnummer" class="form-label">Hausnummer</label>
                                        <input type="text" name="hausnummerl" class="form-control" id="hausnummerl" value="<?php echo $r['Hausnummer'] ?>"readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="plz" class="form-label">PLZ</label>
                                        <input type="number" name="plzl" class="form-control" id="plzl" value="<?php echo $r['PLZ'] ?>"readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ort" class="form-label">Ort</label>
                                        <input type="text" name="ortl" class="form-control" id="ortl" value="<?php echo $r['Ort'] ?>"readonly>
                                    </div>

                            </div>
                            <!-- Ausgabe von Gesamtpreis-->
                            <div class='col-sm pt-5'>
                                <div class="text-center border mt-5 pt-2 shadow mx-5 rounded" style="background-color: gainsboro">
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
                                <p class="pt-5"><input type='submit' value='Bezahlen' class='btn btn-lg bg-success text-white w-50 name='bezahlen'></p>
                            </div>

                            </form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>
    // Funktion um Lieferadresse bearbeiten zu können
    function bearbeiten(){
        let test=document.getElementById("vornamel").getAttribute("readonly");
        let readonly = false;
        if(test==null){
            readonly=true;
            document.getElementById("nachnamel").setAttribute("readonly", true);
            document.getElementById("vornamel").setAttribute("readonly", readonly);
            document.getElementById("straßel").setAttribute("readonly", readonly);
            document.getElementById("hausnummerl").setAttribute("readonly", readonly);
            document.getElementById("plzl").setAttribute("readonly", readonly);
            document.getElementById("ortl").setAttribute("readonly", readonly);
        }else{

            document.getElementById("nachnamel").removeAttribute("readonly");
            document.getElementById("vornamel").removeAttribute("readonly");
            document.getElementById("straßel").removeAttribute("readonly");
            document.getElementById("hausnummerl").removeAttribute("readonly");
            document.getElementById("plzl").removeAttribute("readonly");
            document.getElementById("ortl").removeAttribute("readonly");
        }
    }
</script>
</body>
</html>


