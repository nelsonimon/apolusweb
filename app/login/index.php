<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Barateiros</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Avant">
    <meta name="author" content="The Red Team">
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.ico" />

    <!-- <link href="assets/less/styles.less" rel="stylesheet/less" media="all"> -->
    <link rel="stylesheet" href="../../assets/css/styles.min.css?=113">
    <link href='../../assets/css/css.css' rel='stylesheet' type='text/css'>
    
    <!-- <script type="text/javascript" src="assets/js/less.js"></script> -->
</head><body class="focusedform">

<div class="verticalcenter">
	<a href="index.htm"><img src="../../assets/img/logo-big.png" alt="Logo" class="brand" /></a>
	<div class="panel panel-primary">
		<div class="panel-body">
			<h4 class="text-center" style="margin-bottom: 25px;">Área Restrita</h4>
			
				<form action="login" name="form-login" id="form-login" class="form-horizontal" style="margin-bottom: 0px !important;" method="post">
						<div class="form-group">
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="login" id="login" placeholder="login">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" class="form-control" name="senha" id="senha" placeholder="senha">
								</div>
							</div>
						</div>
						<div class="clearfix">
							<?php
							if($mensagem)
							{
								echo '<div class="alert alert-danger">'.$mensagem."</div>";
							}

							?>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<button  class="btn btn-primary">Login</button>
							</div>
						</div>
					</form>
					
		</div>
		<div class="panel-footer">
			<a href="extras-forgotpassword.htm" class="pull-left btn btn-link" style="padding-left:0">Esqueceu a Senha?</a>
			
			<div class="pull-right">
				<a href="#" class="btn btn-default">Voltar</a>
			</div>
		</div>
	</div>
 </div>
      
</body>
</html>