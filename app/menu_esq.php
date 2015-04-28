<nav id="page-leftbar" role="navigation">
                <!-- BEGIN SIDEBAR MENU -->
            <ul class="acc-menu" id="sidebar">

            <?php
                $menu=new Conexao();

                $menu->selecionar('a.id, a.nome, a.icone, a.caminho, a.descricao, p.c, p.r, p.u, p.d ','permissoes p, aplicacoes a',"p.id_aplicacao=a.id AND p.id_perfil_usuario='".$_SESSION["id_perfil_usuario"]."' AND a.id_aplicacao_pai IS NOT NULL AND p.r=1", 'a.nome');
                
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
                   // $m++;
                }

                
                // echo "<pre>";
                // print_r($menus);
                // echo "</pre>";

                foreach ($menus as $m_item) {
                    ?>
                        <li><a href="../<?php echo $m_item["caminho"]; ?>"><i class="<?php echo $m_item["icone"]; ?>"></i> <span><?php echo $m_item["nome"]; ?></span></a></li>
                    <?php

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