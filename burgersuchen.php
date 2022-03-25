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
?>

<div class ="container mt-4">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <!-- Gibt alle Burger aus, die dem Suchbegriff entsprechen-->
        <?php
            $result=db_query("Select * FROM burger WHERE LOWER(bezeichnung) LIKE LOWER('%".$_GET['suchbegriff']."%')");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $r=(db_query('Select * FROM kategorie WHERE kategorieID='.$row['kategorieID']))->fetch_assoc();
                    echo   "<div class='col'>
                                <div class='card'>
                                <div class='bildcontainer'>
                                    <div class='produktbild'>      
                                        <img src='bilder/".$row['bild']."' class='card-img-top' alt='...'>
                                     </div> 
                                     <div class='overlay text-center'>        
                                                <a onclick='burgerHinzufuegen(".$row['burgerID'].")' class='mb-3 btn btn-outline-dark btn-sm'><i class='h5  fa-solid fa-cart-shopping'></i> Zum Einkaufswagen hinzufügen</a> 
                                                <a class='btn btn-outline-dark btn-sm' href='burgerdetails.php?burgerID=".$row['burgerID']."'><i class='h5 fa-solid fa-info'></i> Produktdetails ansehen</a> 
                                      </div>
                                  </div>
                                <div class='card-body'>
                                    <h5 class='card-title text-center'>".$row['bezeichnung']."</h5>
                                    <p class='card-title text-center'>Kategorie: ".$r['bezeichnung']."</p>
                                    <p class='card-text text-center' style='height: 30px'>Preis ".$row['preis']." €</p>
                                </div>
                              </div>
                            </div>";

                }

                $result->free_result();
            } else{
                echo "<p class='text-center pt-3'>Keine Burger gefunden, die zu Ihrer suche passen</p>";
            }
        ?>
    </div>
</div>
<?php
include "footer.php";
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function burgerHinzufuegen(burgerID) {
        var burgerID=burgerID;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "einkaufswagenverwalten.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xhr.send("burgerID="+burgerID+"&anzahl=1");

    }
</script>
</body>
</html>