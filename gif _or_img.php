<?php
$ext = $_POST["ext"];
require "database.php";

if ($ext=="gif") {
    $res = Dbms::s("SELECT * FROM `images` WHERE (`status`='Avalible') AND (`url` LIKE '%.gif' OR `url` LIKE '%.Gif') ORDER BY `id` DESC ;");
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
}else if($ext=="pic"){
    $res = Dbms::s("SELECT * FROM `images` WHERE (`status`='Avalible') AND (`url` NOT LIKE '%.gif' OR `url` NOT LIKE '%.Gif') ORDER BY `id` DESC ;");
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
}else{

    $res = Dbms::s("SELECT * FROM `images` WHERE `status`='Avalible' ORDER BY `id` DESC ;");
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