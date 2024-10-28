<div class='container'>
    <?php
        $art = $art[0];
    ?>
    <h1 class="display-4">
        <?=$art->title;?>
    </h1>
    <br>
    <p><?=$art->content;?>
    <br><br>
    <small><?="Published on ".$art->dateArt." by ".$art->login;?></small>
    <br>
    <br>
    <br>
</p>
</div>