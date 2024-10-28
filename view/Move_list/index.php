<style>
	#btn-back-to-top {
	    position: fixed;
	    bottom: 20px;
	    right: 20px;
	    display: none;
		width: auto;
		height: auto;
		padding: default;
		font-size: 150%;
	}
</style>

<script>
	function toggleFav(id) {
        // console.log(id);
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("heart"+id).style.color = this.responseText;
        }
        xhttp.open("GET", "<?=WEBROOT2?>/move_list/updateFav/"+id);
        xhttp.send();
    }
</script>


<div class="container">

	<div class="row justify-content-center align-items-center mb-2">
		<button	type="button" class="btn btn-primary" id="btn-back-to-top"><i class="fas fa-arrow-up fa-2x"></i></button>
	
		<div class="col-md-8">
			<div class="alert alert-primary mb-0" role="alert">
				<h4 class="alert-heading">A little explanation on how this page works :</h4>
				<p class="mb-0">
				- There is one table per move type <br>
				- Each table has moves sorted first by difficulty (from beginner [one star] to advanced [three stars]) and then alphabetically <br>
				- You can watch a move tutorial by clicking the Youtube logo button<br>
				- You can add a move to your <a>favourites</a> to help finding it again later
				</p>
			</div>
		</div>
		
        <!-- menu -->
		<div class="col-md-4">
			<div class="list-group">
				<?php
					foreach($types as $a) {
						echo "<a href='#". str_replace(' ', '', $a->lib) ."' class='list-group-item list-group-item-action'>". ucfirst($a->lib) ." moves</a>";
					}
				?>
			</div>
		</div>
	</div>

	<br>

    <!-- tableaux -->
	<div class="row justify-content-center">
		<?php
			foreach($types as $index=>$t) {
			    echo "<h3 class='display-6 text-center' id='". str_replace(' ', '', $t->lib). "'>". ucfirst($t->lib) ." moves :</h3>";
                // echo "<pre>";
                // print_r($moves[$index]);
                // echo "</pre>";
                
                echo "<div class='col-md-10 mb-5'>";
                echo "<table class='table align-middle'>
                <thead>
                	<tr>
                	  <th scope='col'>Name</th>
                	  <th scope='col'>Creator</th>
                	  <th scope='col'>Type</th>
                	  <th scope='col'>Difficulty</th>
                	  <th scope='col'>Tutorial</th>";
                	  if($this->session->isLogged()) {
                        echo "<th scope='col'></th>";
                      }
                echo "</tr>
                </thead>
                <tbody>";
                foreach($moves[$index] as $a) {
					$color = "white";
					if (!empty($a->idFav)) {
						$color = "red";
					}
					$n = $a->difficulty;
                    echo "<tr>";
                    echo "<th scope='row'>". $a->name ."</th>";
                    echo "<td>". $a->creator ."</td>";
                    echo "<td>". ucfirst($t->lib) ."</td>";
                    echo "<td>";
					for($b = 0; $b < $n + 1; $b++) {
						echo "<i class='fas fa-star'></i>";
					}
					for($b = 0; $b < 2 - $n ; $b++) {
						echo "<i class='far fa-star'></i>";
					}
					echo "</td>";
                    echo "<td><a class='btn btn-outline-danger' href='https://www.youtube.com/watch?v=". $a->link ."' role='button' target='_blank'><i class='fab fa-youtube'></i></a></td>";
                    if($this->session->isLogged()) {
                        echo "<td><button type='button' class='btn btn-dark' onclick='toggleFav(". $a->id .")'><i class='fas fa-heart' id='heart".$a->id."' style='color:". $color ."'></i></button></td>";
                      }
                    echo "</tr>";
                }
                echo "</tbody></table>";
				echo "</div>";
			}
		?>
		
	</div>
</div>
<!-- <script>
	//Get the button
	let mybutton = document.getElementById("btn-back-to-top");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
	  scrollFunction();
	};

	function scrollFunction() {
	  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		mybutton.style.display = "block";
	  } else {
		mybutton.style.display = "none";
	  }
	}
	// When the user clicks on the button, scroll to the top of the document
	mybutton.addEventListener("click", backToTop);

	function backToTop() {
	  document.body.scrollTop = 0;
	  document.documentElement.scrollTop = 0;
	}
</script> -->