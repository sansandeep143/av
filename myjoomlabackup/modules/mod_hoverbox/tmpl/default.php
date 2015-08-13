<?php
/**
 * @package		Hoverbox
 * @subpackage	Hoverbox
 * @author		Joomla Bamboo - design@joomlabamboo.com
 * @copyright 	Copyright (c) 2013 Joomla Bamboo. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @version		1.0.3
 */

defined( '_JEXEC' ) or die( 'Restricted access' );?>
<?php
if($mainframe->getCfg('caching')) {	// prettyPhoto Styles ?>
		<link rel="stylesheet" href="<?php echo $modbase ?>/css/hoverBox.css" type="text/css" />

		<style type="text/css">
		.hoverBox<?php echo $id ?> {float: <?php echo $boxposition ?>;width:<?php echo $boxwidth  ?>}.hoverBox<?php echo $id ?>  a img{margin-right:<?php echo $rightMargin ?>px;width: <?php echo $thumbWidth?>px;height:<?php echo $thumbHeight?>px}	.hoverBox<?php echo $id ?> a {width: <?php echo $thumbWidth ?>px;height:<?php echo $thumbHeight ?>px }  .hoverBox<?php echo $id ?>  a:hover img {margin-top:<?php echo $hoverTopOffset ?>px;margin-left:<?php echo $hoverLeftOffset ?>px}
		</style>
<?php }
 if($mainframe->getCfg('caching') && ($prettyPhoto)) {	// prettyPhoto Styles ?>
	<link rel="stylesheet" href="<?php echo $library ?>prettyPhoto/css/prettyPhoto.css" type="text/css" />
	<script type="text/javascript" src="<?php echo $library?>prettyPhoto/js/jquery.prettyPhoto.js"></script>
<?php }?>
<?php if($prettyPhoto) { // prettyPhoto Scripts?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		 jQuery('a[rel^=\'prettyOverlay\'],a[rel^=\'prettyPhoto<?php echo $id ?>\']').prettyPhoto({
			animation_speed: '<?php echo $prettyBoxSpeed ?>',
			show_title: <?php echo $prettyBoxTitle ?>,
			opacity:  <?php echo $opacity ?> ,
			allowresize: <?php echo $resize ?>,
			counter_separator_label: '/',
			overlay_gallery: <?php echo $overlayGallery ?>,
			theme:  '<?php echo $theme ?>'
		});
	});
	</script>
<?php }?>
<!-- Start Joomla Bamboo Pretty Box -->
<?php if (count($items)>0){?>
<div class="hoverBox hoverBox<?php echo $id ?>">
<?php foreach($items as $item){
	echo $item;
}?>
</div>
<div class="clear"></div>
<?php }else{
	echo 'No Images Found!';
}?>
<!-- End Joomla Bamboo Pretty Box -->
