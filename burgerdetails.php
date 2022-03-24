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
    if(isset($_GET['burgerID'])) {
        $burgerID = $_GET['burgerID'];
        $sql = "SELECT *  FROM webshop.burger WHERE burgerID=" . $burgerID;
        $result = db_query($sql);
        if ($result->num_rows < 1) {
            echo "<script>alert('Ungültige BurgerID')</script>";
            echo "<script>history.back()</script>";
        } else {
            $r = $result->fetch_assoc();
            echo "
    <div class='row mt-3'>
        <div class='col-sm'>
            <img src='bilder/" . $r['bild'] . "' width='100%' height='auto' class='rounded'>
        </div>
        <div class='col-sm text-center'>
            <h2>" . $r['bezeichnung'] . "</h2>
            <p class='pt-5 '>" . $r['beschreibung'] . "</p>
            <div class='mt-5'>
            <p class='h3 my-3'>Preis: " . $r['preis'] . " €</p>
            <a onclick='burgerHinzufuegen(" . $r['burgerID'] . ")' class='btn btn-light btn-sm shadow-none'><i class='fa-solid fa-cart-shopping fa-2x'></i> </a>
             
             </div>
             
        </div>
    </div>
    ";
        }
    }
    ?>
    <div class='row mt-5 text-center'>
        <h2 class='text-center'>Bewertungen:</h2>
        <div class='col-sm'>
            <h5>Bewertung hinzufügen</h5>
            <h4 class="text-center mt-2 mb-4">
                <form action="bewertungabschicken.php" method="post" name="Formular">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    <input name="bewertung" id="bewertungvalue" hidden value="0">
                    <input name="burgerID"  hidden value="<?php echo $_GET['burgerID']?>">
            </h4>
            <div class="form-group">
                <textarea id="user_review" class="form-control shadow" name="bewertungstext" placeholder="Schreiben Sie hier ihre Bewertung rein" rows="5"></textarea>
            </div>
            <div class="form-group text-center mt-4">
                <button  type="submit" class="btn btn-outline-success" id="save_review">Abschicken</button>
            </div>
            </form>
        </div>
        <?php
        $sql = "SELECT AVG(bewertung) as avg ,COUNT(bewertungsID) as anzahl FROM webshop.bewertung WHERE burgerID=".$_GET['burgerID'];
        $result=db_query($sql);
        $r=$result->fetch_assoc();
        $avgbewertung=round($r['avg']);
        ?>
        <div class='col-sm text-center pt-3'>
            <div class="">
                <div class="card mx-5">
                    <div class="card-body text-center shadow">
                        <div class="row">
                            <div class="col-sm text-center">
                                <h1 class="text-warning mt-4 mb-4">
                                    <b><span id="average_rating"><?php echo round($r['avg'], 2); ?></span> / 5</b>
                                </h1>
                                <div class="mb-3">
                                    <?php
                                    $i=0;
                                    while($i<$avgbewertung){
                                        echo "<i class='fas fa-star text-warning'></i>";
                                        $i++;
                                    };
                                    $j=0;
                                    while($j<5-$avgbewertung){
                                        echo "<i class='fas fa-star star-light'></i>";
                                        $j++;
                                    };
                                    ?>

                                </div>
                                <h3><span id="total_review"><?php echo round($r['anzahl']); ?></span> Bewertungen</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
        <?php
        $sql="SELECT * FROM webshop.bewertung, webshop.kunde WHERE bewertung.kundenID=kunde.kundenID AND burgerID=".$_GET['burgerID']." LIMIT 6";
        $result=db_query($sql);
        while($row=$result->fetch_assoc()){
            echo "
                        <div class='mt-3'>
                        <div class='col'>
                            <div class='card shadow text-center'>
                                <div class='card-header'><b>".$row['vorname']."</b></div>
                                <div class='card-body'>";
            $i=0;
            while($i<$row['bewertung']){
                echo "<i class='fas fa-star text-warning'></i>";
                $i++;
            };
            $j=0;
            while($j<=5-$row['bewertung']-1){
                echo "<i class='fas fa-star star-light'></i>";
                $j++;
            }echo"
                                      </div>
                                     <p class='pt-3'>".$row['bewertungstext']."</p>
                                    <div class='card-footer text-right'>".$row['datum']."</div>
                                </div>
                            </div>
                        </div>
                
                        ";
        }
        ?>
    </div>
</div>


<?php
include 'footer.php';
?>

<style>
    .progress-label-left
    {
        float: left;
        margin-right: 0.5em;
        line-height: 1em;
    }
    .progress-label-right
    {
        float: right;
        margin-left: 0.3em;
        line-height: 1em;
    }
    .star-light
    {
        color:#e9ecef;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        var rating_data = 0;

        $(document).on('mouseenter', '.submit_star', function () {

            var rating = $(this).data('rating');
            reset_background();
            for (var count = 1; count <= rating; count++) {
                $('#submit_star_' + count).addClass('text-warning');
            }
        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {

                $('#submit_star_' + count).addClass('star-light');

                $('#submit_star_' + count).removeClass('text-warning');

            }
        }

        $(document).on('mouseleave', '.submit_star', function () {

            reset_background();

            for (var count = 1; count <= rating_data; count++) {

                $('#submit_star_' + count).removeClass('star-light');

                $('#submit_star_' + count).addClass('text-warning');
            }

        });

        $(document).on('click', '.submit_star', function () {

            rating_data = $(this).data('rating');
            document.getElementById("bewertungvalue").setAttribute("value", rating_data);

        });
    });
</script>
</body>
</html>


