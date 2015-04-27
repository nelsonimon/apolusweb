 <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
 	<a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
 	<a id="rightmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="left" title="Toggle Infobar"></a>

 	<div class="navbar-header pull-left">
 		<a class="navbar-brand" href="index.htm"></a>
 	</div>
 	<ul class="nav navbar-nav pull-right toolbar">
 		<li class="dropdown">
 			<a href="#" class="dropdown-toggle username" data-toggle="dropdown"><span class="hidden-xs"><?php echo strtoupper($_SESSION["login_usuario"]); ?><i class="fa fa-caret-down"></i></span><i class="fa fa-user"></i></a>
 			<ul class="dropdown-menu userinfo arrow">
 				<li class="username">
 					<a href="#">
 						<div class="pull-left"><i class="fa fa-user"></i></div>
 						<div class="pull-right"><h5>Olá <?php echo  $_SESSION["apelido_usuario"]; ?>!</h5><small>Logado como	<span><?php echo strtoupper($_SESSION["login_usuario"]); ?></span></small></div>
 					</a>
 				</li>
 				<li class="userlinks">
 					<ul class="dropdown-menu">
 						<li><a href="#">Edit Profile <i class="pull-right fa fa-pencil"></i></a></li>
 						<li><a href="#">Account <i class="pull-right fa fa-cog"></i></a></li>
 						<li><a href="#">Help <i class="pull-right fa fa-question-circle"></i></a></li>
 						<li class="divider"></li>
 						<li><a href="#" class="text-right">Sign Out</a></li>
 					</ul>
 				</li>
 			</ul>
 		</li>
 		<li class="dropdown">
 			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><i class="fa fa-envelope"></i><span class="badge">1</span></a>
 			<ul class="dropdown-menu messages arrow">
 				<li class="dd-header">
 					<span>You have 1 new message(s)</span>
 					<span><a href="#">Mark all Read</a></span>
 				</li>
 				<div class="scrollthis">
 					<li><a href="#" class="active">
 						<span class="time">6 mins</span>
 						<img src="<?php echo $pathassets; ?>demo/avatar/doyle.png" alt="avatar" />
 						<div><span class="name">Alan Doyle</span><span class="msg">Please mail me the files by tonight.</span></div>
 					</a></li>
 					<li><a href="#">
 						<span class="time">12 mins</span>
 						<img src="<?php echo $pathassets; ?>demo/avatar/paton.png" alt="avatar" />
 						<div><span class="name">Polly Paton</span><span class="msg">Uploaded all the files to server. Take a look.</span></div>
 					</a></li>
 					<li><a href="#">
 						<span class="time">9 hrs</span>
 						<img src="<?php echo $pathassets; ?>demo/avatar/corbett.png" alt="avatar" />
 						<div><span class="name">Simon Corbett</span><span class="msg">I am signing off for today.</span></div>
 					</a></li>
 					<li><a href="#">
 						<span class="time">2 days</span>
 						<img src="<?php echo $pathassets; ?>demo/avatar/tennant.png" alt="avatar" />
 						<div><span class="name">David Tennant</span><span class="msg">How are you doing?</span></div>
 					</a></li>
 					<li><a href="#">
 						<span class="time">6 mins</span>
 						<img src="<?php echo $pathassets; ?>demo/avatar/doyle.png" alt="avatar" />
 						<div><span class="name">Alan Doyle</span><span class="msg">Please mail me the files by tonight.</span></div>
 					</a></li>
 					<li><a href="#">
 						<span class="time">12 mins</span>
 						<img src="<?php echo $pathassets; ?>demo/avatar/paton.png" alt="avatar" />
 						<div><span class="name">Polly Paton</span><span class="msg">Uploaded all the files to server. Take a look.</span></div>
 					</a></li>
 				</div>
 				<li class="dd-footer"><a href="#">View All Messages</a></li>
 			</ul>
 		</li>
 		<li class="dropdown">
 			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><i class="fa fa-bell"></i><span class="badge">3</span></a>
 			<ul class="dropdown-menu notifications arrow">
 				<li class="dd-header">
 					<span>You have 3 new notification(s)</span>
 					<span><a href="#">Mark all Seen</a></span>
 				</li>
 				<div class="scrollthis">
 					<li>
 						<a href="#" class="notification-user active">
 							<span class="time">4 mins</span>
 							<i class="fa fa-user"></i>
 							<span class="msg">New user Registered. </span>
 						</a>
 					</li>
 					<li>
 						<a href="#" class="notification-danger active">
 							<span class="time">20 mins</span>
 							<i class="fa fa-bolt"></i>
 							<span class="msg">CPU at 92% on server#3! </span>
 						</a>
 					</li>
 					<li>
 						<a href="#" class="notification-success active">
 							<span class="time">1 hr</span>
 							<i class="fa fa-check"></i> 
 							<span class="msg">Server#1 is live. </span>
 						</a>
 					</li>
 					<li>
 						<a href="#" class="notification-warning">
 							<span class="time">2 hrs</span>
 							<i class="fa fa-exclamation-triangle"></i> 
 							<span class="msg">Database overloaded. </span>
 						</a>
 					</li>
 					<li>
 						<a href="#" class="notification-order">
 							<span class="time">10 hrs</span>
 							<i class="fa fa-shopping-cart"></i> 
 							<span class="msg">New order received. </span>
 						</a>
 					</li>
 					<li>
 						<a href="#" class="notification-failure">
 							<span class="time">12 hrs</span>
 							<i class="fa fa-times-circle"></i>
 							<span class="msg">Application error!</span>
 						</a>
 					</li>
 					<li>
 						<a href="#" class="notification-fix">
 							<span class="time">12 hrs</span>
 							<i class="fa fa-wrench"></i>
 							<span class="msg">Installation Succeeded.</span>
 						</a>
 					</li>
 					<li>
 						<a href="#" class="notification-success">
 							<span class="time">18 hrs</span>
 							<i class="fa fa-check"></i>
 							<span class="msg">Account Created. </span>
 						</a>
 					</li>
 				</div>
 				<li class="dd-footer"><a href="#">View All Notifications</a></li>
 			</ul>
 		</li>
 		<li>
 			<a href="#" id="headerbardropdown"><span><i class="fa fa-level-down"></i></span></a>
 		</li>
 		<li class="dropdown demodrop">
 			<a href="#" class="dropdown-toggle tooltips" data-toggle="dropdown"><i class="fa fa-building-o"></i></a>

 			<ul class="dropdown-menu arrow dropdown-menu-form" id="demo-dropdown">
 				<li>
 					<label for="demo-header-variations" class="control-label">Empresas:</label>
 					<ul class="list-inline " id="demo-header-variations">
 						<?php
 							$empresa_controle=new Conexao();
 							$empresa_controle->selecionar("e.alias,e.id, e.id_pessoa","empresas e , usuarios_empresas ue","ue.id_usuario='".$_SESSION["id_usuario"]."' AND ue.id_empresa=e.id AND ue.excluido='0' AND e.excluido='0'");

				            $i=0;
				            while ($dados=mysqli_fetch_array($empresa_controle->runQuery(), MYSQLI_BOTH)) {
				                $empresas[$i]["alias"]=$dados["alias"];
				                $empresas[$i]["id_empresa"]=$dados["id"];
				                $i++;
				            }

				            foreach ($empresas as $e_item) {
				             	?>
									<li><a href="javascript:;"  onclick="f_trocaEmpresa(<?php echo $e_item["id_empresa"]; ?>)"><i class="fa fa-building-o"></i> <?php echo $e_item["alias"]; ?></a></li>
				             	<?php
				            	
				            }
				            if(count($empresas)>0)
				            {
				            	?>
				            		<li><a href="javascript:;"  onclick="f_trocaEmpresa(0)"><i class="fa fa-building-o"></i> GERAL</a></li>
				            	<?php
				            }
 						?>
 						
 					</ul>
 				</li>
 				<li class="divider"></li>
 				
 			</ul>
 		</li>
 		<li >
 			<a><?php echo $_SESSION["id_empresa_ativa"]!=''?$_SESSION["alias_empresa_ativa"]:'GERAL'; ?></a>
 		</li>
 	</ul>
 </header>

 <div id="page-container">