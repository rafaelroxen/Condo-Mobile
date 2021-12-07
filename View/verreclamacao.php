<div class="contentor-site">

    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666">Home | </a>Reclamação</div>
        <div style="display:flex">
            <a href="<?php echo BASE.'reclamacao'; ?>" class="novo" style="width:120px">Voltar</a>
        </div>
    </div>

    <div style="width:86%;margin-top:20px"><h3 style="margin:0">Meus Chamados abertos</h3></div>
    <div class="separador" style="width:86%"></div>

    <div class="cont-itens-minha-reserva">
        <?php if(count($retorno) > 0): ?>
            <?php foreach($retorno as $item):?>
                
                <div class="cont-minha-reserva">
                    <div class="cancel-reserva">
                        <a href="<?php echo BASE.'verreclamacao/delete/'.$item['idReclamacao']; ?>">Cancelar Chamado</a>
                    </div>
                    <div class="dados-reserva">
                        <div class="spaco">Reclamção número: <?php echo $item['idReclamacao']; ?></div>
                        <div class="protocolo" style="margin:0 0 3px 0">Titulo: <?php echo $item['tituloReclamacao']; ?></div>
                        <div class="qtConvidados">Descricao: <?php echo $item['descricaoReclamacao']; ?></div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
        
    </div>

</div>