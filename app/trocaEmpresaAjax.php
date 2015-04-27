<?php
	session_start();
	$pathassets_ajax="../assets/";

    //require($pathassets.'rest/Rest.inc.php');//MVC
    require_once($pathassets_ajax.'class/mysql.php');

    $empresaAtiva=new Conexao();
    $empresaAtiva->selecionar("e.alias,e.id, e.id_pessoa","empresas e , usuarios_empresas ue","ue.id_usuario='".$_SESSION["id_usuario"]."' AND ue.id_empresa=e.id AND ue.excluido='0' AND e.excluido='0' AND ue.id_empresa='".$_POST["idEmpresa"]."' ");
    $dados_e=mysqli_fetch_array($empresaAtiva->runQuery(), MYSQLI_BOTH);

    $_SESSION["id_empresa_ativa"]=$dados_e["id"];
    $_SESSION["alias_empresa_ativa"]=$dados_e["alias"];

?>