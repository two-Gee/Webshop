<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/83d01b2ba6.js" crossorigin="anonymous"></script>
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
            $result=db_query("Select * FROM burger");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){

                    echo "<div class='col'>";
                    echo    "<div class='card'>";
                    echo        "<img src='".$row['bild']."' class='card-img-top' alt='...'>";
                    echo        "<div class='card-body'>";
                    echo            "<h5 class='card-title'>".$row['bezeichnung']."</h5>";
                    echo            "<p class='card-text pt-3' style='height: 80px'>".$row['beschreibung']."</p>";
                    echo        "</div>";
                    echo    "</div>";
                    echo  "</div>";

                }
                // Free result set
                $result->free_result();
            } else{
                echo "No records matching your query were found.";
            }
        }
        $kategorie=0;
        if ($_GET['burger']=='beef'){
            $kategorie=1;
        }
        if ($_GET['burger']=='chicken'){
            $kategorie=2;
        }
        $result=db_query("Select * FROM burger WHERE kategorieID=".$kategorie);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

                echo "<div class='col'>";
                echo    "<div class='card'>";
                echo        "<img src='".$row['bild']."' class='card-img-top' alt='...'>";
                echo        "<div class='card-body'>";
                echo            "<h5 class='card-title'>".$row['bezeichnung']."</h5>";
                echo            "<p class='card-text pt-3' style='height: 80px'>".$row['beschreibung']."</p>";
                echo        "</div>";
                echo    "</div>";
                echo  "</div>";

            }
            // Free result set
            $result->free_result();
        } else{
            echo "No records matching your query were found.";
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