<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- Icono desplegable -->
	<script type="text/javascript">
		$(document).ready(function() {							
			$().UItoTop({ easingType: 'easeOutQuart' });					
			});
	</script>
<!-- //Acabo icono desplegable -->