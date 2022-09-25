<?php
session_start();
if (isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<html>

<head>
    <title>StockRoom NFT | Home</title>
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
        <div class="s-d"> <button class="s" onclick='window.location="index.php"' id="home">Home</button></div>
        <div class="l-d" style="color: white;cursor: pointer;margin-right: 10px;">
        <h3 style="color: white;">My Nft</h3>
        </div>
    </div>
    <div class="refresh"  onclick="window.location.reload();">

    </div>
    <div class="menu-but" id="menu-but" onclick="showMenu();">

    </div>
    <div class="menu" id="menu">
        <div style="margin-left: 100px;text-align: center;" id="men">
            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <div style="text-align:center;">
                    <span style="margin-left: 10px;margin-top: 10px;cursor: pointer;"><?php echo explode("@", ($_SESSION['user']['email']))['0'] ?></span>
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
            if (isset($_SESSION["user"])) {
            ?>
                <div style="text-align: center;">

                    <button class="s" onclick="logout();">Log Out</button>


                </div>

            <?php
            } else {
            ?>
                <div style="text-align: end;">

                    <button class="s" onclick='window.location="login.php"';>Log In</button>


                </div>
            <?php
            }
            ?>

        </div>
    </div>
    <div class="main-div" id="main">
        <?php
        require "database.php";
        $res = Dbms::s("SELECT `images`.`id` AS `id`,`images`.`url` AS `url`,`images`.`price` 
        AS `price`,`images`.`status` AS `status`,`images`.`description` AS `description`,`images`.`date` 
        AS `date`,`images`.`title` AS `title`,`invoice`.`invoice_id` AS `inv_id`,`invoice`.`date_inv` AS `invDate`  FROM `images` INNER JOIN `invoice` 
        ON `images`.`id`=`invoice`.`images_id` WHERE `invoice`.`user_id`='".$_SESSION['user']['id']."'  ORDER BY `invoice`.`id` DESC");
        $nr = $res->num_rows;
        for ($i = 0; $i < $nr; $i++) {
            $r = $res->fetch_assoc();

            $ext = explode(".", $r["url"]);
            $c = count($ext);
            $extenction = $ext[$c - 1];
            if ($extenction == "GIF" || $extenction == "Gif" || $extenction == "gif") {
        ?>
                <div class="card" onclick="userimage(<?php echo $r['id'] ?>);" style="background-image: url('<?php echo $r["url"] ?>')">
                    <span class="gf">Gif</span>
                </div>
            <?php
            } else {
            ?>
                <div class="card" onclick="userimage(<?php echo $r['id'] ?>);" style="background-image: url('<?php echo $r["url"] ?>')">

                </div>

        <?php
            }
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
}else{
    ?>
    <script>window.location="index.php"</script>
    <?php
}
?>
