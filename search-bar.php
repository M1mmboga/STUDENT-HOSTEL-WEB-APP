<div class="container-fluid" style="color:black;">
	<div class="row jumbotron justify-content-center">
		<div class="col-12 section-title">
			<p class="lead">Find the place just for you</p>
		</div>
		<form method="post" action="search.php" id="search-form" class="form-inline">
			<label>House Category</label>
			<select name="category" id="category" class="form-control mx-2">
						<option value="Bedsitter">Bedsitter</option>
						<option value="One Bedroom">One Bedroom</option>
						<option value="Servant Quarter">Servant Quarter</option>
						<option value="Shared Room">Shared Room</option>				
			</select>
			<label>Price</label>
			<input type="text" name="price" id="price" class="form-control mx-2" required="">
			<label>Available Locations</label>
			<div class="input-group mx-2">
				<select class="form-control" name="location" id="location" class="mx-2" required="">
					<option value="">Choose location</option>
				</select>
				<div class="input-group-append">
					<button type="submit" name="search-btn" class="btn btn-primary">Search</button>
					<!--<span name="message" id="error" style="color: red; font-size: 30px;"></span>-->
				</div>
			</div>		
		</form>
	</div>
</div>