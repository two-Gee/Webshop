<?php
session_start();
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
<div class="container text-center">
    <p class="h2">
        <i class="fa-solid fa-burger"></i>
        juicyBurger
    </p>
    <?php
    include 'db_funktionen.php';
    $gesamtpreis=0.0;
    if(isset($_SESSION['einkaufswagenID'])) {
        $result = db_query("SELECT b.burgerID AS burgerID, b.preis AS preis, b.bild AS bild, b.bezeichnung AS bezeichnung, COUNT(b.bezeichnung) AS anzahl FROM webshop.einkaufswageneintrag AS e, webshop.burger AS b WHERE e.burgerID=b.burgerID AND einkaufswagenID='" . $_SESSION['einkaufswagenID'] . "' GROUP BY b.bezeichnung");
        while ($row = $result->fetch_assoc()) {
            $gesamtpreis = $gesamtpreis + $row['anzahl'] * $row['preis'];
        }
    }
    ?>
                        <div class='row'>

                            <div class='col-sm'>
                                <div class="text-center border mt-5 shadow mx-5">
                                    <p>
                                    Zwischensumme:
                                        <i>
                                            <?php
                                            echo $gesamtpreis;
                                            ?>
                                        </i>
                                    €</p>
                                    <p>
                                        Versand:
                                        <i>
                                            <?php
                                            $versand=0;
                                            if($gesamtpreis>15){
                                               echo 0;
                                            }else{
                                                echo 4;
                                                $versand=4;
                                            }
                                            ?>
                                        </i>
                                        €</p>
                                    <p>
                                        Gesamtpreis:
                                        <i>
                                            <?php
                                            echo $gesamtpreis+$versand;
                                            ?>
                                        </i>
                                        €</p>
                            </div>

                            </div>


<div class="col-sm">
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <div id="paypal-button" style="width: 50%"></div>


<!-- Set up a container element for the button -->
<div id="paypal-button-container"></div>

<script>
    paypal.Buttons({

        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '77.44' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                    }
                }]
            });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // When ready to go live, remove the alert and show a success message within this page. For example:
                // var element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).


</script>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>

</script>
</body>
</html>


