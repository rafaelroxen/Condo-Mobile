<div class="contentor-site">
    
    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666"></a>Home</div>
    </div>
    
    <div class="cont-home">
        <div class="cont-home-itens">
            <div style="width:90%;margin-top:20px"><h3 style="margin:0">Avisos</h3></div>
            <div class="separador" style="width:90%"></div>

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

        <div class="cont-home-itens">
            <div style="width:90%;margin-top:20px"><h3 style="margin:0">Chamados</h3></div>
            <div class="separador" style="width:90%"></div>

            <?php foreach($chamados as $item): ?>
                <div class="cont-avisos">
                    <div class=aviso-titulo style="background-color:#ffeb84">
                        Condomino: <?php echo $item['nomeUsuario']; ?>
                    </div>
                    <div class="aviso-descricao">
                        <?php echo $item['descricaoChamado']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cont-home-itens">
            <div style="width:90%;margin-top:20px"><h3 style="margin:0">Reclamações</h3></div>
            <div class="separador" style="width:90%"></div>

            <?php foreach($reclamacao as $item): ?>
                <div class="cont-avisos">
                    <div class=aviso-titulo style="background-color:#ec5ad9">
                        Condomino: <?php echo $item['nomeUsuario']; ?>
                    </div>
                    <div class="aviso-descricao">
                        <?php echo $item['descricaoReclamacao']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</div>