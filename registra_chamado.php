<?php
//iniciar sessao
session_start();

//criar a variavel para converter a string em texto. 

$titulo = $_POST['titulo'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];


//adicionar junto ao texto o id de cada user.
$texto =$_SESSION['id'].'#'. $titulo.'#'.$categoria.'#'.$descricao.PHP_EOL;

//fopen e uma funcao nativa que permite a abertura e criacao de arquivos de texto.
//variavel do arquivo
$arquivo = fopen('helpDesk.txt', 'a');

//fwrite permite escrever no arquivo o conteudo da variavel.
fwrite($arquivo, $texto);


//fclose, utilizado para fechar o arquivo e salvar. 
fclose($arquivo);

//apos salvar as informacoes, vamos redirecionar a pagina para a pagina inicial.
header('Location: abrir_chamado.php');
?>