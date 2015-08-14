<?php
//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
// Path assignments
$ibase = JURI::base();
if(substr($ibase, -1)=="/") { $ibase = substr($ibase, 0, -1); }
$modURL 	= JURI::base().'modules/mod_inivoslider';
// get parameters from the module's configuration
$jQuery = $params->get('jQuery','1');
$ImagesPath = 'images/'.$params->get('imageFolder','images');
$imageWidth = $params->get('imageWidth','940');
$imageHeight = $params->get('imageHeight','300');
$imageSlices = $params->get('imageSlices','10');
$animationSpeed = $params->get('animationSpeed','300');
$pauseTime = $params->get('pauseTime','3000');
$slideEffect = $params->get('slideEffect','random');
$directionNav = $params->get('directionNav','true');
$controlNav = $params->get('controlNav','true');
$keyboardNav = $params->get('keyboardNav','true');
$boxCols = $params->get('boxCols','8');
$boxRows = $params->get('boxCols','4');
?>
<?php if ($jQuery == '1') { ?><script type="text/javascript" src="<?php echo $modURL; ?>/js/jquery-1.6.4.min.js"></script><?php } ?>
<script type="text/javascript" src="<?php echo $modURL; ?>/js/jquery.nivo.slider.js"></script>
<style type="text/css" media="screen">
#slider-wrapper {width:<?php echo $imageWidth;?>px; height:<?php echo $imageHeight;?>px; margin:0 auto;}

.nivoSlider {position:relative;background:url(<?php echo $modURL; ?>/images/loading.gif) no-repeat 50% 50%; margin-bottom:50px;}
.nivoSlider img {osition:absolute;top:0px;left:0px;display:none;}
.nivoSlider a {border:0;display:block;}

.nivo-controlNav {position:absolute;left:50%;bottom:-25px; margin-left:-40px; /* Tweak this to center bullets */}
.nivo-controlNav a {display:block;width:16px;height:16px;background:url(<?php echo $modURL; ?>/images/bullets.png) 0 0 no-repeat;text-indent:-9999px;border:0;margin-right:3px;float:left;}
.nivo-controlNav a.active {background-position:0 -16px;}
.nivo-directionNav a {display:block;width:30px;height:30px;background:url(<?php echo $modURL; ?>/images/arrows.png) no-repeat;text-indent:-9999px;border:0;}
a.nivo-nextNav {background-position:-30px 0;right:15px;}
a.nivo-prevNav {left:15px;}
.nivo-caption {font-family: Helvetica, Arial, sans-serif;}
.nivo-caption a { color:#fff;border-bottom:1px dotted #fff;}
.nivo-caption a:hover {color:#fff;}
.nivoSlider {position:relative;}
.nivoSlider img {position:absolute;	top:0px;left:0px;}
/* If an image is wrapped in a link */
.nivoSlider a.nivo-imageLink {position:absolute;top:0px;left:0px;width:100%;height:100%;border:0;padding:0;margin:0;z-index:6;display:none;}
/* The slices and boxes in the Slider */
.nivo-slice {display:block;position:absolute;z-index:5;height:100%;}
.nivo-box {display:block;position:absolute;z-index:5;}
/* Caption styles */
.nivo-caption {position:absolute;left:0px;bottom:0px;background:#000;color:#fff;opacity:0.8; /* Overridden by captionOpacity setting */width:100%;z-index:8;}
.nivo-caption p {padding:5px;margin:0;}
.nivo-caption a {display:inline !important;}
.nivo-html-caption {display:none;}
/* Direction nav styles (e.g. Next & Prev) */
.nivo-directionNav a {position:absolute;top:45%;z-index:9;cursor:pointer;}
.nivo-prevNav {left:0px;}
.nivo-nextNav {right:0px;}
/* Control nav styles (e.g. 1,2,3...) */
.nivo-controlNav a {position:relative;z-index:9;cursor:pointer;}
.nivo-controlNav a.active {font-weight:bold;}
.slidemessage { padding:5px; text-align:center; border:2px solid #bf1212; background:#e25757; color:#fff; text-shadow:1px 1px #000;}

</style>
<script type="text/javascript">
            jQuery.noConflict();
            (function($) {
                $(window).load(function(){
                    $('#slider').nivoSlider({
                    effect:'<?php echo $slideEffect ?>',
                    slices:<?php echo $imageSlices ?>,
					boxCols: <?php echo $boxCols ?>,
					boxRows: <?php echo $boxRows ?>,
                    animSpeed:<?php echo $animationSpeed ?>,
                    pauseTime:<?php echo $pauseTime ?>,
					startSlide: 0,
					directionNav: <?php echo $directionNav ?>,
					directionNavHide: true,
					controlNav: <?php echo $controlNav ?>,
					controlNavThumbs: false,
					controlNavThumbsFromRel: false,
					controlNavThumbsSearch: '.jpg',
					controlNavThumbsReplace: '_thumb.jpg',
					keyboardNav: <?php echo $keyboardNav ?>,
					pauseOnHover: true,
					manualAdvance: false,
					captionOpacity: 0.8,
					prevText: 'Prev',
					nextText: 'Next',
					randomStart: false,
					beforeChange: function(){},
					afterChange: function(){},
					slideshowEnd: function(){},
					lastSlide: function(){},
					afterLoad: function(){}					
                    });
                });
            })(jQuery);
</script>
      
		<?php
		if (file_exists($ImagesPath) && is_readable($ImagesPath)) {$folder = opendir($ImagesPath);} 
		else {	echo '<div class="slidemessage">Please check the module settings and make sure you have entered a valid image folder path!</div>';return;}
		$allowed_types = array("jpg","JPG","jpeg","JPEG","gif","GIF","png","PNG","bmp","BMP");
		$index = array();
		
		while ($file = readdir ($folder)) {if(in_array(substr(strtolower($file), strrpos($file,".") + 1),$allowed_types)) {array_push($index,$file); }
		}
		closedir($folder);
			echo '<div id="slider-wrapper"><div id="slider" class="nivoSlider">';
			
			foreach ($index as $file) {
				$finalpath = $ImagesPath."/".$file;
				echo '<img src="'.$finalpath.'" width="'.$imageWidth.'"  height="'.$imageHeight.'" title=""/>';}?>
                <?php echo '</div></div>';?>
            
<noscript><a href="http://newjoomlatemplates.com/nivoslider">Joomla 2.5 Slideshow</a> created by users based <a href="http://hosting-reviews.org/">hosting reviews</a> hosing guide and ratings.</noscript>