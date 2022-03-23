<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/83d01b2ba6.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid bg-dark rounded-bottom text-white text-center">

    <a style="font-size: 12px">Kostenlose Lieferung ab 15€!</a>
</div>

<!-- Navbar -->
<div class="shadow container-fluid bg-light rounded nomargin">
    <div class="container bg-light">

<style>
    .dropdown:hover>.dropdown-menu{
        display: block;
    }
</style>

        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded border-bottom">
            <a class="navbar-brand" href="index.php">
                <i class="fa-solid fa-burger"></i>
                juicyBurger
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ueberuns.php">Über uns</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="burger.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Burger
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="burger.php?burger=alle">Alle Burger</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="burger.php?burger=beef">Beef Burger</a></li>
                            <li><a class="dropdown-item" href="burger.php?burger=chicken">Chicken Burger</a></li>
                            <li><a class="dropdown-item" href="burger.php?burger=veggie">Veggie Burger</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="impressum.php">Impressum</a>
                    </li>
                </ul>





            </div>
            <?php
            if(isset($_SESSION['angemeldet'])){
                echo "
                         
                         <div class='dropdown me-4'>
                                <div class='dropdown-toggle'  id='navbarDropdown'  data-bs-toggle='dropdown'>
                                    <i class='solid - fa fa-user'></i>
                                </div>
                                <ul class='dropdown-menu text-center' aria-labelledby='navbarDropdown'>    
                                    <li><a>Angemeldet</a></li>                       
                                    <li><a>".$_SESSION['name']."</a></li>
                                    <li class='px-2'><a>  " .$_SESSION['email']. " </a></li>
                                    <li><hr class='dropdown-divider'></li>          
                                    <li><a class='dropdown-item' href='profil.php'>Profil verwalten</a></li>     
                                     <li><hr class='dropdown-divider'></li>         
                                     <li><a class='dropdown-item' href='bestellungen.php'>Meine Bestellungen</a></li>     
                                     <li><hr class='dropdown-divider'></li>       
                                    <li><a class='dropdown-item' href='ausloggen.php'>Ausloggen</a></li>                                            
                                </ul>
                          </div>
                          <a class='btn fa-solid fa-cart-shopping' href='einkaufswagen.php'></a>";
            }else{
                echo "
                        <a  href='ausloggen.php'  class='btn btn-dark btn-round me-3 btn-sm '>
                        neue Session
                        </a> 
                        <div  onclick='$('#myModal').modal(options)'  class='btn btn-dark btn-round btn-sm' data-bs-toggle='modal' data-bs-target='#loginModal'>
                        Anmelden
                        </div> 
                        <a class='btn fa-solid fa-cart-shopping' href='einkaufswagen.php'></a>";
            }
            ?>
        </nav>


        <div class='modal fade' id='loginModal' tabindex=' -1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header border-bottom-0'>
                        <button class='close btn btn-danger' type='button' id='btnclose1'>
                            <span aria-hidden='true'>×</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class='form-title text-center mb-4'>
                            <h4>Login</h4>
                        </div>
                        <div class='d-flex flex-column text-center'>
                            <form action='login.php' method='post'>
                                <div class='form-group mb-3'>
                                    <input type='email' class='form-control' name='email'placeholder='Your email address...'>
                                </div>
                                <div class='form-group mb-3'>
                                    <input type='password' class='form-control' name='password' placeholder='Your password...'>
                                </div>
                                <input type='submit' value='Login' class='btn bg-success float-end text-white w-100' name='login-btn'>
                                <!--<button type='button' class='btn btn-dark btn-block btn-round' id='btnclose'' >Close</button>-->
                            </form>
                        </div>
                    </div>
                    <div class='modal-footer d-flex justify-content-center' >
                        <div class='signup-section' >Noch kein Konto? <a class='blue' role= 'button' onclick= 'signUp()' > Registrieren</a>.</div>
                    </div>
                </div>
            </div>
        </div>
<style>
    .test1{
        left:40% !important;
        top:10% !important
    }
</style>
        <div class='test1 modal fade' id= 'signUpModal' tabindex= '-1' role= 'dialog' aria-labelledby= 'exampleModalLabel' aria-hidden= 'true'>
            <div class='modal-dialog modal-dialog-centered' role= 'document' >
                <div class='modal-content' >
                    <div class='modal-header border-bottom-0' >
                        <button class='close btn btn-danger' type= 'button' id= 'btnclose2' >
                            <span aria-hidden= 'true' >×</span>
                        </button>
                    </div>
                    <div class='modal-body' >
                        <div class='form-title text-center mb-4' >
                            <h4>Login</h4>
                        </div>
                        <div class='d-flex flex-column text-center' >
                            <form action= 'login.php' method= 'post' >
                                <div class='input-group mb-3' >
                                    <input type= 'text' class='form-control' name= 'vorname' placeholder= 'Vorname' >
                                    <input type= 'text' class='form-control' name= 'nachname' placeholder= 'Nachname' >
                                </div>
                                <div class='input-group mb-3' >
                                    <select class='form-select' id= 'inputGroupSelect01' name= 'geschlecht' >
                                        <option selected>Geschlecht</option>
                                        <option value= '1' >weiblich</option>
                                        <option value= '2' >männlich</option>
                                        <option value= '3' >divers</option>
                                    </select>
                                </div>
                                <div class='input-group mb-3' >
                                    <label class='control-label pt-2 pe-2' for='date' >Geburtsdatum: </label>
                                    <input class='form-control' type= 'date'  id= 'date' name= 'geburtsdatum' placeholder= 'Geburtsdatum' />
                                </div>
                                <div class='input-group mb-3' >
                                    <input class='form-control' name= 'straße' placeholder= 'Straße' style= 'width: 70%' >
                                    <input class='form-control' name= 'hausnr' placeholder= 'HausNr.' >
                                </div>
                                <div class='input-group mb-3' >
                                    <input type= 'number' class='form-control' name= 'plz' placeholder= 'PLZ' >
                                    <input class='form-control' name= 'ort' placeholder= 'Ort' >
                                </div>
                                <div class='input-group mb-3' >
                                    <input type= 'text' class='form-control' name= 'iban'placeholder= 'IBAN' >
                                </div>
                                <div class='input-group mb-3' >
                                    <input type= 'email' class='form-control' name= 'email' placeholder= 'E-Mail Adresse' >
                                </div>
                                <div class='input-group mb-3' >
                                    <input type= 'password' class='form-control' name= 'password' placeholder= 'Password' >
                                </div>

                                <input type= 'submit' value= 'Registrieren' class='btn bg-success float-end text-white w-100' name= 'login-btn' >
                            </form>
                        </div>
                    </div>
                    <div class='modal-footer d-flex justify-content-center' >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function signUp(){
        $('#loginModal').modal('hide');
        $(".modal-backdrop").remove();
        $('#signUpModal').modal('show');
    };
</script>
</body>
</html>