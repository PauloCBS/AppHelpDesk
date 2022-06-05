<?php 

//validacao de sessao
session_start(); 


//variavel apra verificar autenticacao;
 $valida_user = false;


//recbe as informacoes do formulario
    print_r($_POST);
    echo'<br/>';
    echo $_POST['email'];
    echo'<br/>';
    echo $_POST['senha'];


//usuarios salvos hardcode
    $usuarios = array(

        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcd')
    );



//comparacao de entrada vs dados salvos 
//feito a juncao da validacao com a autenticacao 
foreach($usuarios as $user){

    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $valida_user = true;
    }
}


//validacao entre os dados de entrada vs aramzenados

    if($valida_user){
        echo 'usuario autenticado';
        $_SESSION['autenticado'] = 'SIM';
    }else{
//header sera utilizado para retorno a pagina index.php.
// a informacao ao lado direito da interrogacao aparece no url da pagina. 
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
        }
?>