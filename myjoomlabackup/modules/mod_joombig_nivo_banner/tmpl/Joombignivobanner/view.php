<?php
/**
* @title		joombig nivo banner
* @website		http://www.joombig.com
* @copyright	Copyright (C) 2014 joombig.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die;
?>
<link rel="stylesheet" href="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_nivo_banner/tmpl/Joombignivobanner/css/default.joombig.nivo.slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_nivo_banner/tmpl/Joombignivobanner/css/nivo-slider.css" type="text/css" media="screen" />

<style>
	.slider-wrapper { 
		width: <?php echo $width_module;?>; 
		height: auto; 
		padding-left: <?php echo $left_module;?>px;
		margin: 0 auto;
	}
	.nivo-caption {
		background:<?php echo $color_des_box;?>;
		color:<?php echo $color_des_text;?>;
	}
</style>

<div class="slider-wrapper theme-default">
<div id="main-joombig-nivo-banner" class="nivoSlider">

<?php
		$count1 =1;
foreach($data as $index=>$value)
{
 ?>
	<a href="<?php echo $value['link']?>">
	<img src="<?php echo JURI::root().$value['images'] ?>" 
	data-thumb="<?php echo JURI::root().$value['images'] ?>" 
	alt="<?php echo $value['title']?>" 
	title="<?php echo $value['title']?>" />
	</a> 
 <?php 
	$count1++ ; 
} ?> 
</div>
</div>
<script>
jQuery.noConflict(); 
</script>
<?php if($enable_jQuery == 1){?>
	<script src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_nivo_banner/tmpl/Joombignivobanner/js/jquery.min.js"></script>
<?php }?>
<script>
		var  call_showcaption,call_effect,call_autoplay,call_animationSpeed,call_pausetime;
		call_showcaption = <?php echo $showcaption;?>;
		call_effect = <?php echo $effect;?>;
		call_autoplay = <?php echo $autoplay;?>;
		call_animationSpeed = <?php echo $animationSpeed;?>;
		call_pausetime = <?php echo $pausetime;?>;
		
</script>
<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_nivo_banner/tmpl/Joombignivobanner/js/jquery.nivo.slider.js"></script>






