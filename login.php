<?php
session_start();
if (isset($_SESSION['user']) || isset($_SESSION["admin"])) {
    ?>
        <script>
            window.location="index.php";
        </script>
    <?php
} else {
?>









    <!DOCTYPE html>
    <html>

    <head>
        <title>StockRoom NFT | Login</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="images/logo.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    </head>

    <body id="bo">


        <?php
        require "alert.php";
        require "loading.php"; ?>
        <div class="bg-div" style="background-image: url('images/background.png');">

        </div>
        <div class="log-main">

            <div class="login">
                <div class="signin" id="sd">
                    <div class="sign-div" id="sdn">
                        <h1 style="color:white;">Sign In</h1>
                        <input style="width: 80%;border-radius: 10px;border:none;text-align: center;height: 30px;" type="text" placeholder="Email" id="email" /><br /><br />
                        <input style="width: 80%;border-radius: 10px;border:none;text-align: center;height: 30px;" type="password" placeholder="Password" id="password1" /><br /><br />
                        <input style="width: 80%;border-radius: 10px;border:none;text-align: center;height: 30px;" type="password" placeholder="Re Enter Password" id="password2" /><br /><br />
                        <p id="err" style="background-color: tomato;color:white"></p>
                        <button class="bu" onclick="signin();">Sign In</button><br />
                        <button class="bu" onclick="showlogin();">Log In</button>
                    </div>
                    <div id="welcome-login">
                        <!-- <h1 style="margin-bottom: 5px;color: white;text-shadow:1px -1px 0 #000,-1px -1px 0 #000,  1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;">Welcome</h1>
                    <h1 style="margin-top: 5px;margin-bottom: 5px;color: white;text-shadow:1px -1px 0 #000,-1px -1px 0 #000,  1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;">To</h1>
                    <h1 style="margin-top: 5px;color: white;text-shadow:1px -1px 0 #000,-1px -1px 0 #000,  1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;">StockRoom NFT</h1> -->
                    </div>
                </div>



                <div class="log" id="ld">
                    <div class="login-div" id="ldn">
                        <h1 style="color:white;">Log In</h1>
                        <input style="width: 80%;border-radius: 10px;border:none;text-align: center;height: 30px;" type="text" placeholder="Email" id="loemail" /><br /><br />
                        <input style="width: 80%;border-radius: 10px;border:none;text-align: center;height: 30px;" type="password" placeholder="Password" id="lopassword" /><br /><br />
                        <p id="err2" style="background-color: tomato;color:white"></p>
                        <button class="bu" onclick="login();">Log In</button><br />
                        <button class="bu" onclick="showsignin();">Sign In</button>
                    </div>
                    <div id="welcome-sign" style="display: none;">
                        <!-- <h1 style="margin-bottom: 5px;color: white;text-shadow:1px -1px 0 #000,-1px -1px 0 #000,  1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;">Welcome</h1>
                    <h1 style="margin-top: 5px;margin-bottom: 5px;color: white;text-shadow:1px -1px 0 #000,-1px -1px 0 #000,  1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;">To</h1>
                    <h1 style="margin-top: 5px;color: white;text-shadow:1px -1px 0 #000,-1px -1px 0 #000,  1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;">StockRoom NFT</h1> -->
                    </div>
                </div>
            </div>

        </div>













        <?php
        require "pointer.php"; ?>

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
}
?>