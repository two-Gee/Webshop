<?php
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
<?php
include 'navbar.php';
include 'db_funktionen.php';
$sql= 'SELECT * FROM webshop.kunde WHERE kundenID=' .$_SESSION['kundenID'];
$result=db_query($sql);
$r=$result->fetch_assoc();
?>
<div class="container">
    <div class="py-3">
        <div class='text-center mb-4' >
            <h4>Profil</h4>
        </div>
        <h5 class="my-3 mt-4">Persönliche Daten: <i class="ms-1 fa-solid fa-user-pen" id="button" onclick="bearbeiten()"></i></h5>
        <form class="row g-3" action="profilAktualisieren.php" method="post">
            <div class="col-md-6">
                <label for="vorname" class="form-label">Vorname</label>
                <input type="text" name="vorname" class="form-control" id="vorname" value="<?php echo $r['vorname'] ?>" readonly >
            </div>
            <div class="col-md-6">
                <label for="nachname" class="form-label">Nachname</label>
                <input type="text" class="form-control" name="nachname" id="nachname" value="<?php echo $r['nachname'] ?>" readonly >
            </div>
            <div class="col-md-6" id="geschlechtdiv">
                <label for='geburtsdatum1' class='form-label'>Geschlecht</label><input type='text' class='form-control' id='nachname' value='<?php echo $r['geschlecht'] ?>' readonly >
            </div>
            <div class="col-md-6">
                <label for="geburtsdatum" class="form-label">Geburtsdatum</label>
                <input type="date" name="geburtsdatum" class="form-control" id="geburtsdatum" value="<?php echo $r['geburtsdatum'] ?>" readonly>
            </div>
            <div class="col-md-9">
                <label for="straße" class="form-label">Straße</label>
                <input type="text" name="straße" class="form-control" id="straße" value="<?php echo $r['Straße'] ?>"readonly>
            </div>
            <div class="col-md-3">
                <label for="hausnummer" class="form-label">Hausnummer</label>
                <input type="text" name="hausnummer" class="form-control" id="hausnummer" value="<?php echo $r['Hausnummer'] ?>"readonly>
            </div>
            <div class="col-md-6">
                <label for="plz" class="form-label">PLZ</label>
                <input type="number" name="plz" class="form-control" id="plz" value="<?php echo $r['PLZ'] ?>"readonly>
            </div>
            <div class="col-md-6">
                <label for="ort" class="form-label">Ort</label>
                <input type="text" name="ort" class="form-control" id="ort" value="<?php echo $r['Ort'] ?> "readonly>
            </div>
            <div class="col-12">
                <label for="iban" class="form-label">IBAN</label>
                <input type="text" name="iban" class="form-control" id="iban" value="<?php echo $r['IBAN'] ?>"readonly>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $r['EMail'] ?>"readonly>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" readonly>
            </div>
            <div id="buttonaendern"></div>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<script>
//Funktion um Textfelder entwerder readonly zu haben oder bearbeiten zu können
    function bearbeiten(){
        let test=document.getElementById("vorname").getAttribute("readonly");
        var readonly=false;
        if(test==null){
            readonly=true;
            document.getElementById("nachname").setAttribute("readonly", readonly);
            document.getElementById("vorname").setAttribute("readonly", readonly);
            document.getElementById("geburtsdatum").setAttribute("readonly", true)
            document.getElementById("straße").setAttribute("readonly", readonly);
            document.getElementById("geschlechtdiv").innerHTML="<label for='geschlecht' class='form-label'>Geschlecht</label><input type='text' class='form-control' id='geschlecht' value='<?php echo $r['geschlecht'] ?>' readonly >";
            document.getElementById("hausnummer").setAttribute("readonly", readonly);
            document.getElementById("plz").setAttribute("readonly", readonly);
            document.getElementById("iban").setAttribute("readonly", readonly);
            document.getElementById("email").setAttribute("readonly", readonly);
            document.getElementById("ort").setAttribute("readonly", readonly);
            document.getElementById("password").setAttribute("readonly", readonly);
            document.getElementById("buttonaendern").innerHTML="";
        }else{

            document.getElementById("nachname").removeAttribute("readonly");
            document.getElementById("vorname").removeAttribute("readonly");
            document.getElementById("geburtsdatum").removeAttribute("readonly");
            document.getElementById("straße").removeAttribute("readonly");
            document.getElementById("geschlechtdiv").innerHTML="<label for='geschlecht' class='form-label'>Geschlecht</label><select id='geschlecht' name='geschlecht' class='form-select'> <option value='1'>Weiblich</option> <option value='2'>Männlich</option> <option value='3'>Divers</option> </select>";
            document.getElementById("hausnummer").removeAttribute("readonly");
            document.getElementById("plz").removeAttribute("readonly");
            document.getElementById("iban").removeAttribute("readonly");
            document.getElementById("ort").removeAttribute("readonly");
            document.getElementById("email").removeAttribute("readonly");
            document.getElementById("password").removeAttribute("readonly");
            document.getElementById("buttonaendern").innerHTML="<input type='submit' value='Daten aktualisieren' class='btn bg-success float-end text-white w-100' name='aendern'>";

        }
    }

</script>
</body>
</html>



