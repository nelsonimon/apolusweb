<?php
//funcoes php

function f_permissoesGerais($menus, $id_aplicacao, $id_item ,$titulo_delete, $mensagem_delete,$acao_delete)
{
         
    $html='';
    if($menus[$id_aplicacao]["c"]==1)
    {
        $html.='<a href="create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Novo</a>';
    }

    if($menus[$id_aplicacao]["u"]==1)
    {
        $html.='<a href="edit?id='.$id_item.'" class="btn btn-warning"><i class="fa fa-pencil"></i> Editar</a>';
    }

    if($menus[$id_aplicacao]["d"]==1)
    {
        $titulo=$titulo_delete;
        $mensagem=$mensagem_delete;
        $acao=$acao_delete;
        $html.='<a href="javascript:;" onclick="confirmModal('.$titulo.','.$mensagem.','.$acao.')" class="btn btn-danger"><i class="fa fa-trash-o"></i> Excluir</a>';
    }

    return $html;
}    



function f_convertDate($date,$format)
{
    $newDate='';
    switch ($format) {
        case 'BR': $newDate=date("d/m/Y H:i:s", strtotime($date));
            break;
        case 'US': $newDate=date("Y/m/d H:i:s", strtotime($date));
            break;
        
        default:
            $newDate=$date;
            break;
    }
    return $newDate;
}


function f_logado()
{
    if(!session_start())
     session_start();

    if(!isset($_SESSION["login_usuario"])){
        header("Location:../login/index");
    }
}


function f_validaAplicacao($id_aplicacao)
{
    if(!session_start())
     session_start();

    $va=new Conexao();
    $va->selecionar("count(1) permissao","permissoes p","p.id_perfil_usuario='".$_SESSION["id_perfil_usuario"]."' AND  p.id_aplicacao='".$id_aplicacao."' ");
    $dadosva=mysqli_fetch_array($va->runQuery());

    if($dadosva["permissao"]==0)
    {
        header("Location:../erros/index");
    }
    $va->fecharCon();
}

?>