<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
	if (isset($_GET["filter"])) {
		echo '<title>'. $_GET["brandName"]. ' ' . $_GET["itemName"]. ' Stores in ' . $_GET["district"] .  ', Nepal | StoreKhoj' . '</title> ';
		echo '<meta content=" ' . $_GET["brandName"] . ' ' . $_GET["itemName"]. ' authorized distributors, stores, retail stores and shops in ' . $_GET["district"] .  ', Nepal' . '" name="description" >';
		echo '<meta content=" ' . $_GET["brandName"] . ' ' . $_GET["itemName"]. ' distributors, '
			 . $_GET["brandName"] . ' ' . $_GET["itemName"]. ' stores, '
			 . $_GET["brandName"] . ' ' . $_GET["itemName"]. ' stores in '
			. $_GET["district"] .  ', Nepal' . '" name="keywords" >';
	}else if(basename($_SERVER['PHP_SELF']) == 'faq.php' ){
		echo '<title>Frequently Asked Questions | StoreKhoj</title>';
	}
	else if(basename($_SERVER['PHP_SELF']) == 'contact.php' ){
		echo '<title>Contacts | StoreKhoj</title>';
	}
	else {
		echo '<title>Find Stores in Nepal | StoreKhoj</title>';
		echo '<meta content="StoreMapper helps you to find authorized stores and retail stores of gadgets and smartphones in Nepal." name="description" >';
		echo '<meta content=\'smartphone stores, mobile stores in nepal, laptop stores in nepal, phone store in nepal, stores in nepal\' name=\'keywords\'/>';
	}
	?>

	<meta content='noodp,noydir' name='robots'/>
	<meta content='INDEX, FOLLOW' name='GOOGLEBOT'/>
	<meta content='TechLekh.com' name='author'/>

	<link type="Text/CSS" rel="stylesheet" href="layouts/css/bootstrap.min.css"/>

	<link type="Text/CSS" rel="stylesheet" href="layouts/css/style.css"/>

	<link href="layouts/semantic/dist/semantic.min.css" type="text/css" rel="stylesheet"/>

	<script src="layouts/js/jquery.min.js"></script>
	<script src="layouts/js/jquery.address.js"></script>

	<script src="layouts/semantic/dist/semantic.min.js" type="text/javascript" ></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="layouts/js/html5shiv.min.js"></script>
	<script src="layouts/js/respond.min.js"></script>
	<![endif]-->

</head>