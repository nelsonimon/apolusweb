<nav id="page-leftbar" role="navigation">
				<!-- BEGIN SIDEBAR MENU -->
			<ul class="acc-menu" id="sidebar">

			<?php
				$menu=new Conexao();

				$menu->selecionar('a.id, a.nome, a.icone, a.caminho, a.descricao, p.c, p.r, p.u, p.d ,(SELECT count(1) FROM aplicacoes a2 WHERE a2.id_aplicacao_pai=a.id) total_filhos','permissoes p, aplicacoes a',"p.id_aplicacao=a.id AND p.id_perfil_usuario='".$_SESSION["id_perfil_usuario"]."' AND (a.id_aplicacao_pai IS NULL OR (SELECT count(1) FROM aplicacoes a2 WHERE a2.id_aplicacao_pai=id)>1) AND p.r=1", 'a.nome');
				//echo $menu->sql;
				//$m=0;
				while ($dados=mysqli_fetch_array($menu->runQuery(), MYSQLI_BOTH))
				{
					$m=$dados["id"];
					$menus[$m]["id"]=$dados["id"];
					$menus[$m]["nome"]=strtoupper($dados["nome"]);
					$menus[$m]["icone"]=$dados["icone"];
					$menus[$m]["caminho"]=$dados["caminho"];
					$menus[$m]["descricao"]=$dados["descricao"];
					$menus[$m]["c"]=$dados["c"];
					$menus[$m]["r"]=$dados["r"];
					$menus[$m]["u"]=$dados["u"];
					$menus[$m]["d"]=$dados["d"];
					$menus[$m]["total_filhos"]=$dados["total_filhos"];
				   // $m++;
				}

				
				// echo "<pre>";
				// print_r($menus);
				// echo "</pre>";

				foreach ($menus as $m_item) {

					if($m_item["total_filhos"]==0)
					{
						?>
							<li><a href="../<?php echo $m_item["caminho"]; ?>"><i class="<?php echo $m_item["icone"]; ?>"></i> <span><?php echo $m_item["nome"]; ?></span></a></li>
						<?php
					}
					else
					{
						?>
							<li><a href="javascript:;"><i class="<?php echo $m_item["icone"]; ?>"></i> <span><?php echo $m_item["nome"]; ?></span> </a>

							<?php
								$sub_menu=new Conexao();

								$sub_menu->selecionar('a.id, a.nome, a.icone, a.caminho, a.descricao, p.c, p.r, p.u, p.d ','permissoes p, aplicacoes a',"p.id_aplicacao=a.id AND p.id_perfil_usuario='".$_SESSION["id_perfil_usuario"]."' AND a.id_aplicacao_pai='".$menus[$m]["id"]."' AND p.r=1", 'a.nome');
								//echo $sub_menu->sql();
								//$m=0;
								while ($dadoss=mysqli_fetch_array($sub_menu->runQuery(), MYSQLI_BOTH))
								{
									$sm=$dadoss["id"];
									$submenus[$sm]["id"]=$dadoss["id"];
									$submenus[$sm]["nome"]=strtoupper($dadoss["nome"]);
									$submenus[$sm]["icone"]=$dadoss["icone"];
									$submenus[$sm]["caminho"]=$dadoss["caminho"];
									$submenus[$sm]["descricao"]=$dadoss["descricao"];
									$submenus[$sm]["c"]=$dadoss["c"];
									$submenus[$sm]["r"]=$dadoss["r"];
									$submenus[$sm]["u"]=$dadoss["u"];
									$submenus[$sm]["d"]=$dadoss["d"];

								   // $m++;
								}

								$i=0;
								foreach ($submenus as $sm_item) 
								{
									if($i==0)
									{
										?>
											<ul class="acc-menu">
										<?php
									}
							?>
												<li><a href="../<?php echo $sm_item["caminho"]; ?>"><span><?php echo $sm_item["nome"]; ?></span></a></li>	
							<?php
									 $i++;
								}

								if($i>0)
								{
									?>
										</ul>
									<?php
								}
							?>
							</li>
						<?php
					}

				   // echo $item["titulo"];
					# code...
				}
			?>
			   <!--  <li><a href="../painel/index"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="../usuarios/index"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="javascript:;"><i class="fa fa-th"></i> <span>Usuários</span> </a>
					<ul class="acc-menu">
						<li><a href="layout-grid.htm"><span>Grids</span></a></li>
						<li><a href="layout-horizontal.htm"><span>Horizontal Navigation</span></a></li>
						<li><a href="layout-horizontal2.htm"><span>Horizontal Navigation 2</span></a></li>
						<li><a href="layout-fixed.htm"><span>Fixed Boxed Layout</span></a></li>
					</ul>
				</li> -->
			   
			</ul>
			<!-- END SIDEBAR MENU -->
		</nav>