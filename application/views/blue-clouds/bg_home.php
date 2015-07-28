
  <!-- start-home-content-->
  <section class="container home-content">
  <!-- Quentin-Iconbox-start -->
    <div class="vertical-space1"></div>
    <ul id="main-ibox" class="sixteen columns omega">
      <li>
        <div class="mbx-img"> <img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/respo-sc01.png" alt="" /></div>
        <h5><strong>Web Design</strong></h5>
        <p>Jasa pembuatan website dan toko online dengan banyak fitur.</p>
        <a href="#" class="magicmore">Learn more</a></li>
      <li>
        <div class="mbx-img"> <img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/s-c-ico3.png" alt="" /></div>
        <h5>Software Development</h5>
        <p>Kami menawarkan jasa pembuatan software payroll, klinik, inventory dan aplikasi penjualan. </p>
        <a href="#" class="magicmore">Learn more</a></li>
      <li>
        <div class="mbx-img"> <img width="70px" src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/s-k-ico2.png" alt="" /></div>
        <h5>Mobile Application</h5>
        <p>Menerima jasa sms masking dan jasa pembuatan aplikasi berbasis android. </p>
        <a href="#" class="magicmore">Learn more</a></li>
    </ul>
    <script type="text/javascript">
		$('ul#main-ibox li:nth-child(2)').addClass('active9');
		$('ul#main-ibox li').mouseover(function() {
		$('li.active9').removeClass('active9'), $('li:hover').addClass('active9');
		}).mouseout(function() {
		$('li.active9').removeClass('active9'), $('ul#main-ibox li:nth-child(2)').addClass('active9')
		});
		</script>
    <div class="vertical-space1"></div>
	
    <!-- Latest Projects - Start -->
    <div class="vertical-space1"></div>
  </section>
  <section class="home-portfolio">
    <div class="container">
      <div class="sixteen columns">
        <h4 class="subtitle">Latest Our Products </h4>
      </div>
      <div class="clear"></div>
      <div class="jcarousel-container">
        <div class="jcarousel-clip">
          <ul id="latest-projects" class="jcarousel-list">
            <?php echo $dt_produk;?>
            
            <!-- end-portfolio-item-->
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- home-portfolio -->
  <section class="container">
    <div class="vertical-space2"></div>
    <!-- Latest Projects-end -->
    <!-- Latest-from-Blog-start -->
    <?php echo $dt_list_berita; ?>
    <!-- Latest-from-Blog-end -->
	<!-- Our-Clients- start -->
    <div class="sixteen columns">
      <h4 class="subtitle">Partners</h4>

          <ul id="our-clients" class="our-clients">
            <li><a href="http://www.codegero.com/"><img src="<?php echo base_url(); ?>asset/images/codegero.png" alt="" /></a></li>
            <li><a href="http://www.pandawaframework.com/"><img src="<?php echo base_url(); ?>asset/images/pandawaframework.png" alt="" /></a></li>
            <li><img src="<?php echo base_url(); ?>asset/theme/<?php echo $_SESSION['site_theme']; ?>/images/clients/logo-03.png" alt="" /></li>
            <li><img src="<?php echo base_url(); ?>asset/images/dreamcore.jpg" alt="" /></li>
          </ul>

    </div>
	<!-- Our-Clients- end -->
    <div class="vertical-space2"></div>
  </section>
  <!-- end- -->
