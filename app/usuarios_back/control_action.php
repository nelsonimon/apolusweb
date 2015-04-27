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
				header("Location:../login/index");
			}

            $op=new Conexao();

            /// TABELA USUARIOS
            $op->selecionar("*", "usuarios u, usuarios_empresa");
            $i=0;
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {
                $usuarios["id_usuario"][$i]=$dados["id_usuario"];
                $usuarios["login"][$i]=$dados["login"];
                $usuarios["email"][$i]=$dados["email"];
                $usuarios["tipo"][$i]=$dados["tipo"];
                $usuarios["data_registro"][$i]=$dados["data_registro"];
                $usuarios["flg_registro"][$i]=$dados["flg_registro"];
                $i++;
            }


            //TOTAL USUARIOS
            $total_usuarios=$op->totalEncontrado();
			    
                  
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

       // include('index.php'); 

    }
    
   
    $api = new painelAction;
    $api->processApi();
 
    
