<p>
  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
  </p>
 
<div id="slider-range"></div>


<script type="text/javascript">
  $(document).ready(function () {
     var maximum = $("#max").val();
     var minimum = $("#min").val();
   
   $( "#slider-range" ).slider({
      range: true,
      min: 1000,
      max: maximum,
      values: [2000, 4000],
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#amount").val( $("#slider-range").slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );
  });
</script>
