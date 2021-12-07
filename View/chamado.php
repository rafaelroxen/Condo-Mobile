<div class="contentor-site">

    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666">Home | </a>Chamado</div>
        <div style="display:flex">
            <a href="<?php echo BASE.'verchamados'; ?>" class="novo" style="width:120px">Ver Chamados</a>
        </div>
    </div>

    <div style="width:86%;margin-top:20px"><h3 style="margin:0">Abrir Novo Chamado</h3></div>
    <div class="separador" style="width:86%"></div>

    <?php if(isset($chamado) and !empty($chamado)): ?>
        <div class="erro">
            <?php echo $chamado; ?>
        </div>
    <?php endif; ?>

    <div style="width:86%;margin:20px 0 15px 0;">
        <form method="POST" enctype="multipart/form-data">
            <p style="margin:10px 0 0 0;font-weight:bold">Selecione o Tipo de Chamado:</p>
            <select name="tipo">
                <option value=""> Selecion </option>
                <option value="2">Elétrico</option>
                <option value="1">Hidráulico</option>
            </select><br>

            <p style="margin:10px 0 0 0;font-weight:bold">Selecione um arquivo de media:</p>
            <input type="file" name="midia"><br><br>

            <p style="margin:10px 0 0 0;font-weight:bold">Descrição do Chamado:</p>
            <textarea name="descricao" cols="50" rows="10"></textarea><br>

            <button>Abrir Chamado</button>
        </form>
    </div>

    
</div>