<?php
session_start();

if (isset($_SESSION["details"])) {
    require "database.php";
    $q = "SELECT * FROM `invoice` 
    INNER JOIN `images` ON `invoice`.`images_id`=`images`.`id` 
    INNER JOIN `user` ON `invoice`.`user_id`=`user`.`id` 
    INNER JOIN `admin` ON `admin`.`id`=`images`.`admin_id`
    WHERE `images`.`id`='" . $_SESSION['details'] . "';";
    $re = Dbms::s($q);
    $f = $re->fetch_assoc();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>StockRoom NFT | Details </title>
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="images/logo.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        require "loading.php";
        ?>
        <div class="bg-div" style="background-image: url('<?php echo $f["url"] ?>');">

        </div>
        <div class="contain-div">
            <div class="img-div" style="background-image: url('<?php echo $f["url"] ?>');">

            </div>
            <div class="m-div">
                <div class="des-div">
                    <div style="text-align: center;">
                        <h1><?php echo $f["title"] ?></h1>
                    </div>
                    <h3 class="price">Price: <?php echo " Rs." . $f["price"] ?></h3>
                    
                    <h3>Invoice Id : <?php echo $f["invoice_id"]?></h3>

                    

                    <h2>Description</h2>
                    <p>User : <?php echo $f["email"]?></p>
                    <p>Date : <?php echo explode(" ",$f["date_inv"])[0]?></p>
                    <p>Time : <?php echo explode(" ",$f["date_inv"])[1]?></p>
                    <p>Admin : <?php echo $f["user_name"]?></p>



                </div>
            </div>
        </div>








        <div class="back" id="back" onclick="history.back()">

        </div>
        <?php
        require "pointer.php";
        ?>
        <script src="script.js"></script>
        <script>
            window.addEventListener('mousemove', function(event) {
                var x = event.clientX;
                var y = event.clientY;
                var point = document.getElementById("point");
                point.style = "top:" + y + "px;left:" + x + "px";


            })
        </script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

        <script>
            // Called when user completed the payment. It can be a successful payment or failure
        </script>

    </body>

    </html>
<?php

} else {
?>
    <script>
        window.location = "adminpannel.php";
    </script>
<?php
}
?>