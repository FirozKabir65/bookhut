<div class="container-fluid">
	<div class="row">
		<div class="footer col-md-12">
			<ul class="text-center">
				<li>
					<a href="google.com">About Us</a>
				</li>
				<li>|</li>
				<li>
					<a href="faq.php">FAQs</a>
				</li>
			</ul>
			<hr>
			<p class="text-center">&copy; <?php echo date("Y"); ?> Book Hut. All Rights Reserved | By <i>Iffat, Firoz, Sabi.</i></p>
		</div>
	</div>
</div>

<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="js/jquerylib.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/modernizr-custom.js"></script> 

<script> 	    
	$(document).ready(function(){
		$(".search-field").hide();
		$("#search").click(function(){ 	       
			$(".search-field").slideToggle();
		}); 	    
	});   
</script>