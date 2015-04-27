<?php

    $pathassets="../../assets/";

    require($pathassets.'rest/Rest.inc.php');//MVC
    require_once($pathassets.'class/mysql.php');

    $path="../../app/login/";
    
    class LoginAction extends REST {
	
        function index(){
            if($this->get_request_method() != "GET")
            {
                $this->response('',406);
            }
			session_start();
			if(isset($_SESSION["usuario"])){
				header("Location:../home/index");
			}
            // include('index.php'); 
			    $a="asdfasdf";
                  

                echo "adf";
              require($path.'index.php'); 
        }


        function login()
        {
            if($this->get_request_method() != "POST")
            {
               // $this->response('',406);
                header("location:testess.php");
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
                    header("location:teste.php");
                }
                else
                {
                     $mensagem="LOGIN ou SENHA incorretos!";
                }
                 include('index.php'); 
            }
           
            //include('index.php'); 
        }

       // include('index.php'); 

    }
    
   
    $api = new LoginAction;
    $api->processApi();
 
    
