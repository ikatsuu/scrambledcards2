<div class="container">
	<h1>Update MOTW :</h1>
	<form action="<?=WEBROOT2;?>/admin" method="POST">
	  <div class="mb-3">
		<label for="link" class="form-label">Link</label>
		<input type="text" class="form-control" id="link" name="link" required>
	  </div>
	  <div class="mb-3">
		<label for="name" class="form-label">Name</label>
		<input type="text" class="form-control" id="name" name="name" required>
	  </div>
	  <div class="mb-3">
		<label for="creator" class="form-label">Creator</label>
		<input type="text" class="form-control" id="creator" name="creator" required>
	  </div>
	  
	  
	  <div class="mb-3">
		  <label for="diff">Difficutly :</label>
		  <select class="form-select" name="difficulty" id="diff" required>
			<option value="0" selected>Beginner</option>
			<option value="1">Intermediate</option>
			<option value="2">Advanced</option>
		  </select>
	  </div>
	  
	  <div class="mb-3">
		  <label for="movetype">Move type :</label>
		  <select class="form-select" name="idMoveType" id="movetype" required>
			<option value="1" selected>One handed</option>
			<option value="2">Two handed</option>
			<option value="3">Aerial</option>
		  </select>
	  </div>
	  
	  
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<br>