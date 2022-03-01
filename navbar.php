<div class="container-fluid bg-dark rounded-bottom text-white text-center">

    <a style="font-size: 12px">Kostenloser Versand ab 15€!</a>
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
                Burger
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
                        <a class="nav-link" href="impressum.php">Über uns</a>
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
                <a class="float-right">
                    <a  onclick="$('#myModal').modal(options)"  class="btn btn-dark btn-round" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </a>
                </a>
            </div>
        </nav>
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button class="close btn btn-danger" type="button" id="btnclose1">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center mb-4">
                            <h4>Login</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form action="login.php" method="post">
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" name="email"placeholder="Your email address...">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" class="form-control" name="password1" placeholder="Your password...">
                                </div>
                                <input type="submit" value="Login" class="btn bg-success float-end text-white w-100" name="login-btn">
                                <!--<button type="button" class="btn btn-dark btn-block btn-round" id="btnclose"">Close</button>-->
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="signup-section">Noch kein Konto? <a class="blue" role="button" onclick="signUp()" > Registrieren</a>.</div>
                    </div>
                </div>
            </div>
        </div>
        <?php

        ?>
        <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button class="close btn btn-danger" type="button" id="btnclose2">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-title text-center mb-4">
                            <h4>Login</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form action="login.php" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="password1" placeholder="Vorname">
                                    <input type="text" class="form-control" id="password1" placeholder="Nachname">
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected>Geschlecht</option>
                                        <option value="1">weiblich</option>
                                        <option value="2">männlich</option>
                                        <option value="3">divers</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="control-label pt-2 pe-2" for="date">Geburtsdatum: </label>
                                    <input class="form-control" type="date"  id="date" name="date" placeholder="Geburtsdatum"/>
                                </div>
                                <div class="input-group mb-3">
                                    <input class="form-control" placeholder="Straße" style="width: 70%">
                                    <input class="form-control" placeholder="HausNr.">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="password1" placeholder="PLZ">
                                    <input class="form-control" id="password1" placeholder="Ort">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="email1"placeholder="IBAN">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="email1"placeholder="E-Mail Adresse">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password1" placeholder="Password">
                                </div>

                                <input type="submit" value="Registrieren" class="btn bg-success float-end text-white w-100" name="login-btn">
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
?>