<?php
session_start();
// echo $_SESSION["image"]["url"];




if (isset($_SESSION["image"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>StockRoom NFT | <?php echo $_SESSION["image"]["title"] ?> </title>
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="images/logo.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        require "loading.php";
        ?>
        <div class="bg-div" style="background-image: url('<?php echo $_SESSION['image']["url"] ?>');">

        </div>
        <div class="contain-div">
            <div class="img-div" style="background-image: url('<?php echo $_SESSION['image']["url"] ?>');">

            </div>
            <div class="m-div">
                <div class="des-div">
                    <div style="text-align: center;">
                        <h1><?php echo $_SESSION["image"]["title"] ?></h1>
                    </div>
                    <h3 class="price">Price: <?php echo " Rs." . $_SESSION["image"]["price"] ?></h3>
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <!-- <button class="b" id="d" onclick="buy('<?php echo $_SESSION['image']['id']; ?>');">Buy Nft</button></br> -->

                        <a href="mailto:stockroomnft@gmail.com?subject=Buy%20Nft&body=<?php echo "Hi!,I%20wanna%20contact%20you%20about%20buying%20this%20nft%20:%20" . str_replace(" ", "%20", $_SESSION["image"]["title"]) ?>">Contact us</a>


                    <?php
                    } else if (isset($_SESSION["admin"])) {

                    ?>
                        <button class="b" id="d" onclick="window.location='adminPannel.php'">Edit Nft</button></br>
                    <?php
                    } else {
                    ?>
                        <!-- <button class="b" onclick='window.location="login.php"'>Buy Nft</button></br> -->
                        <a href="mailto:stockroomnft@gmail.com?subject=Buy%20Nft&body=<?php echo "Hi!,I%20wanna%20contact%20you%20about%20buying%20this%20nft%20:%20" . str_replace(" ", "%20", $_SESSION["image"]["title"]) ?>">Contact us</a>

                    <?php
                    }



                    ?>

                    <h2>Description</h2>
                    <p><?php echo $_SESSION["image"]["description"] ?></p>



                </div>
            </div>
        </div>








        <div class="back" id="back" onclick="history.back()">

        </div>
        <?php
        require "pointer.php";
        ?>
        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script>
            window.addEventListener('mousemove', function(event) {
                var x = event.clientX;
                var y = event.clientY;
                var point = document.getElementById("point");
                point.style = "top:" + y + "px;left:" + x + "px";


            })
        </script>


        <script>
            // Called when user completed the payment. It can be a successful payment or failure
        </script>

    </body>

    </html>
<?php
} else {
    ?>
    
    <script>
        window.location="index.php";
    </script>
    <?php
}
?>