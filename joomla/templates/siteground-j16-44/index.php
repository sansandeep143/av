<?php
$number_of_slides = htmlspecialchars($tplparams->get('number_of_slides'));
$slider_enabled = htmlspecialchars($tplparams->get('slider_enabled'));
$indexonly = htmlspecialchars($tplparams->get('slider_frontonly'));

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<?php if ($slider_enabled == 1) { ?> <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/galleria.js"></script><?php } ?>
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->   
	<?php $menu = &JSite::getMenu();
	if ($menu->getActive() == $menu->getDefault() or ($indexonly == 0)) :?>
	<header>
	<?php else: ?>
	<header style="height: 200px; border-bottom:5px solid #404040">
	<?php endif ?>
		<div class="sitename">
			<h1><a href="<?php echo $this->baseurl ?>"><?php echo $app->getCfg('sitename'); ?></a></h1>
			<h2><?php echo $this->description; ?></h2>
		</div>
		<?php if ($menu->getActive() == $menu->getDefault() or ($indexonly == 0)) :?>
		<div id="slidewrap">
			<div id="slideshow">
				<div id="galleria">
				      <?php if ($slider_enabled == 1) {for ($i = 1; $i <= $number_of_slides; $i++) { ?>
				          <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/image<? echo $i; ?>.jpg" alt="Slideshow Image" />
				      <?php }}?>
				    </div>
				    <script>
					    Galleria.loadTheme('<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/galleria.dots.js'); 
					    $('#galleria').galleria();
				    </script>
			</div>
		</div>
		
		<?php endif ?>
		
		<?php if (  ($slider_enabled == 0) and ($menu->getActive() == $menu->getDefault() or ($indexonly == 0) )   ): ?>
			<div id="slidewrap">
				<div id="slideshow">
					<div id="galleria">
					          <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/image1.jpg" alt="Slideshow Image" />
					    </div> 
				</div>
			</div>
		
		<?php endif ?>
		
		<div id="search">
			<jdoc:include type="modules" name="position-0" />
		</div>
		
		<div class="top-menu">
			<div id="sgmenu">
				<jdoc:include type="modules" name="menuload" />
			</div>
		</div>
				
	<div class="wrapcont">
			<?php if( ($this->countModules('position-7')) and ($this->countModules('position-4') ) ) : ?>
		</section>
		<footer>
			<div id="footerwrap">
			<p style="text-align:center;"><?php $sg = ''; include "templates.php"; ?></p>
			</div>
		</footer>
	</div>