<style>
	@media only screen and (min-width: 576px) {
		.coloutline {
			border-right: 1px solid grey;
		}
	}
</style>

	<div class="container">
		
		<h1 class="display-3 text-center">Random move generator</h1>
		<br>

		<div class="row">
			<?php
				// if(isset($_POST['diff'])) {
				// 	$diff = $_POST['diff'];
				// 	$difftxt = diff($diff)[1];
				// } else {
				// 	$diff = "";
				// 	$difftxt = "";
				// }


				$count = count($typesid);
				$class = ' coloutline';
				for($a = 0; $a < $count; $a ++) {
					// debug($random_moves);
					$move = $random_moves[$a][0];
					// debug($move);
					if($a == $count-1) {
						$class = "";
					}
					echo "
					<div class='col-sm text-center" . $class . "'>
					<h1>" . ucfirst($types[$a]->lib) ."</h1>
					<p><b>" . $move->name . "</b></p>
					<p> by " . $move->creator . "</p>
					<p>". ucfirst($move->lib) ." - ";
					$n = $move->difficulty;
					for($b = 0; $b < $n + 1; $b++) {
						echo "<i class='fas fa-star'></i>";
					}
					for($b = 0; $b < 2 - $n ; $b++) {
						echo "<i class='far fa-star'></i>";
					}
					echo "</p>";
					

					// $array = diff($move->difficulty);
					
					// echo ucfirst($array[1]) . " - ";
					// for($a = 0; $a < $array[0] + 1; $a++) {
					// 	echo "<i class='fas fa-star'></i>";
					// }
					// for($a = 0; $a < 2 - $array[0] ; $a++) {
					// 	echo "<i class='far fa-star'></i>";
					// }

					echo "<p><button type='button' class='btn btn-outline-danger' onclick='toggle(". $move->id .")'><i class='fab fa-youtube'></i> Youtube tutorial</button></p>";
					
					echo "<br><iframe style='display: none;' id=". $move->id ." src='https://www.youtube.com/embed/". $move->link ."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
					
					echo "</div>";
				}
				
				

			?>
		</div>

		<br>
        
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 text-center">
				<button type="button" class="btn btn-danger" onclick="document.location.reload()">Randomize <i class="fas fa-random"></i></button>
			</div>
			<div class="col-md-4"></div>
		</div>
		
		<br>
		
		<div class="row" id="options">
			<div class="col-md-4"></div>
			
			<div class="col-md-4 text-center">
				<h4>Filters :</h4>
				<form action="<?=WEBROOT2;?>/random_move_generator" method="POST">
					<select class="form-select" aria-label="Default select example" name="diff">
					  <option <?php //if($difftxt == "") {echo "selected";}?> value="-1">Difficulty</option>
					  <option <?php //if($difftxt == "beginner") {echo "selected";}?> value="0">Beginner</option>
					  <option <?php //if($difftxt == "intermediate") {echo "selected";}?> value="1">Intermediate</option>
					  <option <?php //if($difftxt == "advanced") {echo "selected";}?> value="2">Advanced</option>
					</select>
				<br>
				<button type="submit" class="btn btn-secondary">Apply <i class="fas fa-check"></i></button>
				<a class="btn btn-secondary" href="<?=WEBROOT2;?>/random_move_generator" role="button">Reset filters <i class="fas fa-times"></i></a>
				</form>
			</div>
		</div>
		
		<br>
		
		<div class="row">
			<h1 class="display-6">How does it work ?</h1>
			<p class="lead">This tool is designed to improve your learning in cardistry. By clicking the "Randomize" button, it picks a random cardistry
			move from our data base list, along with the move tutorial, giving you inspiration on what's next to learn.<br>
			You can customize the generation by clicking the "option" menu just above this paragraph, if you only
			want a certain difficulty or flourish type for example.</p>
		</div>
	</div>

	<script>
		function toggle(id) {
			var tut = document.getElementById(id);
				if (tut.style.display === ''){
					tut.style.display = 'none';
				}
				else {
					tut.style.display = '';
				}
		}
	</script>