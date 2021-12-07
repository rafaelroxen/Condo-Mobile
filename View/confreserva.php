<div class="contentor-site">
    
    <div class="local">
        <div class="local-titulo"><a href="<?php echo BASE; ?>" style="text-decoration:none;font-size:14px;font-weight:normal;color:#666">Home | </a>Reserva</div>
        <div style="display:flex">
            <a href="<?php echo BASE; ?>" class="novo" style="margin:0 10px 0 10px;">Voltar</a>
            <a href="<?php echo BASE.'verreserva'; ?>" class="novo">Ver Reservas</a>
        </div>
    </div>

    <h4 style="margin:0">Consultar Disponibilidade:</h4>
    <div class="agenda">
        
        <form method="POST">
            <div style="display:flex;flex-direction:column;margin-right:10px">
                Mês: 
                <select name="mes">
                    <?php if(!empty($mes)): ?>
                        <option value="<?php echo $mes; ?>"><?php echo $mes; ?></option>
                    <?php endif; ?>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>

            <div style="display:flex;flex-direction:column;margin-right:10px">
                Ano: 
                <select name="ano">
                    <?php
                        if(!empty($ano)){
                            echo '<option>' . $ano . '</option>';
                        }
                        $ano = date('Y');
                        for ($i = $ano; $i <= ($ano + 5); $i++) {
                            echo '<option>' . $i . '</option>';
                        }
                    ?>
                </select>
            </div>

            <input type="submit" value="Consultar" style="height:20px;margin-top:20px;">
        </form>
    </div>

    <table border="1px" width="60%" style="border-color:#008fc3">
        <tr>
            <th class="titulo-table">Dom</th>
            <th class="titulo-table">Seg</th>
            <th class="titulo-table">Ter</th>
            <th class="titulo-table">Qua</th>
            <th class="titulo-table">Qui</th>
            <th class="titulo-table">Sex</th>
            <th class="titulo-table">Sab</th>
        </tr>
         
        <?php for ($i = 0; $i < $linhas; $i++) : ?>
            <tr>
                <?php for ($c = 0; $c < 7; $c++) : ?>
                    <?php $d = date('d', strtotime(($c + ($i * 7)) . ' days', strtotime($data_ini))); ?>
                    <?php $data = date('Y-m-d', strtotime(($c + ($i * 7)) . ' days', strtotime($data_ini))); ?>
                    <?php $stilo = "text-align:center"; ?>
                    <?php foreach($rsv as $item){
                        if(in_array($data, $item)){
                            $stilo = "text-align:center;background-color:red;color:#fff;";
                        }
                    } 
                    ?>
                    <td style="<?php echo $stilo; ?>"><?php echo $d; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

    <?php if(isset($retornoReserva) and !empty($retornoReserva)): ?>
        <div class="erro">
            <?php echo $retornoReserva; ?>
        </div>
    <?php endif; ?>

    <div style="width:60%;margin-top:20px"><h3 style="margin:0">Criar Reserva</h3></div>
    <div class="separador"></div>

    <div style="width:60%;margin: 0 0 15px 0;">
        <form method="POST" class="form-reserva">
            <p style="margin:10px 0 0 0;font-weight:bold">Informe uma data:</p>
            <input type="date" name="dia">
            <p style="margin:10px 0 0 0;font-weight:bold">Digite a Hora:</p>
            <input type="time" name="hora">
            <p style="margin:10px 0 0 0;font-weight:bold">
                Informe o número de pessoas convidadas:
            </p>
            <input type="number" name="qtConvidados" />
            <p style="margin:10px 0 0 0;font-weight:bold">
                Insira os nome das pessoas convidadas(um por vez)
            </p>
            <div style="width:100%">
                <input type="text" id="listaConvidados" style="width:84%; margin-right:1%;margin-bottom:10px"/>
                <a onclick="addConvidado()" class="link">Adcionar</a>
            </div>
            
            <textarea class="listaText" id="lista" name="nomes"></textarea>

            <button>RESERVAR</button>
        </form>
    </div>

</div>