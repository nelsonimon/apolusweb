<?php

    $pathassets="../../assets/";
    session_start();

    require($pathassets.'rest/Rest.inc.php');//MVC
    require_once($pathassets.'class/mysql.php');

    require($pathassets.'php/myFunctions.php');//FUNCOES PARTICULARES
    
    
    
    class usuariosAction extends REST {
	
        function index(){
            $id_aplicacao=2;

            if($this->get_request_method() != "GET")
            {
                $this->response('',406);
            }
			
			if(!isset($_SESSION["login_usuario"])){
				header("Location:../login/index");
			}

            $op=new Conexao();

            //WHERE empresa
            if(isset($_SESSION["id_empresa_ativa"]))
            {
                $whereEmpresa=" ue.id_empresa='".$_SESSION["id_empresa_ativa"]."' AND ";
            }
            else
            {
                $whereEmpresa='';
            }
            /// TABELA USUARIOS
            $op->selecionar(" u.id, u.login, u.data_alteracao,pu.descricao perfil, su.descricao status, p.nome_fantasia, e.alias empresa",
                             " usuarios u, perfil_usuarios pu, status_usuarios su, pessoas p, usuarios_empresas ue, empresas e",
                             " u.id_perfil_usuario=pu.id AND 
                               u.id_status_usuarios=su.id AND 
                               ue.id_usuario=u.id AND
                               ue.id_empresa=e.id AND
                               ".$whereEmpresa."
                               u.id_pessoa=p.id AND
                               u.excluido=0");
            //echo $op->sql();
            $i=0;
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {
                $usuarios["id"][$i]=$dados["id"];
                $usuarios["login"][$i]=$dados["login"];
                $usuarios["data_alteracao"][$i]=f_convertDate($dados["data_alteracao"],'BR');
                $usuarios["perfil"][$i]=$dados["perfil"];
                $usuarios["status"][$i]=$dados["status"];
                $usuarios["nome_fantasia"][$i]=$dados["nome_fantasia"];
                $usuarios["empresa"][$i]=$dados["empresa"];
                $i++;
            }


            //TOTAL USUARIOS
            $total_usuarios=$op->totalEncontrado();

            $op->fecharCon();
			    
                  
            include('index.php'); 
        }

        function delete(){
            $id=$_GET["id"];

            $op=new Conexao();
            $op->atualizar(" usuarios "," excluido=1 "," id='".$id."' ");
            $op->fecharCon();

           header("Location:index");
        }


        function create()
        {
             //pessoas
            $op=new Conexao();
            $op->selecionar("id,nome","pessoas","tipo_pessoa=2 AND excluido=0");
            $i=0;
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {
                
                $i_pessoa=$dados["id"];
                $pessoas[$i_pessoa]["id"]=$dados["id"];
                $pessoas[$i_pessoa]["nome"]=$dados["nome"];

            }


            //perfil_usuarios
            $op->selecionar("id,descricao","perfil_usuarios","excluido=0");
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {

                
                $i_perfil=$dados["id"];
                $perfil_usuarios[$i_perfil]["id"]=$dados["id"];
                $perfil_usuarios[$i_perfil]["descricao"]=$dados["descricao"];

            }


            //status_usuarios
            $op->selecionar("id,descricao","status_usuarios","excluido=0");
            $i=0;
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {
                
                $i_status=$dados["id"];
                $status_usuarios[$i_status]["id"]=$dados["id"];
                $status_usuarios[$i_status]["descricao"]=$dados["descricao"];

            }

            $op_titulo='Novo ';
            $op_action="insert";
            include 'novo_atualizar.php';
        }

        function edit()
        {
            $id=$_GET["id"];

            $op=new Conexao();
            $op->selecionar("*","usuarios","id='".$id."' AND excluido=0");
            $user=mysqli_fetch_array($op->runQuery());

            $id=$user["id"];
            $id_pessoa=$user["id_pessoa"];
            $id_perfil_usuario=$user["id_perfil_usuario"];
            $login=$user["login"];
            $id_status_usuarios=$user["id_status_usuarios"];
            //$id=$user["id"];

            //pessoas
            $op->selecionar("id,nome","pessoas","tipo_pessoa=2 AND excluido=0");
            $i=0;
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {
                
                $i_pessoa=$dados["id"];
                $pessoas[$i_pessoa]["id"]=$dados["id"];
                $pessoas[$i_pessoa]["nome"]=$dados["nome"];

            }


            //perfil_usuarios
            $op->selecionar("id,descricao","perfil_usuarios","excluido=0");
            $i=0;
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {
                
                $i_perfil=$dados["id"];
                $perfil_usuarios[$i_perfil]["id"]=$dados["id"];
                $perfil_usuarios[$i_perfil]["descricao"]=$dados["descricao"];

            }


            //status_usuarios
            $op->selecionar("id,descricao","status_usuarios","excluido=0");
            $i=0;
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {
                
                $i_status=$dados["id"];
                $status_usuarios[$i_status]["id"]=$dados["id"];
                $status_usuarios[$i_status]["descricao"]=$dados["descricao"];

            }



            $op_titulo='Editar ';
            $op_action="update";
            include 'novo_atualizar.php';
        }

        function save(){
            //header("Location:index");

            if($_POST["acao"]=='insert')
            {
                try {
                
                    $nome=$_POST["nome"];

                    $op=new Conexao();
                    $arrayInsert= array('descricao' => strtoupper($nome)  );
                    $op->inserir("perfil_usuarios",$arrayInsert);
                    //$op->fecharCon();

                    $_SESSION["msg"]='<div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>SUCESSO!</strong> Novo perfil cadastrado com sucesso.
                                      </div>';
                    
                } catch (Exception $e) {
                    $_SESSION["msg"]='<div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Erro!</strong> '.$e.'.
                                      </div>';
                    header("location:".__FUNCTION__."");
                }
            }

            if($_POST["acao"]=='update')
            {
                try {
                
                    $nome=addslashes(strtoupper($_POST["nome"]));
                    $id=addslashes($_POST["id"]);

                    $op=new Conexao();
                  
                    $op->atualizar(" perfil_usuarios "," descricao='".$nome."' "," id='".$id."' ");
                    $op->fecharCon();

                    $_SESSION["msg"]='<div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>SUCESSO!</strong> Perfil <strong>'.$nome.'</strong> cadastrado com sucesso.
                                      </div>';
                    
                } catch (Exception $e) {
                    $_SESSION["msg"]='<div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Erro!</strong> '.$e.'.
                                      </div>';

                    header("location:".__FUNCTION__."");
                }
            }


            header("location:index");

            
            
        }


        function verificarLogin()
        {
            $op=new Conexao();
                  
            $op->selecionar("login","usuarios","login='".$_POST["login"]."'");
            if($op->totalEncontrado()>0)
            {
                echo 'Login já utilizado!';
            }
            $op->fecharCon();
            

        }

       // include('index.php'); 

    }
    
   
    $api = new usuariosAction;
    $api->processApi();
 
    
