<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/83d01b2ba6.js" crossorigin="anonymous"></script>
    <style>
        .overlay{
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top:35%;
            left:50%;
            transform: translate(-50%, -50%);
        }

        .bildcontainer:hover .produktbild{
            opacity: 0.2;
            transform: scale(1.05);

        }
        .produktbild{
            transition: .5s ease;
        }
        .bildcontainer:hover .overlay{
            opacity: 1;
        }

    </style>
    <?php
    function db_connect()
    {
        $dbserver 	= "localhost";
        $dbuser 	= "root";
        $dbpasswort	= "";
        $dbname 	= "webshop";
        $dbconn 		= new mysqli($dbserver, $dbuser, $dbpasswort, $dbname);
        if($dbconn->connect_error){
            die("Connection failed:" .$dbconn->connect_error);
        }
        return $dbconn;
    }
    function db_query($sql)
    {
        //if (TESTMODUS) {echo $sql;}
        $dbconn=db_connect();
        $result=$dbconn->query($sql);
        $dbconn->close();
        return $result;
    }
    ?>
</head>
<body class="bg-light">
<?php
include ('navbar.php');
?>

<div class ="container mt-4">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
        if ($_GET['burger']=='alle'){
            $_GET['burger']=null;
            $result=db_query("Select * FROM burger");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $r=(db_query('Select * FROM kategorie WHERE kategorieID='.$row['kategorieID']))->fetch_assoc();

                    echo "


                          <div class='col'>";
                    echo    "<div class='card'>
                                <div class='bildcontainer'>
                                    <div class='produktbild'>      
                                        <img src='bilder/".$row['bild']."' class='card-img-top' alt='...'>
                                     </div> 
                                     <div class='overlay text-center'>
                                                <form action='einkaufswagenverwalten.php' method='post'>
                                                    <input type='hidden' name='id' value='".$row['burgerID']."'>
                                                    <input type='hidden' name='anzahl' value='1'>
                                                <button type='submit' class='mb-3 btn btn-outline-dark btn-sm'><i class='h5  fa-solid fa-cart-shopping'></i> Zum Einkaufswagen hinzufügen</button>
                                                </form>
                                                <a class='mb-3 btn btn-outline-dark btn-sm' href='burgerdetails.php?id=1'><i class='h5  fa-solid fa-cart-shopping'></i> Zum Einkaufswagen hinzufügen</a>
                                                <a class='btn btn-outline-dark btn-sm' href='burgerdetails.php?id=1'><i class='h5 fa-solid fa-info'></i> Produktdetails ansehen</a> 
                                      </div>
                                  </div>
                                <div class='card-body'>
                                    <h5 class='card-title text-center'>".$row['bezeichnung']."</h5>
                                    <p class='card-title text-center'>Kategorie: ".$r['bezeichnung']."</p>
                                    <p class='card-text pt-3' style='height: 80px'>".$row['beschreibung']."</p>
                                </div>
                              </div>
                            </div>";

                }
                // Free result set
                $result->free_result();
            } else{
                echo "No records matching your query were found.";
            }
        }elseif($_GET['burger']=='beef' OR$_GET['burger']=='chicken'OR $_GET['burger']=='veggie') {
            $kategorie = 0;
            if ($_GET['burger'] == 'beef') {
                $kategorie = 1;
            }
            if ($_GET['burger'] == 'chicken') {
                $kategorie = 2;
            }
            $_GET['burger']=null;
            $result = db_query("Select * FROM burger WHERE kategorieID=" . $kategorie);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo "<div class='col'>";
                    echo "<div class='card'>";
                    echo "<img src='bilder/" . $row['bild'] . "' class='card-img-top' alt='...'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title text-center'>" . $row['bezeichnung'] . "</h5>";
                    echo "<p class='card-text pt-3' style='height: 80px'>" . $row['beschreibung'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                }
                // Free result set
                $result->free_result();
            } else {
                echo "No records matching your query were found.";
            }
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

</script>
</body>
</html>