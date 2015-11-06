<div class="">
	<!--<div class="dock-menu-footer">
		<ul class="menu-footer">
			<li class="col-xs-6 col-sm-3">
				<img src="<?php echo $prefix;?>assets/img/fira_logo_gray.png" alt="" id="logo-innovation" class="img-responsive" />
			</li>
			<li class="col-xs-7 col-sm-3 col-sm-offset-3">
				<h3>Social Media</h3>
				<a href="">Facebook</a>
				<a href="">Instagram</a>
				<a href="">Google Plus</a>
				<a href="">Twitter</a>
			</li>
			<li class="col-xs-5 col-sm-3">
				<h3>Company</h3>
				<a href="<?php echo $prefix;?>about">Fira</a>
				<a href="">Privacy Policy</a>
				<a href="">Press Kit</a>
				<a href="<?php echo $prefix;?>careers">Careers</a>
				<a href="<?php echo $prefix;?>contact">Contact Us</a>
			</li>
		</ul>
	</div> -->

	<div class="footer text-center">
		<div class="container">
			<div class="footer-bottom">
				<p>&copy;2015 Fira. Site by <a href="http://www.antikode.com">Antikode</a>.</p>
			</div>
		</div>
	</div>

</div>

<script>

$(document).ready(function() {
	$(window).scroll(function() {
		$('#phone-1').each(function(){
		var imgPos = $(this).offset().top;
		
		var topOfWindow = $(window).scrollTop();
			if (imgPos < topOfWindow+400) {
				$(this).addClass('animated fadeInDown');
				$('#text-1').addClass('animated fadeInRight delayp2');
			}
		});

		$('#text-2').each(function(){
		var imgPos = $(this).offset().top;
		
		var topOfWindow = $(window).scrollTop();
			if (imgPos < topOfWindow+550) {
				$(this).addClass('animated fadeInLeft delayp3');
			}
		});

		$('#phone-3').each(function(){
		var imgPos = $(this).offset().top;
		
		var topOfWindow = $(window).scrollTop();
			if (imgPos < topOfWindow+400) {
				$(this).addClass('animated fadeInDown delayp1');
				$('#text-3').addClass('animated fadeInRight delayp2');
			}
		});		

		$('#phone-4').each(function(){
		var imgPos = $(this).offset().top;
		
		var topOfWindow = $(window).scrollTop();
			if (imgPos < topOfWindow+400) {
				$(this).addClass('animated fadeInUp delayp1');
				$('#text-4').addClass('animated fadeInRight delayp2');
			}
		});		

		$('#phone-5').each(function(){
		var imgPos = $(this).offset().top;
		
		var topOfWindow = $(window).scrollTop();
			if (imgPos < topOfWindow+400) {
				$(this).addClass('animated fadeInLeft');
				$('#text-5').addClass('animated fadeInRight delayp2');
			}
		});

		$('#phone-6').each(function(){
		var imgPos = $(this).offset().top;
		
		var topOfWindow = $(window).scrollTop();
			if (imgPos < topOfWindow+400) {
				$(this).addClass('animated fadeInUp delayp1');
				$('#text-6').addClass('animated fadeInRight delayp2');
			}
		});

		$('#commitment').each(function(){
		var imgPos = $(this).offset().top;
		
		var topOfWindow = $(window).scrollTop();
			if (imgPos < topOfWindow+500) {
				$('#commit-title').addClass('animated fadeInUp delayp2');
				$('#commit-text-1').addClass('animated fadeInUp delayp3');
				$('#commit-text-2').addClass('animated fadeInUp delayp4');
				$('#commit-text-3').addClass('animated fadeInUp delayp5');
				$('#commit-text-4').addClass('animated fadeInUp delayp6');
				$('#commit-text-5').addClass('animated fadeInUp delayp7');
			}
		});

		$('#ourphones').each(function(){
		var imgPos = $(this).offset().top;
		
		var topOfWindow = $(window).scrollTop();
			if (imgPos < topOfWindow+400) {
				$('#ourphones-title').addClass('animated fadeInUp delayp1');
				$('#ourphones-1').addClass('animated fadeInUp delayp3');
				$('#ourphones-2').addClass('animated fadeInUp delayp4');
				$('#ourphones-3').addClass('animated fadeInUp delayp5');
			}
		});

		$('#wheretobuy').each(function(){
		var imgPos = $(this).offset().top;
		
		var topOfWindow = $(window).scrollTop();
			if (imgPos < topOfWindow+500) {
				$('#where-title').addClass('animated fadeInUp delayp2');
				$('#where-1').addClass('animated fadeInUp delayp3');
				$('#where-2').addClass('animated fadeInUp delayp4');
				$('#where-3').addClass('animated fadeInUp delayp5');
				$('#where-4').addClass('animated fadeInUp delayp6');
			}
		});
	});
});

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
    }

    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);

    $('.panel-heading a').click(function() {
        $('.panel-heading').removeClass('actives');
        $(this).parents('.panel-heading').addClass('actives');
        $('.panel-title').removeClass('actives'); 
        $(this).parent().addClass('actives'); 
    });


    $('a .navbar-brand').click(function(){
    	$('#nav-home').addClass('active');
    });

    $('#section1').parallax("50%", 0.3);
    $('#section2').parallax("50%", 0.2);
    $('#section3').parallax("50%", 0.5);
    $('#section4').parallax("50%", 0.6);

	$('#bullet-2').click(function() {
		$(this).addClass('active');
		$('#bullet-1').removeClass('active')
		$('#one_black').addClass('hidden');
		$('#one_gold').removeClass('hidden');
	});

	$('#bullet-1').click(function() {
		$(this).addClass('active');
		$('#bullet-2').removeClass('active');
		$('#one_black').removeClass('hidden animated fadeInUp delayp2');
		$('#one_gold').addClass('hidden');
	});
});

</script>