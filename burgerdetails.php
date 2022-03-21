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
<?php
include 'db_funktionen.php';
if(isset($_GET['burgerID'])){
    $burgerID=$_GET['burgerID'];
    $sql= "SELECT *  FROM webshop.burger WHERE burgerID=".$burgerID;
    $result=db_query($sql);
    $r=$result->fetch_assoc();
    echo"
    <div class='row mt-3'>
        <div class='col-sm'>
            <img src='bilder/".$r['bild']."' width='100%' height='auto' class='rounded'>
        </div>
        <div class='col-sm text-center'>
            <h2>".$r['bezeichnung']."</h2>
            <p class='pt-5 '>".$r['beschreibung']."</p>
            <div class='mt-5'>
            <p class='h3 my-3'>Preis: ".$r['preis']." €</p>
            <a onclick='burgerHinzufuegen(".$r['burgerID'].")' class='btn btn-light btn-sm shadow-none'><i class='fa-solid fa-cart-shopping fa-2x'></i> </a>
             
             </div>
             
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

