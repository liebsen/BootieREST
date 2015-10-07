<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($meta->title) ? $meta->title . ' - Bootie': 'Bootie';?></title>
	<meta charset="utf-8"> 
	<meta name="keywords" content="<?php echo isset($meta->title) ? $meta->title : '';?>" />
	<meta name="description" content="<?php echo isset($meta->title) ? $meta->title : '';?>" />
 	<link rel="shortcut icon" href="/assets/favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/min/?g=css.default"> 
	<script type="text/javascript" src="/min/?g=js.default"></script>
</head>
<body class="default">
	<div class="container">
		<div class="row content"><?php echo $content;?></div>
	</div>
</body>
</html>