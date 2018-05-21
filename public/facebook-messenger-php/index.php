<?php
function facebook_messenger($page, $domain = ""){
    define("FACEBOOK_MESSENGER_IMAGES", $domain."/facebook-messenger-php/images/facebook-messenger.svg");
    define("FACEBOOK_MESSENGER_BACKGOUND", "#3a5897");
    define("FACEBOOK_MESSENGER_SMALL_HEADER", "true");
    define("FACEBOOK_MESSENGER_HIDE_COVER", "false");
    define("FACEBOOK_MESSENGER_LANG", "en_US");
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $domain ?>/facebook-messenger-php/css/messenger.css" >
    <style type="text/css">
        .drag-wrapper .thing .circle {
            background: <?php echo FACEBOOK_MESSENGER_BACKGOUND ?>;
        }
    </style>
    <div class="drag-wrapper">
		<div data-drag="data-drag" class="thing">
			<div class="circle facebook-messenger-avatar">
				<img class="facebook-messenger-avatar" src="<?php echo FACEBOOK_MESSENGER_IMAGES ?>" />
			</div>
			<div class="content">
				<div class="inside">
					<div class="fb-page" data-width="310" data-height="310" data-href="<?php echo $page ?>" data-tabs="messages" data-small-header="<?php echo FACEBOOK_MESSENGER_SMALL_HEADER ?>"  data-hide-cover="<?php echo FACEBOOK_MESSENGER_HIDE_COVER ?>" data-show-facepile="true" data-adapt-container-width="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $page ?>"><a href="<?php echo $page ?>">Loading...</a></blockquote></div></div>
 				</div>
			</div>
		</div>
		<div class="magnet-zone">
			<div class="magnet"></div>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo $domain ?>/facebook-messenger-php/js/jquery.event.move.js"></script>
    <script type="text/javascript" src="<?php echo $domain ?>/facebook-messenger-php/js/rebound.min.js"></script>
    <script type="text/javascript" src="<?php echo $domain ?>/facebook-messenger-php/js/index.js"></script>
    
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/<?php echo FACEBOOK_MESSENGER_LANG ?>/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php
}

?>