<script>
	function deleteFav(id) {
        // console.log(id);
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "<?=WEBROOT2?>/favourites/deleteFav/"+id);
        xhttp.onload = function() {
            document.getElementById("row"+id).remove();
            if(!document.getElementById("table").hasChildNodes()) {
                document.getElementById("tableparent").remove();
                document.getElementById('text').innerHTML = "Your favorites list is empty. Try adding some in the <a href='<?=WEBROOT;?>/move_list'>move list</a> !"
            }
        }
        xhttp.send();
    }
</script>


<div class="container">
    <h1 class='display-6'>Your favourite moves :</h1>
    <?php
        if(!empty($favourites)) {
            echo "<table class='table align-middle'id='tableparent'>
                <thead>
                    <tr>
                    <th scope='col'>Name</th>
                    <th scope='col'>Creator</th>
                    <th scope='col'>Type</th>
                    <th scope='col'>Difficulty</th>
                    <th scope='col'>Tutorial</th>
                    <th scope='col'></th>
                    </tr>
                </thead>
                <tbody id='table'>";
            // debug($favourites);
            foreach($favourites as $f) {
                echo "<tr id=row". $f->id ."><td>".ucfirst($f->name)."</td>";
                echo "<td>".ucfirst($f->creator)."</td>";
                echo "<td>".ucfirst($f->lib)."</td>";
                echo "<td>";
                $n = $f->difficulty;
                for($b = 0; $b < $n + 1; $b++) {
                    echo "<i class='fas fa-star'></i>";
                }
                for($b = 0; $b < 2 - $n ; $b++) {
                    echo "<i class='far fa-star'></i>";
                }
                echo "</td>";
                echo "<td><a class='btn btn-danger' href='https://www.youtube.com/watch?v=". $f->link ."' role='button' target='_blank'><i class='fab fa-youtube'></i></a></td>"; 
                echo "<td><button type='button' class='btn btn-secondary' onclick='deleteFav(". $f->id .")'><i class='fas fa-trash'></i></button></td>";
            }
            
            echo "</tbody/></table>";
        }
        else {
            echo 'Your favorites list is empty. Try adding some in the <a href="'. WEBROOT2 .'/move_list">move list</a> !';
        }
    ?><p id='text'></p>
    
</div>