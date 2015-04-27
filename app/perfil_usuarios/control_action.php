<?php

    $pathassets="../../assets/";
    session_start();

    require($pathassets.'rest/Rest.inc.php');//MVC
    require_once($pathassets.'class/mysql.php');

    require($pathassets.'php/myFunctions.php');//FUNCOES PARTICULARES
    
    
    
    class perfilUsuariosAction extends REST {
	
        function index(){
            $id_aplicacao=1;

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
                $whereEmpresa="(SELECT count(1) FROM usuarios u, usuarios_empresas ue   WHERE u.excluido=0 AND u.id_perfil_usuario=pu.id AND u.id=ue.id_usuario AND ue.id_empresa='".$_SESSION["id_empresa_ativa"]."' AND ue.excluido=0 AND u.id_status_usuarios IN (1,2) ) ";
            }
            else
            {
                $whereEmpresa='(SELECT count(1) FROM usuarios u  WHERE u.excluido=0 AND u.id_perfil_usuario=pu.id AND u.id_status_usuarios IN (1,2) )';
            }
            /// TABELA PERFIL USUARIOS
            $op->selecionar("pu.id, pu.descricao, ".$whereEmpresa." total_usuarios ", "perfil_usuarios pu"," pu.excluido=0");
            //echo $op->sql();
            $i=0;
            while ($dados=mysqli_fetch_array($op->runQuery(), MYSQLI_BOTH)) {
                $usuarios["id_perfil"][$i]=$dados["id"];
                $usuarios["descricao"][$i]=$dados["descricao"];
                $usuarios["total_usuarios"][$i]=$dados["total_usuarios"];
                $i++;
            }


            //TOTAL USUARIOS
            $total_perfis=$op->totalEncontrado();

            $op->fecharCon();
			    
                  
            include('index.php'); 
        }

        function delete(){
            $id=$_GET["id"];

            $op=new Conexao();
            $op->atualizar(" perfil_usuarios "," excluido=1 "," id='".$id."' ");
            $op->fecharCon();

           header("Location:index");
        }


        function create()
        {
            $op_titulo='Novo ';
            $op_action="insert";
            include 'novo_atualizar.php';
        }

        function edit()
        {
            $id=$_GET["id"];

            $op=new Conexao();
            $op->selecionar("descricao","perfil_usuarios","id='".$id."'");
            $dados=mysqli_fetch_array($op->runQuery());

            $nome=$dados["descricao"];

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

       // include('index.php'); 

    }
    
   
    $api = new perfilUsuariosAction;
    $api->processApi();
 
    
