<!DOCTYPE html>
<html>
	<head>
            <title><?php wp_title(' | ', true, 'right'); ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href = "<?php bloginfo('stylesheet_url'); ?>" rel = "stylesheet">
            <?php wp_head(); ?>
	</head>
	<body>
		
            <div class = "navbar navbar-inverse navbar-static-top">
                <div class = "container">

                    <a href = "<?php echo esc_url( home_url( '/' )); ?>" class = "navbar-brand">Code95 Theme</a>

                </div>
            </div>

            <div class = "container"> 