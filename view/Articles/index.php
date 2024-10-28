<div class="container">
	<div class="card-group">
		
			<div class="card mb-3">
				<h6 class="card-header display-6">Featured :</h6>
				<img src="<?=WEBROOT2;?>/webroot/img/cards.jpg" class="card-img-top" alt="broken" style="object-fit: cover; height: 300px;">
				<div class="card-body">
					<h5 class="card-title"><?=$featured->title;?></h5>
					<p class="card-text"><?=$featured->content;?>
					<small class="text-muted">-by <?=$featured->login;?></small>
					</p>
					<a href="<?=WEBROOT2;?>/articles/read/<?=$featured->id;?>" class="btn btn-primary">Read</a>
				</div>
				<div class="card-footer">
				    <small class="text-muted"><?=$featured->dateArt;?></small>
				</div>
			</div>
		
			<div class="card mb-3">
				<h6 class="card-header display-6">Move of the week :</h6>
				<img src="https://img.youtube.com/vi/<?=$motw->link ?>/0.jpg" class="card-img-top" alt="broken" style="object-fit: cover; height: 300px;">
				<div class="card-body">
					<h5 class="card-title"><b><?=$motw->name;?></b> by <?=$motw->creator;?></h5>
					<p class="card-text">This move of the week was generated on the Cardistry discord server. Feel free to join !</p>
					<a href="https://www.youtube.com/watch?v=<?=$motw->link;?>" target="_blank" class="btn btn-danger"><i class="fab fa-youtube"></i> Youtube tutorial</a>
					<br>
					<br>
					<a href="https://discord.gg/6qPABbc42T" target="_blank" class="btn btn-secondary"><i class="fab fa-discord"></i> Cardistry discord server</a>
				</div>
				<div class="card-footer">
				    <small class="text-muted"><?=$motw->date;?></small>
				</div>
			</div>
		
	</div>
	
	<br>
	<h1 class="display-5" id="articletitle">All the articles :</h1>
	<!-- <div class="row justify-content-between">
		<div class="col-md-4">
			<form action="<?=WEBROOT2;?>/articles#articletitle" method="POST">
				<select class="form-select" name="filter" style="display: inline; width: auto;">
				  <option value="">Sort by</option>
				  <option value="new">Date (newest) [default]</option>
				  <option value="old">Date (oldest)</option>
				  <option value="az">Title (A -> Z)</option>
				  <option value="za">Title (Z -> A)</option>
				  <option value="authaz">Author (A -> Z)</option>
				  <option value="authza">Author (Z -> A)</option>
				</select>
				<button type="submit" style="vertical-align:baseline;" class="btn btn-secondary"><i class="fas fa-check"></i></button>
			</form>
		</div>
		
		<div class="col-md-4">
			<form class="d-flex" action="<?=WEBROOT2;?>/articles/search#articletitle" method="POST">
				<input class="form-control me-2" type="search" placeholder="Search articles" name="query" aria-label="Search" value="">
				<button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
				<a class="btn btn-outline-success" href="<?=WEBROOT2;?>/articles#articletitle" role="button"><i class="far fa-times-circle"></i></a>
			</form>
	    </div>
	</div> 
	
	<br>-->
	
	<div class="row">
		
		<?php
			foreach($articles as $a) {
		?>
		
		<div class="col-md-4">
			<div class="card mb-3">
				<?="<img src='".WEBROOT2."/webroot/img/". $a->thumbnail ."' onerror=\"this.onerror=null; this.src='".WEBROOT2."/webroot/img/cards.jpg'\" class='card-img-top' alt='broken' style='object-fit: cover; height: 200px;''>";?>
				<div class="card-body">
					<h5 class="card-title"><?=$a->title;?></h5>
					<p class="card-text"><?=$a->content;?>
					<small class="text-muted">-by <?=$a->login;?></small>
					</p>
					<a href="<?=WEBROOT2;?>/articles/read/<?=$a->id;?>" class="btn btn-outline-primary">Read</a>
				</div>
				<div class="card-footer">
					<small class="text-muted"><?=$a->dateArt;?></small>
				</div>
			</div>
		</div>
		
		<?php
			}
		?>
		
	</div>
</div>