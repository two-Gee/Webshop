<?php
session_start();
$_SESSION['angemeldet']=false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/83d01b2ba6.js" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php
include 'navbar.php';
?>
<!-- Wilkommen Text -->
<div class="container-fluid bg-light nomargin ">
    <div class="container bg-light">
        <div>
            <div><img src="welcome.jpg" </div>
          <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center shadow">
              <div class="col-md-10 p-lg-5 mx-auto my-3">
                  <h1 class="display-4 fw-normal">Willkommen bei juicyBurgers</h1>
                  <p class="lead fw-normal pb-3">Bei uns gibt es die besten Burger in ganz Fulda!</p>
                  <a class="btn btn-outline-success btn-lg" href="burger.php">Direkt zu den Burgern</a>
              </div><div class="product-device shadow-sm d-none d-md-block"></div>
              <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
          </div>
        </div>

      <!-- Über uns -->
      <div class="container position-relative overflow-hidden text-center bg-light border-top">
          <h1 class="display-4 fw-normal">Über uns</h1>
          <p class="display-10">Wir haben es uns zur Aufgabe gemacht, beste Qualität und frische Zutaten mit einem fairen und bezahlbaren Preis zu vereinen</p>
          <p class="display-10">Wir sehen uns als Gegenspieler der großen Fast Food Ketten und wir möchten Burger wieder in eine besseres Licht rücken</p>
          <div class="row d-md-flex flex-md-equal my-md-3">
              <div class="shadow col-sm pt-md-5 me-1  text-center  overflow-hidden">
                  <div class="my-3 py-3">
                      <h2 class="display-5">Another headline</h2>
                      <p class="lead">And an even wittier subheading.</p>
                  </div>
                  <div class="bg-dark shadow-sm mx-auto" style="width: 100%; height: 350px; border-radius: 21px 21px 0 0;">
                      <img src="zutaten.jpg" height="413" width="620" style="border-radius: 21px 21px 0 0;">
                  </div>
              </div>
              <div class="shadow col-sm bg-light pt-md-5 ms-1 text-center overflow-hidden">
                  <div class="my-3 p-3">
                      <h2 class="display-5">Another headline</h2>
                      <p class="lead">And an even wittier subheading.</p>
                  </div>
                  <div class="bg-dark shadow-sm mx-auto" style="width: 100%; height: 413px; border-radius: 21px 21px 0 0;">
                      <img src="kueche.jpg" height="413" width="620" style="border-radius: 21px 21px 0 0;">
                  </div>
              </div>
          </div>
          <p class="display-6 pt-3"> Überzeugt?</p>
          <a class="btn btn-outline-success btn-lg" href="burger.php">Zu den Burgern</a>
      </div>
        <?php
            include 'footer.php';
        ?>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $(document).ready(function (){
        $('#btnclose1').click(function (){
            $('#loginModal').modal('hide');
            $(".modal-backdrop").remove();
        });
        $('#btnclose2').click(function (){
            $('#signUpModal').modal('hide');
            $(".modal-backdrop").remove();
        });
        $(function(){
            $('#navbarDropdown').hover(function() {
                    $(this).addClass('open');
                },
                function() {
                    $(this).removeClass('open');
                });
        });
    });
    function signUp(){
        $('#loginModal').modal('hide');
        $(".modal-backdrop").remove();
        $('#signUpModal').modal('show');
    };
</script>
</body>
</html>