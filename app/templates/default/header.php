<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>

	<!-- CSS -->
	<?php
		helpers\assets::css(array(
			'http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css',
			'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.0.5/css/swiper.min.css',
			helpers\url::template_path() . 'css/style.css',
		))
	?>

</head>
<body>

<div class="container">
