<?php


	<div id="header">
		<div id="headerlogo">
			<h1><a href="<?php echo $this->baseurl ?>"><?php echo $app->getCfg('sitename'); ?></a></h1>		
		</div>
	</div>
		<div id="menusearch">
			<div id="sgmenu">
				<jdoc:include type="modules" name="menuload" />
			</div>
		</div>
		<div id="search">
			<jdoc:include type="modules" name="position-0" />
		</div>
						<div class="innercol">
						</div>
						
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
						
					<div class="innercol">
					</div>
				<div class="clr"></div>
				
			</div>
			<div id="footer">
				<p style="text-align:center;"><?php $sg = ''; include "templates.php"; ?></p>
			</div>	
		
		</div>
	</div>