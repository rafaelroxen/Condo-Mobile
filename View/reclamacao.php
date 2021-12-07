<div class="contentor-site">
    
    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666">Home | </a>Reclamação</div>
        <div style="display:flex">
            <a href="<?php echo BASE.'verreclamacao'; ?>" class="novo" style="width:140px">Ver Reclamações</a>
        </div>
    </div>

    <div style="width:86%;margin-top:20px"><h3 style="margin:0">Registrar Reclamação</h3></div>
    <div class="separador" style="width:86%"></div>

    <?php if(isset($retorno) and !empty($retorno)): ?>
        <div class="erro">
            <?php echo $retorno; ?>
        </div>
    <?php endif; ?>

    <div style="width:86%;margin:20px 0 15px 0;">
        <form method="POST" enctype="multipart/form-data">
            <p style="margin:10px 0 0 0;font-weight:bold">Informe um titulo para reclamação</p>
            <input type="text" name="titulo" style="width:300px;">

            <p style="margin:10px 0 0 0;font-weight:bold">Selecione um arquivo de media:</p>
            <input type="file" name="midia"><br><br>

            <p style="margin:10px 0 0 0;font-weight:bold">Descrição da reclamação:</p>
            <textarea name="descricao" cols="50" rows="10"></textarea><br>

            <button>Abrir Reclamação</button>
        </form>
    </div>

</div>