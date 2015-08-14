<?php/** * @version		$Id: index.php $ * @package		Joomla.Site * @copyright	Copyright (C) 2009 - 2012 SiteGround.com - All Rights Reserved. * @license		GNU General Public License version 3 or later; see LICENSE.txt     *	This program is free software: you can redistribute it and/or modify *  it under the terms of the GNU General Public License as published by *  the Free Software Foundation, either version 3 of the License, or *  (at your option) any later version. *  This program is distributed in the hope that it will be useful, *  but WITHOUT ANY WARRANTY; without even the implied warranty of *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the *  GNU General Public License for more details. *  You should have received a copy of the GNU General Public License *  along with this program.  If not, see <http://www.gnu.org/licenses/>. */// No direct access.
defined('_JEXEC') or die;JHTML::_('behavior.framework', true);/* The following line gets the application object for things like displaying the site name */$app = JFactory::getApplication();$tplparams	= $app->getTemplate(true)->params;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"><head>	<jdoc:include type="head" />	<!-- The following line loads the template CSS file located in the template folder. -->	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" /></head>
<body id="page_bg">
	<div id="header">
		<div id="headerlogo">
			<h1><a href="<?php echo $this->baseurl ?>"><?php echo $app->getCfg('sitename'); ?></a></h1>		
		</div>
	</div>	<div id="wrapper">
		<div id="menusearch">
			<div id="sgmenu">
				<jdoc:include type="modules" name="menuload" />
			</div>
		</div>
		<div id="search">
			<jdoc:include type="modules" name="position-0" />
		</div>		<div id="content_m">			<?php if ($this->countModules( 'position-7 and position-4' )) : ?>			<div class="maincol">			 				<?php elseif( $this->countModules( 'position-7' ) ) : ?>			<div class="maincol_w_left">			<?php elseif( $this->countModules( 'position-4' ) ) : ?>			<div class="maincol_w_right">			<?php else: ?>			<div class="maincol_full">			<?php endif; ?>				<?php if( $this->countModules('position-7') ) : ?>					<div class="leftcol">
						<div class="innercol">							<jdoc:include type="modules" name="position-7" style="rounded"/>
						</div>					</div>					<?php endif; ?>						<div class="cont">
						
							<?php if( $this->countModules('position-5') ) : ?>
								<div class="leftcol" id="pos5">
									<div class="innercol">
										<jdoc:include type="modules" name="position-5" style="rounded"/>
									</div>
								</div>
							<?php endif; ?>
							
							<?php if( $this->countModules('position-6') ) : ?>
								<div class="leftcol" id="pos6">
									<div class="innercol">
										<jdoc:include type="modules" name="position-6" style="rounded"/>
									</div>
								</div>
							<?php endif; ?>
							
							<?php if ($this->countModules( 'position-7 or position-4' )) : ?>
								<div class="clr"></div>
							<?php endif; ?>
													<jdoc:include type="component" />						</div>				<?php if( $this->countModules('position-4') ) : ?>				<div class="rightcol">
					<div class="innercol">						<jdoc:include type="modules" name="position-4" style="rounded"/>
					</div>				</div>				<?php endif; ?>
				<div class="clr"></div>
							</div>			</div>	
			</div>
			<div id="footer">
				<p style="text-align:center;"><?php $sg = ''; include "templates.php"; ?></p>
			</div>				</div>
		
		</div>
	</div></body></html>