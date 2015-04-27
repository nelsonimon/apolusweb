<?php

    $pathassets="../../assets/";

    require($pathassets.'rest/Rest.inc.php');//MVC
    require_once($pathassets.'class/mysql.php');
    
    class LoginAction extends REST {
	
        function index(){
            if($this->get_request_method() != "GET")
            {
                $this->response('',406);
            }
			session_start();
			if(isset($_SESSION["login"])){

                if($_SESSION["tipo"]==1)
                {
				    header("Location:../painel/index");
                }
                else{
                    session_destroy();
                }

			}
            // include('index.php'); 
			    
                  
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
                $op->selecionar("*", "usuarios","login='$login' AND senha='$senha' AND excluido=0 "  );

                if($op->totalEncontrado()==1){

                    session_start();
                    $dados=mysqli_fetch_array($op->runQuery());

                    $_SESSION["login_usuario"]=$dados["login"];
                    $_SESSION["id_usuario"]=$dados["id"];
                    $_SESSION["id_pessoa_usuario"]=$dados["id_pessoa"];
                    $_SESSION["id_status_usuario"]=$dados["id_status_usuarios"];
                    $_SESSION["id_perfil_usuario"]=$dados["id_perfil_usuario"];

                    if($_SESSION["id_status_usuario"]==1)//ATIVO
                    {
                        $dadosUsuario=new Conexao();
                        $dadosUsuario->selecionar("*","pessoas","id='".$_SESSION["id_pessoa_usuario"]."'");
                        $dadosUsuario=mysqli_fetch_array($dadosUsuario->runQuery());

                        $_SESSION["nome_usuario"]=$dadosUsuario["nome"];
                        $_SESSION["apelido_usuario"]=$dadosUsuario["nome_fantasia"];

                         header("location:../painel/index");
                    }
                    else
                    {
                        $status_user=new Conexao();
                        $status_user->selecionar("descricao","status_usuarios","id='".$_SESSION["id_status_usuario"]."'");
                        $dados=mysqli_fetch_array($status_user->runQuery());


                        $mensagem="Usuário ".$dados["descricao"]."! <br/>Entre em contato com o Administrador.";


                    }

                    
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
    
   
    $api = new LoginAction;
    $api->processApi();
 
    
