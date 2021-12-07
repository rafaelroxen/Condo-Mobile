<div class="contentor-site">
    
    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666">Home | </a>Reclamação</div>
        <div style="display:flex">
            <a href="<?php echo BASE.'reclamacao'; ?>" class="novo" style="width:120px">Voltar</a>
        </div>
    </div>

    <div style="width:86%;margin-top:20px"><h3 style="margin:0">Cancelar Reclamação</h3></div>
    <div class="separador" style="width:86%"></div>

    <?php if(isset($retorno) and !empty($retorno)): ?>
        <div class="erro">
            <?php echo $retorno; ?>
        </div>
    <?php endif; ?>

    <div style="width:86%;margin:20px 0 15px 0;">
        
        <form method="POST">
            <p style="margin:10px 0 0 0;font-weight:bold">Chamado a ser Cancelado</p>
            <input type="text" disabled name="num" value="<?php echo $numero; ?>">

            <p style="margin:10px 0 0 0;font-weight:bold">Selecione um Motivo para cancelamento</p>
            <select name="motivo">
                <?php foreach($motivo as $item): ?>
                    <option value="<?php echo $item['idMotivoCancel'];?>"><?php echo $item['descricaoMotivoCancel']; ?></option>
                <?php endforeach;?>
            </select><br><br>

            <button>Cancelar Reclamação</button>
        </form>

    </div>
</div>