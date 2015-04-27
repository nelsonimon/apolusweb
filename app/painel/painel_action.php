<?php

    $pathassets="../../assets/";

    require($pathassets.'rest/Rest.inc.php');//MVC
    require_once($pathassets.'class/mysql.php');
    
    class painelAction extends REST {
	
        function index(){
            if($this->get_request_method() != "GET")
            {
                $this->response('',406);
            }

			session_start();
			if(!isset($_SESSION["login_usuario"])){
				header("Location:../index");
			}
           
            /* $op=new Conexao();
                $op->selecionar("   (SELECT COUNT(1) FROM usuarios u WHERE u.flg_registro=1) total_usuarios,
                                    (SELECT COUNT(1) FROM anuncios a WHERE a.flg=1) total_anuncios,
                                    (SELECT COUNT(1) FROM anuncios_visualizados) total_visualizados,
                                    (SELECT COUNT(1) FROM curtidas_anuncios) total_curtidas,
                                    (SELECT COUNT(1) FROM visitas) total_visitas,
                                    (SELECT COUNT(distinct(ip)) FROM visitas) total_visitas_unicas,
                                    (SELECT COUNT(1) FROM visitas WHERE DATE_FORMAT(data_visita,'%Y-%m-%d') BETWEEN DATE_FORMAT(CURDATE(), '%Y-%m-01') AND LAST_DAY(CURDATE())) total_visitas_mes,
                                    (SELECT COUNT(distinct(ip)) FROM visitas WHERE DATE_FORMAT(data_visita,'%Y-%m-%d') BETWEEN DATE_FORMAT(CURDATE(), '%Y-%m-01') AND LAST_DAY(CURDATE())) total_visitas_mes_unicas
                                    ", "dual" );

               $dados=mysqli_fetch_array($op->runQuery(),MYSQLI_BOTH);

                $total_usuarios=$dados["total_usuarios"];
                $total_anuncios=$dados["total_anuncios"];
                $total_visualizados=$dados["total_visualizados"];
                $total_curtidas=$dados["total_curtidas"];
                $total_visitas=$dados["total_visitas"];
                $total_visitas_unicas=$dados["total_visitas_unicas"];
                $total_visitas_mes=$dados["total_visitas_mes"];
                $total_visitas_mes_unicas=$dados["total_visitas_mes_unicas"];

                $media_retorno=number_format($total_visitas/$total_visitas_unicas, 2, ',', '.');

                $op->selecionar("count(1) total, count(distinct(ip)) unicos, DATE_FORMAT(data_visita,'%m/%d') dia","visitas","DATE_FORMAT(data_visita,'%Y-%m-%d') BETWEEN DATE_FORMAT(CURDATE(), '%Y-%m-01') AND LAST_DAY(CURDATE()) GROUP BY dia","dia","DESC","35");
                
                $i=0;
                while($visitas=mysqli_fetch_array($op->runQuery(),MYSQLI_BOTH))
                {
                    $acessos["dia"][$i]="'".$visitas["dia"]."'";
                    $acessos["total"][$i]=$visitas["total"];
                    $acessos["unicos"][$i]=$visitas["unicos"];
                    $i++;
                }
                
                $graf_acessos_dias=implode(",", array_reverse($acessos["dia"]));
                $graf_acessos_total=implode(",", array_reverse($acessos["total"]));
                $graf_acessos_unicos=implode(",", array_reverse($acessos["unicos"]));

                $op->selecionar("a.*, (SELECT count(1) FROM anuncios_visualizados av WHERE av.id_anuncio=a.id_anuncio) total","anuncios a","a.flg=1","total","DESC","0,10");
                $i=0;
                while($top_ofertas=mysqli_fetch_array($op->runQuery(),MYSQLI_BOTH))
                {
                    $ofertas["titulo"][$i]=$top_ofertas["titulo"];
                    $ofertas["imagem"][$i]=$top_ofertas["imagem"];
                    $ofertas["valor"][$i]=$top_ofertas["valor"];
                    $ofertas["total"][$i]=$top_ofertas["total"];
                    $i++;
                }*/

              include('index.php'); 
        }


       

       // include('index.php'); 

    }
    
   
    $api = new painelAction;
    $api->processApi();
 
    
