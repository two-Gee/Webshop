<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/83d01b2ba6.js" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php
include 'navbar.php';
?>

</style>

    <div class="container">

        <!-- Über uns -->
        <div class="container  overflow-hidden text-center bg-light border-top py-4 my-5">
            <h1 class="display-4 fw-normal">Über uns</h1>
            <p class="display-10">Wir haben es uns zur Aufgabe gemacht, beste Qualität und frische Zutaten mit einem fairen und bezahlbaren Preis zu vereinen</p>
            <p class="display-10">Wir sehen uns als Gegenspieler der großen Fast Food Ketten und wir möchten Burger wieder in ein besseres Licht rücken</p>
            <div class="row">
                <div class="col-sm shadow mt-3 me-1">
                    <div class=" col-sm bg-light text-center overflow-hidden">
                        <div class="my-3 p-3" style="height: 180px">
                            <h2 class="display-5">Frische Zutaten</h2>
                            <p class="lead">Wir benutzen nur frische Zutaten mit bester Qualität, die zum größten Teil regional sind.</p>
                            <p></p>
                        </div>
                    </div>
                    <img src="bilder/zutaten.jpg" height=auto width="100%" style="border-radius: 21px 21px 21px 21px;">
                </div>
                <div class="col-sm shadow mt-3 ms-1">
                    <div class=" col-sm bg-light text-center overflow-hidden">
                        <div class="my-3 p-3" style="height: 180px">
                            <h2 class="display-5">Frische Zubereitung</h2>
                            <p class="lead">Ihre Bestellung direkt zubereitet, wenn sie bei uns ankommt und danach liefern wir sie so schnell wie möglich zu Ihnen</p>
                        </div>
                    </div>
                    <img src="bilder/kueche.jpg" height=auto width="100%" style="border-radius: 21px 21px 21px 21px;">
                </div>
            </div>
            <div class="border-top border-bottom pb-2">
            <p class="display-6 pt-3"> Überzeugt?</p>
            <a class="btn btn-outline-success btn-lg" href="burger.php">Zu den Burgern</a>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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

</script>
</body>
</html>