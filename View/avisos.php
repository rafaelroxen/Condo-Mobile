<div class="contentor-site">

    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666">Home | </a>Avisos</div>
        <div style="display:flex">
            <a href="<?php echo BASE; ?>" class="novo" style="width:120px">Home</a>
        </div>
    </div>
    
    <div style="width:86%;margin-top:20px"><h3 style="margin:0">Lista de avisos</h3></div>
    <div class="separador" style="width:86%"></div>

    <?php foreach($avisos as $item): ?>
        <div class="cont-avisos">
            <div class=aviso-titulo>
                <?php echo $item['titulo']; ?>
            </div>
            <div class="aviso-descricao">
                <?php echo $item['descricaoAviso']; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>