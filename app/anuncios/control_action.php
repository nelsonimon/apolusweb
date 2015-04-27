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
			if(!isset($_SESSION["login"])){
				header("Location:../login/index");
			}

            $op=new Conexao();

            /// TABELA ANUNCIOS
            /// ANUNCIOS NOVOS
            $op->selecionar("*", "anuncios a, usuarios u", 'a.id_usuarios=u.id_usuario AND flg IS NULL');
            $i=0;
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {
                $anuncios_novos["id_anuncio"][$i]=$dados["id_anuncio"];
                $anuncios_novos["id_usuarios"][$i]=$dados["id_usuarios"];
                $anuncios_novos["login"][$i]=$dados["login"];
                $anuncios_novos["titulo"][$i]=$dados["titulo"];
                $anuncios_novos["url"][$i]=$dados["url"];
                $anuncios_novos["valor"][$i]=$dados["valor"];
                $anuncios_novos["imagem"][$i]=$dados["imagem"];
                $anuncios_novos["flg"][$i]=$dados["flg"];
                $i++;
            }
            //TOTAL ANUNCIOS NOVOS
            $total_anuncios_novos=$op->totalEncontrado();


            /// ANUNCIOS ATIVOS
            $op->selecionar("*", "anuncios a, usuarios u", 'a.id_usuarios=u.id_usuario AND flg=1');
            //TOTAL ANUNCIOS ATIVOS
            $total_anuncios_ativos=$op->totalEncontrado();

             /// ANUNCIOS NEGADOS
            $op->selecionar("*", "anuncios a, usuarios u", 'a.id_usuarios=u.id_usuario AND flg=0');
            //TOTAL ANUNCIOS ATIVOS
            $total_anuncios_negados=$op->totalEncontrado();
			    
                  
              include('index.php'); 
        }


        function login()
        {
            if($this->get_request_method() != "POST")
            {
               // $this->response('',406);
                //header("location:testess.php");
            }
            
            if($_POST["login"]=="" || $_POST["senha"]=="")
            {
                $mensagem="Informe o LOGIN e a SENHA!";
            }
            else
            {
                $login =addslashes(strtolower($_POST["login"]));
                $senha =md5($_POST["senha"]);

                $op=new Conexao();
                $op->selecionar("*", "usuarios","login='$login' AND senha='$senha'" );

                if($op->totalEncontrado()==1){
                    header("location:../painel");
                }
                else
                {
                     $mensagem="LOGIN ou SENHA incorretos!";
                }
                 
            }
           
            include('index.php'); 
        }

        function acao_anuncio()
        {
            $data_validacao=date("Y-m-d H:i:s");

            if($_POST["acao"]=="aprovar")
            {
                $id_anuncio=$_POST["id_anuncio"];
                session_start();

                if(!isset($_SESSION["login"])){
                    header("Location:../login/index");
                }

                $op=new Conexao();

                $op->selecionar("*","anuncios","id_anuncio=".$id_anuncio."");
                $dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH);

                $link_original=$dados["url"];
                $monetizado==0;

                //afialiados
                if($monetizado==0)
                {
                    $arr=array("americanas.com.br","submarino.com.br","soubarato.com.br","shoptime.com.br");
                    $codigo_afiliado="franq=AFL-03-116917";

                    //faz um foreach para cada afiliado
                    foreach ($arr as $site) {
                        
                        //se o url for um dos afiliados
                        if(stripos($link_original, $site)!==false)
                        {
                            //se ainda ja possui o meu codigo afiliado não faz nada
                            if(stripos($link_original,$codigo_afiliado)!==false)
                            {
                                $link_lomadeezado=$link_original;
                            }
                            else
                            {
                                //adicionando o codigo afiliado
                                if(stripos($link_original, "?")!==false)
                                {
                                    $link_lomadeezado=$link_original."&".$codigo_afiliado;
                                }
                                else
                                {
                                    $link_lomadeezado=$link_original."?".$codigo_afiliado;
                                }
                            }

                           
                            $monetizado=1;
                        }

                    }
                }

                //centauro
                if($monetizado==0)
                {
                    $arr=array("centauro.com.br");
                    $codigo_afiliado="origem=risesocial&utm_source=Parcerias_risesocial&utm_medium=b4r4t31r0s_linkdireto&utm_campaign=Parcerias_risesocial_xml_listaprodutos&utm_content=b4r4t31r0s&a_aid=b4r4t31r0s";

                    //faz um foreach para cada afiliado
                    foreach ($arr as $site) {
                        
                        //se o url for um dos afiliados
                        if(stripos($link_original, $site)!==false)
                        {
                            //se ainda ja possui o meu codigo afiliado não faz nada
                            if(stripos($link_original,$codigo_afiliado)!==false)
                            {
                                $link_lomadeezado=$link_original;
                            }
                            else
                            {
                                //adicionando o codigo afiliado
                                if(stripos($link_original, "?")!==false)
                                {
                                    $link_lomadeezado=$link_original."&".$codigo_afiliado;
                                }
                                else
                                {
                                    $link_lomadeezado=$link_original."?".$codigo_afiliado;
                                }
                            }

                           
                            $monetizado=1;
                        }

                    }

                }

                //dafiti
                if($monetizado==0)
                {
                    $arr=array("dafiti.com.br");
                    $codigo_afiliado="af=1294241758&utm_source=1294241758&utm_medium=af&utm_content=b4r4t31r0s&a_aid=b4r4t31r0s";

                    //faz um foreach para cada afiliado
                    foreach ($arr as $site) {
                        
                        //se o url for um dos afiliados
                        if(stripos($link_original, $site)!==false)
                        {
                            //se ainda ja possui o meu codigo afiliado não faz nada
                            if(stripos($link_original,$codigo_afiliado)!==false)
                            {
                                $link_lomadeezado=$link_original;
                            }
                            else
                            {
                                //adicionando o codigo afiliado
                                if(stripos($link_original, "?")!==false)
                                {
                                    $link_lomadeezado=$link_original."&".$codigo_afiliado;
                                }
                                else
                                {
                                    $link_lomadeezado=$link_original."?".$codigo_afiliado;
                                }
                            }

                           
                            $monetizado=1;
                        }

                    }

                }

                 //epoca cosmeticos
                if($monetizado==0)
                {
                    $arr=array("epocacosmeticos.com.br");
                    $codigo_afiliado="partner=rise&utm_source=rise&utm_content=b4r4t31r0s&a_aid=b4r4t31r0s";

                    //faz um foreach para cada afiliado
                    foreach ($arr as $site) {
                        
                        //se o url for um dos afiliados
                        if(stripos($link_original, $site)!==false)
                        {
                            //se ainda ja possui o meu codigo afiliado não faz nada
                            if(stripos($link_original,$codigo_afiliado)!==false)
                            {
                                $link_lomadeezado=$link_original;
                            }
                            else
                            {
                                //adicionando o codigo afiliado
                                if(stripos($link_original, "?")!==false)
                                {
                                    $link_lomadeezado=$link_original."&".$codigo_afiliado;
                                }
                                else
                                {
                                    $link_lomadeezado=$link_original."?".$codigo_afiliado;
                                }
                            }

                           
                            $monetizado=1;
                        }

                    }

                }

                //kanui
                if($monetizado==0)
                {
                    $arr=array("kanui.com.br");
                    $codigo_afiliado="utm_source=rise&utm_content=b4r431r0s&a_aid=b4r431r0s";

                    //faz um foreach para cada afiliado
                    foreach ($arr as $site) {
                        
                        //se o url for um dos afiliados
                        if(stripos($link_original, $site)!==false)
                        {
                            //se ainda ja possui o meu codigo afiliado não faz nada
                            if(stripos($link_original,$codigo_afiliado)!==false)
                            {
                                $link_lomadeezado=$link_original;
                            }
                            else
                            {
                                //adicionando o codigo afiliado
                                if(stripos($link_original, "?")!==false)
                                {
                                    $link_lomadeezado=$link_original."&".$codigo_afiliado;
                                }
                                else
                                {
                                    $link_lomadeezado=$link_original."?".$codigo_afiliado;
                                }
                            }

                           
                            $monetizado=1;
                        }

                    }

                }

                //walmart
                if($monetizado==0)
                {
                    $arr=array("walmart.com.br");
                    $codigo_afiliado="utm_source=rise&utm_content=linkdireto&utm_term=b4r4t3ir0s&a_aid=b4r4t3ir0s";

                    //faz um foreach para cada afiliado
                    foreach ($arr as $site) {
                        
                        //se o url for um dos afiliados
                        if(stripos($link_original, $site)!==false)
                        {
                            //se ainda ja possui o meu codigo afiliado não faz nada
                            if(stripos($link_original,$codigo_afiliado)!==false)
                            {
                                $link_lomadeezado=$link_original;
                            }
                            else
                            {
                                //adicionando o codigo afiliado
                                if(stripos($link_original, "?")!==false)
                                {
                                    $link_lomadeezado=$link_original."&".$codigo_afiliado;
                                }
                                else
                                {
                                    $link_lomadeezado=$link_original."?".$codigo_afiliado;
                                }
                            }

                           
                            $monetizado=1;
                        }

                    }

                }

                //lomadee
                if($monetizado==0)
                {
                    $sourceId="22687645";

                    $webservice="http://bws.buscape.com/service/createLinks/lomadee/2b6346446b4138356d34633d/br/?sourceId=".$sourceId."&link1=".$link_original."";

                    $file = file_get_contents($webservice);
                    $file = preg_replace('#&(?=[a-z_0-9]+=)#', '&amp;', $file);

                    $xml = simplexml_load_string($file,'SimpleXMLElement', LIBXML_NOCDATA);

                    $lomadee = json_decode(json_encode((array)$xml), TRUE);

                    // echo '<pre>';
                    // print_r($lomadee);
                    // echo '</pre>';
                    $link_lomadeezado= $lomadee["lomadeeLinks"]["lomadeeLink"]["redirectLink"];
                    if($link_lomadeezado!="")
                    {
                        $monetizado=1;
                    }    
                }


                




                $op->atualizar("anuncios","flg=1, id_usuario_auditor=".$_SESSION["id_usuario"].", data_validacao='".$data_validacao."', link_lomadeezado='".$link_lomadeezado."' ", "id_anuncio=".$id_anuncio."");

                echo 1;
            }

             if($_POST["acao"]=="negar")
            {
                $id_anuncio=$_POST["id_anuncio"];
                session_start();

                if(!isset($_SESSION["login"])){
                    header("Location:../login/index");
                }

                $op=new Conexao();

                $op->atualizar("anuncios","flg=0, id_usuario_auditor=".$_SESSION["id_usuario"].", data_validacao='".$data_validacao."' ", "id_anuncio=".$id_anuncio."");

                echo 1;
            }

        }

       // include('index.php'); 

    }
    
   
    $api = new painelAction;
    $api->processApi();
 
    
