<div class="container-fluid" style="color:black;">
	<div class="row jumbotron justify-content-center">
		<div class="col-12 section-title">
			<p class="lead">Find the place just for you</p>
		</div>
		<form method="post" action="php/search.php" id="search-form" class="form-inline">
			<label>Location</label>
			<input type="text" name="location" id="location" class="form-control mx-2" required="">
			<label>Price</label>
			<input type="text" name="price" id="price" class="form-control mx-2" required="">
			<label>Category</label>
			<div class="input-group mx-2">
				<select class="form-control" name="category" id="category" class="mx-2" required="">
					<option value="">Choose category</option>
				</select>
				<div class="input-group-append">
					<button type="submit" name="search-btn" class="btn btn-primary">Search</button>
					<!--<span name="message" id="error" style="color: red; font-size: 30px;"></span>-->
				</div>
			</div>		
		</form>
	</div>
</div>