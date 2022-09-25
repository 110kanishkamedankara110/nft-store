<?php
session_start();
?>


<?php
    require "database.php";
    require "alert.php";
    require "loading.php";
    ?>
<?php
    $s = "SELECT * FROM `images` WHERE `status`='Avalible' ORDER BY `id` DESC LIMIT 5 OFFSET 0 ; ";
    $e = Dbms::s($s);
    $numb = $e->num_rows;

    ?>
<!DOCTYPE html>
<html>

<head>
    <title>StockRoom NFT | Home</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="images/logo.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body id="bo" <?php if($numb==0){ echo "onload='letters()' "; }else{ echo "onload='carSet();'";}?>>

    <div class="head">
        <div class="s-d"> <input type="text" placeholder="Search" style="display: in;" id="search" class="search" /><button class="s" onclick="search();" id="search">Search</button></div>
        <div class="l-d">
            <div class="logo" onclick="window.location='index.php'"></div>
        </div>
    </div>
    <div class="refresh" onclick="window.location.reload();">

    </div>
    <div class="menu-but" id="menu-but" onclick="showMenu();">

    </div>
    <div class="menu" id="menu">
        <div style="margin-left: 100px;text-align: center;" id="men">
            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <div style="text-align:start;">
                    <h4 style="margin-left: 10px;margin-top: 10px;cursor: pointer;margin-bottom: 10px;"><?php echo explode("@", ($_SESSION['user']['email']))['0'] ?></h4>
                </div>
                <div style="text-align:start;">
                    <span style="margin-left: 10px;margin-top: 10px;cursor: pointer;" class="user" onclick="window.location='userPage.php'">My Nft</span>
                </div>
            <?php
            }
            if (isset($_SESSION["admin"])) {
            ?>
                <div style="text-align:start;">
                    <h4 style="margin-left: 10px;margin-top: 10px;cursor: pointer;margin-bottom: 10px;"><?php echo explode("@", ($_SESSION['admin']['user_name']))['0'] ?></h4>
                </div>
                <div style="text-align:start;">
                    <span style="margin-left: 10px;margin-top: 10px;cursor: pointer;" class="user" onclick="window.location='adminPannel.php'">Admin Pannel</span>
                </div>
            <?php
            }
            ?>


            <h1>Content</h1>
            <div class="box" onclick="sel('All')">
                <h3 style="margin-top: 3px;margin-bottom: 3px;">All</h3>
            </div>
            <div class="box" onclick="sel('gif')">
                <h3 style="margin-top: 3px;margin-bottom: 3px;">Gifs</h3>
            </div>

            <div class="box" onclick="sel('pic')">
                <h3 style="margin-top: 3px;margin-bottom: 5px;">Pics</h3>
            </div>
            <?php
            if (isset($_SESSION["user"]) || isset($_SESSION["admin"])) {
            ?>
                <div style="text-align: end;">

                    <button class="s" onclick="logout();">Log Out</button>


                </div>

            <?php
            } else {
            ?>
                <div style="text-align: end;">

                    <button class="s" onclick='window.location="login.php"' ;>Log In</button>


                </div>
            <?php
            }
            ?>

        </div>
    </div>
  

<?php
        if ($numb == 0) {
        ?>
            <div style="display:flex;align-items:center ;justify-items: center;width: 100%;height: 90vh;background-image: url('images/de6xdn4-124de4e2-01d1-4779-b825-97f722da4927.png');border-radius: 0;" class="gif">
              
                 <div class="gif" style="width:fit-content;height: fit-content;background-image: url('');padding: 10px;" >
                <h3 style="font-family:pro;" id="oops"></h3>

                </div>
            </div>
        <?php
        } else {
?>

    <div class="carosel" id="car">



       
    
            <div class="car-div1" id="imm">

                <div class="c-b">
                    <?php
                    for ($i = 0; $i < $numb; $i++) {
                    ?>
                        <div class="b-d" onclick="change(<?php echo $i ?>);" id="c<?php echo $i ?>"></div>
                    <?php
                    } ?>



                </div>
            </div>
            <div class="car-div2">

                <?php
                for ($i = 0; $i < $numb; $i++) {
                    $im = $e->fetch_assoc(); ?>
                    <div class="new-itm" onclick="viewimage(<?php echo $im['id'] ?>);">
                        <div class="new-im" style="background-image: url(<?php echo $im['url'] ?>);">
                            <span class="gf">New</span>
                        </div>
                        <div class="new-des">
                            <h3 style="margin: 0;">Rs.<?php echo $im["price"] ?>.00</h3>
                            <h4 style="margin: 0;"><?php echo $im["title"] ?></h4>
                            <div style="text-align: end;">
                                <span><?php echo $im["date"] ?></span>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>






            </div>

    </div>
    <div class="main-div" id="main">
        <?php

            $res = Dbms::s("SELECT * FROM `images` WHERE `status`='Avalible' ORDER BY `id` DESC");
            $nr = $res->num_rows;
            for ($i = 0; $i < $nr; $i++) {
                $r = $res->fetch_assoc();

                $ext = explode(".", $r["url"]);
                $c = count($ext);
                $extenction = $ext[$c - 1];
                if ($extenction == "GIF" || $extenction == "Gif" || $extenction == "gif") {
        ?>
                <div class="card" style="background-image: url('<?php echo $r["url"] ?>')" onclick="viewimage(<?php echo $r['id'] ?>);">
                    <span class="gf">Gif</span>
                </div>
            <?php
                } else {
            ?>
                <div class="card" style="background-image: url('<?php echo $r["url"] ?>')" onclick="viewimage(<?php echo $r['id'] ?>);">

                </div>

    <?php
                }
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