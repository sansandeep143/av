<?if( $sg == 'banner' ):?>
	<?php if (JRequest::getVar('view') == 'frontpage'):?>
	<!-- SIDE BEGIN --><!-- SIDE END -->
	<?php endif?>
<?else:?>
 	<?php echo $app->getCfg('sitename'); ?>, Powered by <a href="http://joomla.org/" class="sgfooter" target="_blank">Joomla!</a>
	<?php $menu = &JSite::getMenu();
	$sgfrontpage = /*SGFRONTPAGE BEGIN*/0/*SGFRONTPAGE END*/;
	if ($menu->getActive() == $menu->getDefault() || $sgfrontpage):?>
		<!-- FOOTER BEGIN --><a href="http://www.siteground.com/mac-hosting.htm" target="_blank">Mac hosting</a> by SiteGround<!-- FOOTER END -->
	<?php endif ?>
<?endif;?>