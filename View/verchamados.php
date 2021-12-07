<div class="contentor-site">

    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666">Home | </a>Chamado</div>
        <div style="display:flex">
            <a href="<?php echo BASE.'chamado'; ?>" class="novo" style="width:120px">Voltar</a>
        </div>
    </div>

    <!-- <div style="width:86%;margin:20px 0 15px 0;">
        <div style="width:100%;margin-top:20px"><h3 style="margin:0">Pesquisar Chamando</h3></div>
        <div class="separador" style="width:100%"></div>
        <form method="POST">
            <p style="margin:10px 0 0 0;font-weight:bold">Insira o número do chamdo</p>
            <input type="number" name="numero" />
            <input type="submit" value="PESQUISAR">
        </form>
    </div> -->

    <div style="width:86%;margin-top:20px"><h3 style="margin:0">Meus Chamados abertos</h3></div>
    <div class="separador" style="width:86%"></div>

    <div class="cont-itens-minha-reserva">
        <?php if(count($retorno) > 0): ?>
            <?php foreach($retorno as $item):?>
                
                <div class="cont-minha-reserva">
                    <div class="cancel-reserva">
                        <a href="<?php echo BASE.'verchamados/delete/'.$item['idChamado']; ?>">Cancelar Chamado</a>
                    </div>
                    <div class="dados-reserva">
                        <div class="spaco">Tipo Chamado: <?php echo $item['idTipoChamado']==1?'Hidráulico':'Elétrico' ?></div>
                        <div class="protocolo">Número Chamado: <?php echo $item['idChamado']; ?></div>
                        <div class="data" style="text-align:center">
                            Data: <?php echo date('Y-m-d', strtotime($item['prazo'])); ?>
                        </div>
                        <div class="qtConvidados">Descricao: <?php echo $item['descricaoChamado']; ?></div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
        
    </div>

</div>