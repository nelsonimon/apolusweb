<?php
    session_start();
    // if(!isset($_SESSION["id_usuario"])){
    //     header("location:../login/index");
    // }

    if(!isset($pathassets))
    $pathassets="../../assets/";
?>
<!DOCTYPE html>
    <html lang="pt_br">
    <head>
    	<meta charset="utf-8">
    	<title>Apolus</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	
    	<meta name="author" content="Nelson Imon">
<!-- 
        <meta name="description" content="Comunidade que reúne as melhores ofertas da internet. De usuário para usuários">
        <meta name="abstract" content="Sempre as melhores ofertas. De usuário para usuários.">
        <meta name="keywords" content="melhores ofertas, promoções, promoção, descontos, desconto, cupom, e-commerce. Encontrou uma oferta legal e abaixo do preço normal? Compartilhe!">
        <meta name="robot" content="All">
        <meta name="rating" content="general">
        <meta name="distribution" content="global">
        <meta name="language" content="PT">
        
        <meta property="og:title" content="Barateiros">
        <meta property="og:description" content="Sempre as melhores ofertas! De usuario... para usuario.">
        <meta property="og:image" content="http://www.barateiros.com.br/printscreens.jpg">
        <meta property="og:site_name" content="Barateiros">
        <meta property="og:url" content="http://www.barateiros.com.br/?x=1">
 -->
        <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.ico" />

        <!-- <link href="less/styles.less" rel="stylesheet/less" media="all">  -->
        <link rel="stylesheet" href="<?php echo $pathassets; ?>css/styles.css?=121">
        <link href='<?php echo $pathassets; ?>css/css.css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

    	 
            <link href='<?php echo $pathassets; ?>demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='styleswitcher'> 
        
                <link href='<?php echo $pathassets; ?>demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='headerswitcher'> 
        
    	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    	<!--[if lt IE 9]>
            <link rel="stylesheet" href="<?php echo $pathassets; ?>css/ie8.css">
    		<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
            <script type="text/javascript" src="<?php echo $pathassets; ?>plugins/charts-flot/excanvas.min.js"></script>
    	<![endif]-->

    	<!-- The following CSS are included as plugins and can be removed if unused-->

    <link rel='stylesheet' type='text/css' href='<?php echo $pathassets; ?>plugins/form-daterangepicker/daterangepicker-bs3.css' /> 
    <link rel='stylesheet' type='text/css' href='<?php echo $pathassets; ?>plugins/fullcalendar/fullcalendar.css' /> 
    <link rel='stylesheet' type='text/css' href='<?php echo $pathassets; ?>plugins/form-markdown/css/bootstrap-markdown.min.css' /> 
    <link rel='stylesheet' type='text/css' href='<?php echo $pathassets; ?>plugins/codeprettifier/prettify.css' /> 
    <link rel='stylesheet' type='text/css' href='<?php echo $pathassets; ?>plugins/form-toggle/toggles.css' /> 
    <link rel='stylesheet' type='text/css' href='<?php echo $pathassets; ?>/plugins/datatables/dataTables.css' />
    <link rel='stylesheet' type='text/css' href='<?php echo $pathassets; ?>/plugins/chosen/chosen.css' />

    <!-- <script type="text/javascript" src="<?php echo $pathassets; ?>js/less.js"></script> -->
    </head>

<body class="">