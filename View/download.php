<div class="contentor-site">

    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666">Home | </a>Regimentos</div>
        <div style="display:flex">
            <a href="<?php echo BASE; ?>" class="novo" style="width:120px">Home</a>
        </div>
    </div>

    <div style="width:86%;margin-top:20px"><h3 style="margin:0">Regimentos disponiveis</h3></div>
    <div class="separador" style="width:86%"></div>

    <div class="cont-itens-minha-reserva">
        
        <?php foreach($retorno as $item): ?>
            <a href="<?php echo BASE.'downloads/'.$item['nomeDownload'].'.txt'; ?>" style="color:#fff;text-decoration:none">
                <div class="documento">
                    <div class="doc-titulo"><?php echo $item['nomeDownload']; ?></div>
                    <div style="text-align:center;color:blueviolet"><h3>Condo Mobile</h3></div>
                </div>
            </a>
        <?php endforeach; ?>

    </div>

</div>