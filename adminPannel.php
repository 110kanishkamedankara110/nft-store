<?php
session_start();
if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>StockRoom NFT | Admin Pannel</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="images/logo.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="" />
    </head>

    <body id="bo">


        <?php
        require "alert.php";
        require "loading.php";
        ?>
        <div class="head">
            <div class="s-d"> <button class="s" onclick='window.location="index.php"' id="home">Home</button>
                <button class="s2" onclick='window.location="imageUpload.php"' id="home">Upload Image</button>
            </div>
            <div class="l-d" style="color: white;cursor: pointer;margin-right: 10px;">
                <h3 style="color: white;">Admin Pannel</h3>
            </div>
        </div>
        <div class="refresh" onclick="window.location.reload();">

        </div>
        <div class="menu-but" id="menu-but" onclick="showMenu();">

        </div>
        <div class="menu" id="menu">
            <div style="margin-left: 100px;text-align: center;" id="men">
                <?php
                if (isset($_SESSION["admin"])) {
                ?>
                    <div style="text-align:center;">
                        <span style="margin-left: 10px;margin-top: 10px;cursor: pointer;"><?php echo explode("@", ($_SESSION['admin']['user_name']))['0'] ?></span>
                    </div>
                <?php
                }
                ?>


                <!-- <h1>Content</h1>
            <div class="box" onclick="sel('All')">
                <h3 style="margin-top: 3px;margin-bottom: 3px;">All</h3>
            </div>
            <div class="box" onclick="sel('gif')">
                <h3 style="margin-top: 3px;margin-bottom: 3px;">Gifs</h3>
            </div>

            <div class="box" onclick="sel('pic')">
                <h3 style="margin-top: 3px;margin-bottom: 5px;">Pics</h3>
            </div> -->
                <?php
                if (isset($_SESSION["admin"])) {
                ?>
                    <div style="text-align: center;">

                        <button class="s" onclick="logout();">Log Out</button>


                    </div>

                <?php
                }
                ?>

            </div>
        </div>
        <div class="main-div" id="main">
            <?php
            require "database.php";
            $res = Dbms::s("SELECT * FROM `images` ORDER BY `id` DESC;  ");
            $nr = $res->num_rows;
            for ($i = 0; $i < $nr; $i++) {
                $r = $res->fetch_assoc();



            ?>
                <div class="card" style="background-image: url('<?php echo $r["url"] ?>')">
                    <?php
                    if ($r["status"] == "Sold") {
                    ?>
                        <span class="gf" onclick="details('<?php echo $r['id']?>');"><?php echo $r["status"] ?></span>
                    <?php
                    } else {
                    ?>
                        <span class="gf" onclick="statChange('<?php echo $r['id']?>','<?php echo $r['status']?>');"><?php echo $r["status"] ?></span>

                    <?php
                    }
                    ?>
                </div>
            <?php

            }








            ?>


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