<?php
$key = $_POST["search"];
require "database.php";
$se="%".$key."%";

$res = Dbms::s("SELECT * FROM `nft`.`images` WHERE `status`='Avalible' AND `title` LIKE '".$se."' ORDER BY `id` DESC ;");
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








?>