<?php
$key = $_POST["search"];
require "database.php";
$se = "%" . $key . "%";

$res = Dbms::s("SELECT * FROM `images` WHERE `status`='Avalible' AND `title` LIKE '" . $se . "' ORDER BY `id` DESC ;");
$nr = $res->num_rows;
if ($nr > 0) {
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
} else {
    ?>
  
   

        <div class="gif" style="width:fit-content;height: fit-content;background-image: url('');padding: 10px;color:white;background-color: rgb(53,50,50);">
            <h3 style="font-family:pro;" id="oops">No Matches Found</h3>

        </div>
    

<?php
}






?>