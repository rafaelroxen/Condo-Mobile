<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE.'assets/css/estilo.css'?>">
    <title>Login</title>
</head>
<body>
    <!--Pagina de login-->
    <div class="cont-pag-login">
        <div class="cont-login">
            <div class="logo">Condo Mobile</div>

            <!--Se houver algum erro ao validar usuário exibe uma mensagem-->
            <div class="mgs-err">
                <?php 
                    if(isset($msg) and !empty($msg)){
                        echo $msg;
                    } 
                ?>
            </div>
            
            <form method="POST" action="login" class='form-login'>
                <div class="login-descricao">E-mail:</div>
                <input type="email" name="email" placeholder="exemplo@email.com"><br/>
                <div class="login-descricao">Senha:</div>
                <input type="password" name="senha" ><br/>
                <input type="submit" value="ENTRAR">
            </form>
            <a href="" class="btn-link">Esquecia a Senha</a>
            <a href="<?php echo BASE.'cadastrar'; ?>" class="btn-link">Cadastrar</a>
        </div>
    </div>
</body>
</html>