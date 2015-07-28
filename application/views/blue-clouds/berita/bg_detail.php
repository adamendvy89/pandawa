<!-- Include required JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/syntaxhighlighter/scripts/shCore.js"></script>
 
<!--
    At least one brush, here we choose JS. You need to include a brush for every
    language you want to highlight
-->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/syntaxhighlighter/scripts/shBrushJScript.js"></script>
 
<!-- Include *at least* the core style and default theme -->
<link href="<?php echo base_url(); ?>asset/syntaxhighlighter/styles/shCore.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/syntaxhighlighter/styles/shThemeDefault.css" rel="stylesheet" type="text/css" />


<section id="headline">
<div class="container">
<h3>Blog<small>Berita dan Tutorial</small></h3>
</div>
</section>

<section class="container page-content">
<div class="vertical-space2"></div>
<section class="eleven columns">
<?php echo $dt_detail_berita; ?>
	<br />
	<br />
	<br />
	<br />
	     <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'pandawamultitech'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
<br class="clear" />
<div class="white-space"></div>

</section><!-- end-main-content -->

<section class="four columns offset-by-one sidebar">

<h4 class="subtitle">Categories</h4>
<div class="listbox1">
<ul>
<?php echo $dt_bidang;?>
</ul>

</div><!-- end-listbox1 -->

<br class="clear" />

<h4 class="subtitle">Promotion</h4>
<p></p>

<br class="clear" />

<h4 class="subtitle">Archives</h4>
<div class="listbox1">
<ul>
<li><a href="#">May 2012 (2)</a></li>
<li><a href="#">April 2012 (3)</a></li>
<li><a href="#">March 2012 (5)</a></li>
<li><a href="#">February 2012 (1) </a></li>
</ul>
<a href="#" class="show-all">Show All</a>
</div><!-- end-listbox1 -->


<br class="clear" />

<h4 class="subtitle">Tags</h4>
<div class="tagcloud">
<a href="#">Design</a>
<a href="#">vestibulum</a>
<a href="#">Web</a>
<a href="#">hosting</a>
<a href="#">domain</a>
<a href="#">HTML</a>
<a href="#">vestibulum</a>
<a href="#">Web</a>
<a href="#">hosting</a>
<a href="#">domain</a>
<a href="#">CSS</a>
<a href="#">vestibulum</a>
<a href="#">Web</a>
<a href="#">hosting</a>
<a href="#">domain</a>
<a href="#">Link</a>
<a href="#">vestibulum</a>
<a href="#">Web</a>
<a href="#">hosting</a>
<a href="#">domain</a>
</div>

</section><!-- end-sidebar-->
<br class="clear" />
</section><!-- container -->

<script type="text/javascript">
     SyntaxHighlighter.all()
</script>

<!-- End Document
================================================== -->

<script type="text/javascript" src="js/quentin-custom.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
