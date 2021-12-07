<div class="contentor-site">
    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666">Home | </a>Reserva</div>
        <div style="display:flex">
            <a href="<?php echo BASE.'reserva'; ?>" class="novo" style="margin:0 10px 0 10px;">Voltar</a>
        </div>
    </div>

    <div style="width:86%;margin-top:20px"><h3 style="margin:0">Minhas Reservas</h3></div>
    <div class="separador" style="width:86%"></div>

    <div class="cont-itens-minha-reserva">
        <?php if(count($reservas) > 0): ?>
            <?php foreach($reservas as $item):?>
                
                <div class="cont-minha-reserva">
                    <div class="cancel-reserva">
                        <a href="<?php echo BASE.'verreserva/delete/'.$item['idReserva']; ?>">Cancelar reserva</a>
                    </div>
                    <div class="dados-reserva">
                        <div class="spaco">Área: <?php echo $item['idTipoReserva']==1?'Piscina':'Salão de Festas' ?></div>
                        <div class="protocolo">Protocolo: <?php echo $item['protocoloReserva']; ?></div>
                        <div class="data">
                            Data: <?php echo date('Y-m-d', strtotime($item['diaReserva'])); ?> Hora: <?php echo $item['horaReserva']; ?>
                        </div>
                        <div class="qtConvidados">Convidados: <?php echo $item['qtConvidadosReserva']; ?></div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
        
    </div>

</div>