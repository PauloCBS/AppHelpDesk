<?php 

//validacao de sessao
session_start(); 

//variavel para verificar autenticacao;
$valida_user = false;

//variaveis para reset das configuracoes.
$usuario_id = null;
$usuario_perfil_id = null;

//variavel para definir administrador e user comum.
$perfis = array(1 => 'Administrativo', 2 =>'Usuario');


//recbe e verifica as informacoes do formulario
    print_r($_POST);
    echo'<br/>';
    echo $_POST['email'];
    echo'<br/>';
    echo $_POST['senha'];
    echo'<br/>';
   


//usuarios salvos hardcode
    $usuarios = array(
//indice utilizado para identificar
        array('id'=> 1,'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('id'=> 2,'email' => 'paulo@teste.com.br', 'senha' => '12345', 'perfil_id '=> 2),
        array('id'=> 3,'email' => 'matheus@teste.com.br', 'senha' => '1234567','perfil_id' => 2),
    );


//comparacao de entrada vs dados salvos 
//feito a juncao da validacao com a autenticacao 
    foreach($usuarios as $user){

        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $valida_user = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
            
        }
    }

//validacao entre os dados de entrada vs aramzenados

    if($valida_user){
        echo 'usuario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
        
    }else{
//header sera utilizado para retorno a pagina index.php.
// a informacao ao lado direito da interrogacao aparece no url da pagina. 
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
        }
?>