<div class="container-fluid">
  <div class="row jumbotron justify-content-center">  
    <div class="col-4">
      <form method="post" action="slider-data.php" enctype="multipart/form-data">
        <label>Category</label>
        <select name="category" class="form-control"  required>
            <option value="">Choose House Type</option>
            <option value="Bedsitter">Bedsitter</option>
            <option value="One Bedroom">One Bedroom</option>
            <option value="Servant Quarter">Servant Quarter</option>
            <option value="Shared Room">Shared Room</option>
        </select><br>
       
      <label for="amount">Price range:</label>
      <input type="text" id="amount" class="form-control" readonly>       
     <input type="hidden" id="price-min" name="price-min" readonly> 
     <input type="hidden" id="price-max" name="price-max" readonly> 

    <div id="slider-range"></div>

      <label class="mt-3">Available Locations</label>
      <div class="input-group">
        <select class="form-control" name="location" id="location" class="mx-2" required="">
          <option selected>Choose location</option>
        </select>
      </div>  
        <center>
          <input type="submit" class='btn btn-primary px-3 mt-2' value="submit" name="submit">
        </center>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    
    //On load...
    setPrices(min, max);

    $( "#slider-range" ).slider({
      range: true,
      min: 2000,
      max: 20000,
      values: [ 4000, 10000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "KES" + ui.values[ 0 ] + " - KES" + ui.values[ 1 ] );
        var min =  $( "#slider-range" ).slider( "values", 0 );
        var max = $( "#slider-range" ).slider( "values", 1 );
         setPrices(min, max);
      }
    });

    
    var min =  $( "#slider-range" ).slider( "values", 0 );
    var max = $( "#slider-range" ).slider( "values", 1 );


    $( "#amount" ).val( "KES" + min +
      " - KES" + max );

    function setPrices(min, max){
      $('#price-min').val(min);
      $('#price-max').val(max);
    }


  });
</script>


