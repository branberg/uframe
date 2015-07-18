<?php
	header("X-XSS-Protection: 0");
	
	if (!empty($_POST)){
		//do this stuff if a form is submitted
		$code = $_POST['code'];
		$width = $_POST['width'];
		$height = $_POST['height'];
		$background = $_POST['background'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>uFrame</title>
	<link rel="icon" type="image/png" href="library/img/favicon.png" />
	
	<link rel="stylesheet" href="library/css/main.css">

	<!-- Meta Description and whatnot -->
	<meta name="description" content="uFrame: embed previewer for designers."/>
	<link rel="canonical" href="http://uframe.branhub.net/" />
	
	<!-- FB OG Tags -->
	<meta property='og:locale' content='en_US'/>
	<meta property='og:type' content='website'/>
	<meta property='og:title' content='uFrame: embed previewer for designers.'/>
	<meta property='og:description' content='uFrame is an app that makes it easier for designers to generate and use embeds in their mockups.'/>
	<meta property='og:url' content='http://uframe.branhub.net/'/>
	<meta property='og:site_name' content='uFrame'/>

	<?php if( !empty($_POST) ): ?>
		<style type="text/css">
			body{
				background-color: <?php echo $background; ?>;
			}
			#preview_frame{
				width: <?php echo $width; ?>px;
				height: <?php echo $height; ?>px;
			}
			#preview_frame iframe{
				display: block;
				width: 100% !important;
				height: 100% !important;
			}
		</style>
	<?php endif; ?>

</head>
<body>
	
	<?php include_once("analyticstracking.php") ?>
	
	<div id="controls">

		<a href="/" id="logo">uFrame</a>

		<form action="" method="POST">

			<label for="code">iframe code</label>
			<textarea name="code" autofocus placeholder="enter iframe code here..."><?php echo (!empty($_POST) ? $code : ''); ?></textarea>

			<label for="width">width (px)</label>
			<input type="text" name="width" placeholder="<?php echo (!empty($_POST) ? $width : "500"); ?>" />

			<label for="height">height (px)</label>
			<input type="text" name="height" placeholder="<?php echo (!empty($_POST) ? $height : "350"); ?>" />

			<label for="background">background color (hex)</label>
			<input type="text" name="background" placeholder="<?php echo (!empty($_POST) ? $background : "#f2f2f2"); ?>" />

			<input type="submit" value="Submit" />

		</form>

		<div id="credits">
			Made by <a href="http://branberg.com" target="_blank">Sam Brannon</a>
		</div>

	</div>

	<div id="preview_wrap">
		
		<div id="preview_frame">
			<?php if(!empty($_POST)): ?>

				<?php echo($code); ?>

			<?php else: ?>

				<h1>uFrame: embed previewer for designers.</h1>
				<p>uFrame is an app that makes it easier for designers to generate and use embeds in their mockups.</p>
				<p>Simply provide the embed code, set the size of embed, choose a background color then rock and roll.</p>

				<h2>How-to</h2>
				<ol>
					<li><strong>Copy some iframe code</strong> from somewhere (Youtube, Soundcloud, Spotify, Vimeo, etc) and paste it in the first box</li>
					<li><strong>Set the width and height of the embed</strong>. Some embeds might not play nicely with this if they are not responsive (eg: Spotify).</li>
					<li><strong>Set the background color</strong>. Some embeds (looking at you Soundcloud) have rounded corners that show the colors below, this makes sure the bg color of the embed will match your mockup.</li>
				</ol>

			<?php endif; ?>

		</div>

	</div>

</body>
</html>