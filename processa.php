<?php
 
  include_once 'conexao/config.php';
  function retorna($cpf, $conn){

      	$sql = "SELECT nome,email,cpf FROM Cliente WHERE cpf = '$cpf' LIMIT 1 ";
		 $resultado = $conn->query($sql);
		 if($resultado->num_rows > 0){
		while($row = $resultado->fetch_assoc()){
        $dados['nome']  = $row['nome'];
        $dados['email'] = $row['email'];
		}
      }else{
 
         $dados['nome']  = "Não Encontrado";

      }
          return json_encode($dados);
         
  }
  if(isset($_GET['cpf'])){
      echo retorna($_GET['cpf'], $conn);
  }
?>