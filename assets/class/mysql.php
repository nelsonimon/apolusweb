<?php
class Conexao
{
	// Declaração das variáveis (propriedades) da classe
   	///web///
	private $servidor="localhost"; // Host (Servidor) que executa o banco de dados
	private $usuario="root"; // Usuário que se conecta ao servidor de banco de dados
	private $senha="";// Senha do usuário para conexão ao banco de dados
	private $banco="apolus"; // Nome do banco de dados a ser utilizado
	
	
	//local
	// private $servidor="127.0.0.1"; // Host (Servidor) que executa o banco de dados
	// private $usuario="root"; // Usuário que se conecta ao servidor de banco de dados
	// private $senha="";// Senha do usuário para conexão ao banco de dados
	// private $banco="mydb"; // Nome do banco de dados a ser utilizado
	
	private $sql; // String da consulta SQL a ser executada
	private $query; //String do mysql_query

############################################################################	
	function conectar()
	{
		//Função para conexão ao banco de dados
		$con = mysqli_connect($this->servidor,$this->usuario,$this->senha,$this->banco) or die($this->erro(mysqli_error()));
		
		//$this->selecionarDB();
		$con = new mysqli($this->servidor,$this->usuario,$this->senha,$this->banco);
		
		return $con;
		
		
	 }
############################################################################	   
	function selecionarDB()
	{
		//Função para seleção do banco de dados a ser usado --deprecate MYSQLI
	 	$sel = mysql_select_db($this->banco) or die($this->erro(mysql_error()));
		if($sel)
		{
	 		return true;
		}
		else
		{
			return false;
	 	}
	 }
############################################################################	 
	function set($prop,$value)
	{
	//Função para atribuir valores às propriedades da classe;
	$this->$prop = $value;
	}
############################################################################	
	function erro($erro)
	{
		//Função para exibir os error
		echo $erro;
	}
############################################################################	   
	function fecharCon()
	{
		mysqli_close($this->conectar());
	}
############################################################################	
	function selecionar($campos,$tabela,$where="",$orderby="",$alinhamento="",$limit="")
	{
		$this->conectar();
		$this->sql="";
		
		//SELECT campos FROM tabela
                                if(!empty($campos) && !empty($tabela) && empty($where) && empty($orderby) && empty($alinhamento) && empty($limit))
                                {
                                        $this->sql="SELECT ".$campos." FROM ".$tabela;
                                       
                                }
                                //SELECT campos FROM tabela WHERE variavel = variavel
                                elseif(!empty($campos) && !empty($tabela) && !empty($where) && empty($orderby) && empty($alinhamento) && empty($limit))
                                {
                                        $this->sql="SELECT ".$campos." FROM ".$tabela." WHERE ".$where;
                                        
                                }
                                //SELECT campos FROM tabela WHERE variavel = variavel LIMIT 5
                                elseif(!empty($campos) && !empty($tabela) && !empty($where) && empty($orderby) && empty($alinhamento) && !empty($limit))
                                {
                                        $this->sql="SELECT ".$campos." FROM ".$tabela." WHERE ".$where." LIMIT ".$limit;
                                        
                                }
                                //SELECT campos FROM tabela WHERE variavel = variavel DESC
                                elseif(!empty($campos) && !empty($tabela) && !empty($where) && empty($orderby) && !empty($alinhamento) && empty($limit))
                                {
                                        $this->sql="SELECT ".$campos." FROM ".$tabela." WHERE ".$where." ".$alinhamento;
                                }
                                //SELECT campos FROM tabela WHERE variavel = variavel ORDER BY variavel
                                elseif(!empty($campos) && !empty($tabela) && !empty($where) && !empty($orderby) && empty($alinhamento) && empty($limit))
                                {
                                        $this->sql ="SELECT ".$campos." FROM ".$tabela." WHERE ".$where." ORDER BY ".$orderby;
                                }
                                //SELECT campos FROM tabela WHERE variavel = variavel ORDER BY variavel DESC
                                elseif(!empty($campos) && !empty($tabela) && !empty($where) && !empty($orderby) && !empty($alinhamento) && empty($limit))
                                {
                                        $this->sql="SELECT ".$campos." FROM ".$tabela." WHERE ".$where." ORDER BY ".$orderby." ".$alinhamento;
                                }
                                //SELECT campos FROM tabela WHERE variavel = variavel ORDER BY variavel DESC LIMIT 5
                                elseif(!empty($campos) && !empty($tabela) && !empty($where) && !empty($orderby) && !empty($alinhamento) && !empty($limit))
                                {
                                        $this->sql="SELECT ".$campos." FROM ".$tabela." WHERE ".$where." ORDER BY ".$orderby." ".$alinhamento." LIMIT ".$limit;
                               	}
								 //SELECT campos FROM tabela ORDER BY variavel 
                                elseif(!empty($campos) && !empty($tabela)  && !empty($orderby) && !empty($alinhamento))
                                {
                                        $this->sql="SELECT ".$campos." FROM ".$tabela." ORDER BY ".$orderby." ".$alinhamento;
                               	}
								
                                elseif(!empty($campos) && !empty($tabela)  && empty($orderby) && !empty($limit))
                                {
                                        $this->sql="SELECT ".$campos." FROM ".$tabela." LIMIT ".$limit;
                               	}
								
								
								else
								{
									$this->erro("parametros insuficientes ou falhos");
								}
		
		$this->query = mysqli_query($this->conectar(),$this->sql) or die ($this->erro($this->sql));
	 	
	}
	
############################################################################
		
	function totalEncontrado()
	{
		return mysqli_num_rows($this->query);
	}
############################################################################	
	 // Usando UPDATE
	function atualizar($tabela,$valores,$where)
	{
		// Dividimos o Array dentro de $dados em Chaves e Valores
		
		$this->conectar();
		$this->sql="";
		
		$this->sql = "UPDATE ".$tabela." SET ".$valores." WHERE ".$where;
		
		//$this->query = mysqli_query($this->conectar(),$this->sql) or die ($this->erro(mysqli_error()));
		$this->query = mysqli_query($this->conectar(),$this->sql) or die ($this->sql);
	} // Fecha Function
 ############################################################################
     
	  // Usando DELETE
	function deletar($tabela,$where)
	{
		$this->conectar();
		$this->sql="";
		
		$this->sql= "DELETE FROM ".$tabela." WHERE ".$where."";
		$this->query = mysqli_query($this->conectar(),$this->sql) or die ($this->erro(mysqli_error()));
		
	} // Fecha Function
############################################################################	
	 // Usando INSERT
	function inserir($tabela,$dados)
	{
		$this->conectar();
		$this->sql="";
		
		// Dividimos o Array dentro de $dados em Chaves e Valores
		$campos = array_keys($dados);
		$valores = array_values($dados);
		
		//Executamos a Query    
		$this->sql = "INSERT INTO ".$tabela." (".implode(', ', $campos).") VALUES ('" . implode('\', \'', $valores) . "')";
		
		//Verificamos se a Query foi executada corretamente
	
		
		$this->query = mysqli_query($this->conectar(),$this->sql) or die ($this->erro($this->sql));
	} // Fecha Function
	
############################################################################

############################################################################	
	//funcao query
	function runQuery()
	{
		return $this->query;
	}
############################################################################	
	function sql()
	{
		return $this->sql;
	}
############################################################################	
	function uploadImagem($imagem,$localDestino)
	{
		//inicio add foto
		// Verifica se o arquivo é uma imagem
		// Pega extensão do arquivo
		preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem['name'], $ext);
		
		if(isset($ext[1]))
		{			
				// Gera um nome único para a imagem
				$imagem_nome = md5(uniqid(time())) . "." . $ext[1];
				
				// Caminho de onde a imagem ficará
				$imagem_dir = $localDestino.$imagem_nome;
						
				// Faz o upload da imagem
				move_uploaded_file($imagem['tmp_name'], $imagem_dir);
				//fim add foto									
		}
		else
		{
			return "erro";
		}
		
		return $imagem_nome;
	}
############################################################################
	//excluirArquivo
	function deleteArquivo($arquivo)
	{
		unlink($arquivo);
	}
	
############################################################################
	//ultimo ID
	function ultimoID()
	{
		//return mysqli_insert_id();
		return $this->conectar()->insert_id;
	}
	
}
 ?>