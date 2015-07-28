<section class="portfolio-box">
<section id="headline2">

<div class="container">
<h3>Produk  <small>Dengan Harga Pas di hati</small></h3>
</div>
</section>

<section class="container page-content">
<div class="vertical-space2"></div>
<nav class="primary clearfix">
<ul>
<li><a data-filter="*" class="selected" href="#">All</a></li>
<?php echo $dt_tipe_produk;?>
</ul>
</nav>

<div class="portfolio isotope" style="position: relative; overflow: hidden; height: 804px;">
<?php echo $dt_index_produk;?>

</div><!-- end-portfolio -->


<div class="sixteen columns">
<hr>
</div>

<div class="white-space"></div>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/isotope/isotope.js"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/isotope/isotope-custom.js"></script>
<script charset="utf-8" type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/js/jquery.prettyPhoto.js"></script>
				<script type="text/javascript">
	jQuery(document).ready(function($){
    
	    /* ------------------------------------------------------------------------ */
		/* Add PrettyPhoto */
		/* ------------------------------------------------------------------------ */
		
		var lightboxArgs = {			
						animation_speed: 'fast',
						overlay_gallery: true,
			autoplay_slideshow: false,
						slideshow: 5000, /* light_rounded / dark_rounded / light_square / dark_square / facebook */
									theme: 'pp_default', 
									opacity: 0.8,
						show_title: false,
			social_tools: "",			deeplinking: false,
			allow_resize: true, 			/* Resize the photos bigger than viewport. true/false */
			counter_separator_label: '/', 	/* The separator for the gallery counter 1 "of" 2 */
			default_width: 940,
			default_height: 529
		};

		jQuery('a[href$=jpg], a[href$=JPG], a[href$=jpeg], a[href$=JPEG], a[href$=png], a[href$=gif], a[href$=bmp]:has(img), a[class^="prettyPhoto"]').prettyPhoto(lightboxArgs);
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'pp_default',slideshow:3000, autoplay_slideshow: false});
		
	});
	</script>

</section><!-- container -->
</section>