        <div class="padded-container">
			<div class="container-fluid bg-default">
				<nav class="bg-default">
					<div class="row">
						<div class="footer-socket clearfix">
						  <div id="footer-socket-social" class="social-media-buttons pull-left list-inline">
								 <?php my_social_media_icons();?>
							</div>
							<?php
								   /**
									* Displays a navigation menu
									* @param tierone
									*/
									$args = array(
										'theme_location' => 'footer-menu',
										'menu_class' => 'menu-right pull-right',
										'menu_id' => 'footer_menu',
									);
								
									wp_nav_menu( $args );
							?>
						</div>
					</div>
				</nav>
			</div>
		</div>
        <footer itemscope itemtype="http://schema.org/WPFooter">
			<div class="padded-container">
				<div class="container-fluid text-center bg-default footer-wrap">
					<p><?php _e('<small>&copy; 2016. All Rights Reversed.</small>','tierone')?></p>
				</div>
			</div>
        </footer><!--end of footer-->
        <?php wp_footer(); ?>
<section id="unblocker">
	<div id="unblocker-div">
		<a href="#" target="_blank" rel="nofollow" data-toggle="modal" data-target="#unblockerModal"><img src="http://www.agenterpercayaqq188.com/albums/id/unblocker.gif" alt="nawala unblocker"></a>
      	<a id="unblocker-close" href="javascript:void(0)">[x]</a>
	</div>
</section>
<div class="modal fade" id="unblockerModal" tabindex="-1" role="dialog" aria-labelledby="unblockerModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="unblockerModalLabel">Nawala Unblocker</h4>
      </div>
      <div class="modal-body">
	<div class="container-fluid">
		<ol>
			<li>Download Nawala Unblocker</li>
			<li>Install dan Jalankan</li>
			<li>Pilih " Google Public DNS " dan Tekan Flush DNS</li>
			<li>Lalu Klik " Apply DNS "</li>
			<li>Buka browser dan Ketik QQ288</li>
		</ol>
		<a href="http://agenterpercayaqq188.com/misc/DnsJumper.zip" rel="nofollow" class="btn btn-lg btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download</a><br/>
		<p>Selamat bermain dan Sukses selalu</p>
		<div class="text-center">
			<img src="http://www.agenterpercayaqq188.com/albums/id/dns-jumper.png">
		</div>
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){jQuery('a#unblocker-close').on('click', function(){jQuery('section#unblocker').hide();});})
</script>
<section class="mobile-secs">
    <h2 style="display:none;">QQ Mobile</h2>
    <div class="mobile-div">
        <div class="row">
            <div class="mob mob-qq188"><a href="http://m.qq188.com/"><div class="mob-logo mobl-qq188"></div></a></div>
            <div class="phn phn-qq188"><a href="http://m.qq188.com/"><i class="fa fa-mobile fa-4_5x"></i></a></div>
        </div>
        <div class="row">
            <div class="mob mob-qq288"><a href="http://m.qq288.com/"><div class="mob-logo mobl-qq288"></div></a></div>
            <div class="phn phn-qq288"><a href="http://m.qq288.com/"><i class="fa fa-mobile fa-4_5x"></i></a></div>
        </div>
        <div class="row">
            <div class="mob mob-qq101"><a href="http://m.qq101.com/"><div class="mob-logo mobl-qq101"></div></a></div>
            <div class="phn phn-qq101"><a href="http://m.qq101.com/"><i class="fa fa-mobile fa-4_5x"></i></a></div>
        </div>
    </div>
    <div class="qq-mobile-logo"></div>
</section>

<script>
jQuery(document).ready(function($){
	var myBool = false;
	jQuery('.qq-mobile-logo').on('click', function() {
		if (myBool) {	jQuery('section.mobile-secs').stop(true,false).animate({left : "-231px"},500);	}
		else {	jQuery('section.mobile-secs').stop(true,false).animate({left : "0px"},500);	}
		myBool = !myBool;
	});
});
</script>
    </body>
</html>