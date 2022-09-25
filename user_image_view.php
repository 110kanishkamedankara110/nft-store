<?php
session_start();
// echo $_SESSION["image"]["url"];
if (isset($_SESSION["user"])) {
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
                        $url = explode(".", $_SESSION["image"]["url"]);
                        $count = count($url);
                        $ext = $url[$count - 1];
                        $name = $_SESSION["image"]["title"] . "." . $ext;

                        $im_id = $_SESSION["image"]["id"];
                        $us_id = $_SESSION["user"]["id"];

                        require "database.php";

                        $res = Dbms::s("SELECT * FROM `invoice` WHERE `user_id`='" . $us_id . "' AND `images_id`='" . $im_id . "'");
                        $nr = $res->num_rows;

                        if ($nr >= 1) {
                    ?>
                            <a class="b" style="text-decoration: none;" download="<?php echo $name ?>" id="d" href='<?php echo $_SESSION['image']['url'] ?>'>Download</a></br>

                    <?php
                        }
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
        <script>
            window.addEventListener('mousemove', function(event) {
                var x = event.clientX;
                var y = event.clientY;
                var point = document.getElementById("point");
                point.style = "top:" + y + "px;left:" + x + "px";


            })
        </script>


    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "index.php"
    </script>
<?php
}




?>