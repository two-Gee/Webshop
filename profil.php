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
?>
<div class="container">
    <div class="pt-3">
        <div class='text-center mb-4' >
            <h4>Profil</h4>
        </div>
        <h6 class="my-3 mt-4">Profil Daten:</h6>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="vorname" class="form-label">Vorname</label>
                <input type="text" class="form-control" id="vorname" value="test">
            </div>
            <div class="col-md-6">
                <label for="nachname" class="form-label">Nachname</label>
                <input type="text" class="form-control" id="nachname">
            </div>
            <div class="col-md-6">
                <label for="geschlecht" class="form-label">Geschlecht</label>
                <select id="geschlecht" class="form-select">
                    <option selected>Choose...</option>
                    <option>Männlich</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="geburtsdatum" class="form-label">Geburtsdatum</label>
                <input type="date" class="form-control" id="geburtsdatum">
            </div>
            <div class="col-md-6">
                <label for="straße" class="form-label">Straße</label>
                <input type="text" class="form-control" id="straße" placeholder="1234 Main St">
            </div>
            <div class="col-md-3">
                <label for="hausnummer" class="form-label">Hausnummer</label>
                <input type="text" class="form-control" id="hausnummer" placeholder="1">
            </div>
            <div class="col-md-3">
                <label for="plz" class="form-label">PLZ</label>
                <input type="number" class="form-control" id="plz" placeholder="1">
            </div>
            <div class="col-12">
                <label for="iban" class="form-label">IBAN</label>
                <input type="text" class="form-control" id="iban" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="col-12 text-center">
                <i class="ms-1 fa-solid fa-user-pen fa-2x" id="button" onclick="bearbeiten()"></i>
            </div>
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

    function bearbeiten(){
        let test=document.getElementById("vorname").getAttribute("readonly");
        var readonly=false;
        if(test==null){
            readonly=true;
            document.getElementById("nachname").setAttribute("readonly", readonly);
            document.getElementById("vorname").setAttribute("readonly", readonly);
            document.getElementById("geschlecht").setAttribute("readonly", readonly);
            document.getElementById("geburtsdatum").setAttribute("disabled", true)
            document.getElementById("straße").setAttribute("readonly", readonly);
            document.getElementById("hausnummer").setAttribute("readonly", readonly);
            document.getElementById("plz").setAttribute("readonly", readonly);
            document.getElementById("iban").setAttribute("readonly", readonly);
            document.getElementById("email").setAttribute("readonly", readonly);
            document.getElementById("password").setAttribute("readonly", readonly);
        }else{
            document.getElementById("nachname").removeAttribute("readonly");
            document.getElementById("vorname").removeAttribute("readonly");
            document.getElementById("geschlecht").removeAttribute("readonly");
            document.getElementById("geburtsdatum").removeAttribute("readonly");
            document.getElementById("straße").removeAttribute("readonly");
            document.getElementById("hausnummer").removeAttribute("readonly");
            document.getElementById("plz").removeAttribute("readonly");
            document.getElementById("iban").removeAttribute("readonly");
            document.getElementById("email").removeAttribute("readonly");
            document.getElementById("password").removeAttribute("readonly");
        }
    }

</script>
</body>
</html>



