<style>
    img.gradient {
        -webkit-mask-image: linear-gradient(to bottom, grey 40%, rgba(0,0,0,0) 85%);
    }
</style>

<div class="row justify-content-center">

    <div class="col-md-10">
    
        <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
        
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <div class="carousel-inner">		  
            <?php
                for($a = 0; $a < 3; $a++) {
                    if($a == 0) {
                        $active = "active";
                    }
                    else {
                        $active = "";
                    }
                    echo "<div class='carousel-item ". $active ."'>";
                    echo "<img src='".WEBROOT2."/webroot/img/". $articles[$a]->thumbnail ."' onerror=\"this.onerror=null; this.src='".WEBROOT2."/webroot/img/cards.jpg'\" class='d-block w-100 gradient' alt='#' style='object-fit: cover; height: 550px;'>";
                    echo "<div class='carousel-caption d-none d-md-block'>";
                    echo "<h5>". $articles[$a]->title ."</h5>";
                    echo "<p>". $articles[$a]->content ."</p>";
                    echo "<a href='".WEBROOT2."/articles/read/". $articles[$a]->id ."' class='btn btn-outline-primary btn-sm'>Read</a>";
                    echo "</div></div>";
                }
            ?>
            </div>

            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
            
        </div>
        
    </div>
    
</div>

<br>

<div class="row align-items-center">
    <div class="col-md-8">
        <h1 class="display-3">What is Scrambled Cards ?</h1>
        <p class="lead">
            This website is a brand new learning plateform for cardists and cards enthusiasts. It provides a large range of resources to help you
            in your learning journey. At first, everyone struggles with finding new things to learn, or even staying motivated. We
            wanted to make a tool to help the community and make it grow easily everyday. We all start somewhere. Now you can start here.
        </p>
    </div>
    <div class="col-md-4">
        <div class="list-group">
            <a href="<?=WEBROOT2;?>/random_move_generator" class="list-group-item list-group-item-action list-group-item-primary">Random move generator</a>
            <a href="<?=WEBROOT2;?>/learning_resources" class="list-group-item list-group-item-action">Learning resources</a>
            <a href="#socialmedia" class="list-group-item list-group-item-action">Our social media</a>
            <a href="<?=WEBROOT2;?>/about" class="list-group-item list-group-item-action">About this website</a>
            <a href="<?=WEBROOT2;?>/articles/read/3" class="list-group-item list-group-item-action">Help and FAQ</a>
        </div>
    </div>
</div>
<br>

<div class="row">
    
<?php
    for($a = 3; $a < 6; $a++) {
        echo "<div class='col-sm-4'>";
        echo "<div class='card'>";
        echo "<img src='". WEBROOT . "/webroot/img/" . $articles[$a]->thumbnail ."' onerror=\"this.onerror=null; this.src='".WEBROOT2."/webroot/img/cards.jpg'\" class='card-img-top' alt='ca fonctionne pas'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>". $articles[$a]->title ."</h5>";
        echo "<p class='card-text'>". $articles[$a]->content."</p>";
        echo "<a href='".WEBROOT2."/articles/read/". $articles[$a]->id ."' class='btn btn-primary'>Lire l'article</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";			
    }
?>
</div>