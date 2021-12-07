<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE.'assets/css/estilo.css'?>">
    <title>Cadastrar Usuario</title>
</head>
<body>
    <div class="cont-pag-login">
        <div class="cont-login" style="justify-content: center;">
            
            <!--<div class="logo">Condo Mobile</div>-->

            <!--Se houver algum erro ao cadastrar usuário exibe uma mensagem-->
            <div class="mgs-err">
                <?php 
                    if(isset($retorno) and !empty($retorno)){
                        echo $retorno;
                    } 
                ?>
            </div>

            <form method="POST" class="form-login">
                <div class="login-descricao">Nome</div>
                <input type="text" name="nome" placeholder="Seu Nome"><br/>
                <div class="login-descricao">Telefone</div>
                <input type="number" name="telefone"><br/>
                <div class="login-descricao">email</div>
                <input type="email" name="email" placeholder="exemplo@gmail.com"><br/>
                <div class="login-descricao">Senha:</div>
                <input type="password" name="senha" ><br/>
                <input type="submit" value="CADASTRAR">
            </form>
            <a href="<?php echo BASE.'login'; ?>" class="btn-link">Página de Login</a>
        </div>
    </div>
</body>
</html>