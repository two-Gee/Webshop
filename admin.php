<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/83d01b2ba6.js" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">


    <style>


    </style>
</head>
<body class="bg-light">
<?php
include ('navbar.php');
//falls Konto keine Admin Rechte hat, kann man nicht auf Seite zugreifen
if(!isset($_SESSION['admin'])){
    echo "<script> 
            history.back();
            </script>";
}
?>
<!--Formular um einen neuen Burger hinzuzufügen-->
<div class ="container mt-4">
    <div class="row">
        <div class="col-sm">
            <h2 class="text-center">Burger hinzufügen</h2>
            <form action="burgerhinzufuegen.php" method="post" enctype="multipart/form-data">
                <div class="col-md">
                    <label for="b" class="form-label">Bezeichnung:</label>
                    <input type="text" name="bezeichnung" class="form-control" id="">
                </div>
                <div class="col-md">
                    <label for="b" class="form-label">Beschreibung:</label>
                    <input type="text" name="beschreibung" class="form-control" id="">
                </div>
                <div class="col-md">
                    <label for="b" class="form-label">KategorieID:</label>
                    <input type="number" name="kategorieID" class="form-control">
                </div>
                <div class="col-md">
                    <label for="b" class="form-label">Preis (in €) :</label>
                    <input type="number" step="0.1" name="preis" class="form-control" id="">
                </div>
                <div class="col-md">
                    <label for="b" class="form-label">Bild:</label>
                    <input type="file" name="bild" class="form-control" id="bild">
                </div>
                <input name="submit" type='submit' value='Burger hinzufügen' class='btn bg-success float-end text-white w-100 mt-3' name='hinzufuegen'>
            </form>
        </div>

        <div class="col-sm ps-4">
            <h2 class="text-center">Burger entfernen</h2>
            <div>
                <!-- Formular um Burger zu löschen. Es werden alle Burger aufgelistet und man kann über eine Checkbox auswählen, welche gelöscht werden sollen-->
                <form action="burgerloeschen.php" method="post">
                <?php
                $sql="SELECT * FROM webshop.burger";
                $result=db_query($sql);
                while($row=$result->fetch_assoc()){
                    echo"
                    <div class='row'>
                        <div class='col-sm-1'>
                        <input type='checkbox' name='".$row['burgerID']."' value='loeschen'>
                        </div>
                        <div class='col-sm'>
                        <p>".$row['bezeichnung']."</p>
                        </div>
                        <div class='col-sm'>
                        <p>KategorieID: ".$row['kategorieID']." </p>
                        </div>
                        <div class='col-sm'>
                        <p>".$row['preis']." €</p>
                        </div>
                    </div>
                    ";
                }
                ?>
                    <input name="submit" type='submit' value='Ausgewählte Burger löschen' class='btn bg-danger float-end text-white w-100 mt-3' name='loeschen'>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
<?php
include "footer.php";
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
</script>
</body>
</html>