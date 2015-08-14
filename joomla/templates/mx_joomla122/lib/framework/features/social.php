<?php
/*---------------------------------------------------------------
# Package - Joomla Template based on Sboost Framework   
# ---------------------------------------------------------------
# Author - mixwebtemplates http://www.mixwebtemplates.com
# Copyright (C) 2010 - 2015 mixwebtemplates.com. All Rights Reserved.
# Website: http://www.mixwebtemplates.com 
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');
?>
<ul class="social-icons">
<?php if ($this->getParam('facebook_icon')) : ?>
<li><a href="<?php echo ($this->getParam('facebook_icon')); ?>" title="facebook"><i class="fa fa-facebook top"></i><i class="fa fa-facebook bottom" ></i></a></li>
<?php endif; ?>
<?php if($this->getParam('twitter_icon')) : ?>
<li><a href="<?php echo ($this->getParam('twitter_icon')); ?>" title="twitter"><i class="fa fa-twitter top"></i><i class="fa fa-twitter bottom"></i></a></li>
<?php endif; ?>
<?php if($this->getParam('flickr_icon')) : ?>
<li><a href="<?php echo ($this->getParam('flickr_icon')); ?>" title="flickr"><i class="fa fa-flickr top"></i><i class="fa fa-flickr bottom"></i></a></li>
<?php endif; ?>
<?php if($this->getParam('google_icon')) : ?>
<li><a href="<?php echo ($this->getParam('google_icon')); ?>" title="google-plus"><i class="fa fa-google-plus top"></i><i class="fa fa-google-plus bottom"></i></a></li>
<?php endif; ?>
<?php if($this->getParam('linkedin_icon')) : ?>
<li><a href="<?php echo ($this->getParam('linkedin_icon')); ?>" title="linkedin"><i class="fa fa-linkedin top"></i><i class="fa fa-linkedin bottom"></i></a></li>
<?php endif; ?>
<?php if($this->getParam('pinterest_icon')) : ?>
<li><a href="<?php echo ($this->getParam('pinterest_icon')); ?>" title="pinterest"><i class="fa fa-pinterest top"></i><i class="fa fa-pinterest bottom"></i></a></li>
<?php endif; ?>
<?php if($this->getParam('youtube_icon')) : ?>
<li><a href="<?php echo ($this->getParam('youtube_icon')); ?>" title="youtube"><i class="fa fa-youtube top"></i><i class="fa fa-youtube bottom"></i></a></li>
<?php endif; ?>
<?php if($this->getParam('instagram_icon')) : ?>
<li><a href="<?php echo ($this->getParam('instagram_icon')); ?>" title="instagram"><i class="fa fa-instagram top"></i><i class="fa fa-instagram bottom"></i></a></li>
<?php endif; ?>
<?php if($this->getParam('tumblr_icon')) : ?>
<li><a href="<?php echo ($this->getParam('tumblr_icon')); ?>" title="tumblr"><i class="fa fa-tumblr top"></i><i class="fa fa-tumblr bottom"></i></a></li>
<?php endif; ?>
<?php if($this->getParam('dribbble_icon')) : ?>
<li><a href="<?php echo ($this->getParam('dribbble_icon')); ?>" title="dribbble"><i class="fa fa-dribbble top"></i><i class="fa fa-dribbble bottom"></i></a></li>
<?php endif; ?>
<?php if($this->getParam('rssfeed_icon')) : ?>
<li><a href="<?php echo ($this->getParam('rssfeed_icon')); ?>" title="rss"><i class="fa fa-rss top"></i><i class="fa fa-rss bottom"></i></a></li>
<?php endif; ?>
</ul>