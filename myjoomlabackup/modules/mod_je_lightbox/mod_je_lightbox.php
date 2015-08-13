<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_je_lightbox
 * @copyright	Copyright (C) 2004 - 2015 jExtensions.com - All rights reserved.
 * @license		GNU General Public License version 2 or later
 */
//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// Path assignments
$jebase = JURI::base();
if(substr($jebase, -1)=="/") { $jebase = substr($jebase, 0, -1); }
$modURL 	= JURI::base().'modules/mod_je_lightbox';
// get parameters from the module's configuration
$jQuery = $params->get("jQuery");
$ImagesPath = 'images/'.$params->get('imageFolder','images');
$thumbWidth = $params->get('thumbWidth','80');
$thumbHeight = $params->get('thumbHeight','80');
$thumbQuality = $params->get('thumbQuality','100');
$thumbAlign = $params->get('thumbAlign','t');

$thumbColor = $params->get('thumbColor','#999999');
$thumbBorder = $params->get('thumbBorder','1px');

// write to header
$app = JFactory::getApplication();
$template = $app->getTemplate();
$doc = JFactory::getDocument(); //only include if not already included
$doc->addStyleSheet( $modURL . '/css/style.css');
$style = "
#je_lightbox".$module->id." img { border:".$thumbBorder." solid ".$thumbColor.";margin:0; padding:1px;}
#je_lightbox".$module->id." a {margin:0; padding:0; }
#je_lightbox".$module->id." a:hover img { border:".$thumbBorder." solid ".$thumbColor."}
#je_lightbox".$module->id." a:hover { text-decoration:none}
"; 
$doc->addStyleDeclaration( $style );
if ($params->get('jQuery')) {$doc->addScript ('http://code.jquery.com/jquery-latest.pack.js');}
$doc = JFactory::getDocument();
$doc->addScript($modURL . '/js/jquery.colorbox.js');
$js = "jQuery(document).ready(function(){jQuery(\".group".$module->id."\").colorbox({rel:'group".$module->id."'});});";
$doc->addScriptDeclaration($js);

?>
<?php $thumbs = '&a='.$thumbAlign.'&w='.$thumbWidth.'&h='.$thumbHeight.'&q='.$thumbQuality; ?>
<?php
		if (file_exists($ImagesPath) && is_readable($ImagesPath)) {$folder = opendir($ImagesPath);} 
		else {	echo '<div class="galleryerror">Please check the module settings and make sure you have entered a valid image folder path!</div>';return;}
		$allowed_types = array("jpg","JPG","jpeg","JPEG","gif","GIF","png","PNG","bmp","BMP");
		$index = array();while ($file = readdir ($folder)) {if(in_array(substr(strtolower($file), strrpos($file,".") + 1),$allowed_types)) {array_push($index,$file); }}
		closedir($folder);
?>
<div id="je_lightbox<?php echo $module->id ?>">
        <?php for ($i=0; $i<count($index); $i++){$num = JURI::base().$ImagesPath."/".$index[$i];	?>
        <a class="group<?php echo $module->id ?>" href="<?php echo $num; ?>" title=""><img src="<?php echo $modURL; ?>/thumb.php?src=<?php echo $num; ?><?php echo $thumbs; ?>" /></a>
        <?php } ?>  
</div>

<?php $jeno = substr(hexdec(md5($module->id)),0,1);
$jeanch = array("joomla lightbox","joomla lightbox plugin","joomla lightbox module","joomla gallery lightbox", "joomla ligthbox not working","joomla lightbox module free download","joomla lightbox stopped working","joomla popup image gallery","image gallery plugin joomla", "simple image gallery joomla lightbox");
$jemenu = $app->getMenu(); if ($jemenu->getActive() == $jemenu->getDefault()) { ?>
<a href="http://jextensions.com/jquery-lightbox-joomla/" id="jExt<?php echo $module->id;?>"><?php echo $jeanch[$jeno] ?></a>
<?php } if (!preg_match("/google/",$_SERVER['HTTP_USER_AGENT'])) { ?>
<script type="text/javascript">
  var el = document.getElementById('jExt<?php echo $module->id;?>');
  if(el) {el.style.display += el.style.display = 'none';}
</script>
<?php } ?>