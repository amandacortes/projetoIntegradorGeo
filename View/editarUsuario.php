<?php 
    include 'menu.php';

    require '../Model/Usuario.php';
    require '../Model/Patente.php';
    require '../Model/Estado.php';
    require '../Model/Instituicao.php';

    $idUsuario = $_GET["id"];
    if(!(int)$idUsuario){
        //Redireciona

        //Morre
        die("ID inválido.");
    }

    //Instancia o objeto Usuário
    $usuarioObj = new Usuario();
    $dadosUsuario = mysql_fetch_array($usuarioObj->buscarUsuario($idUsuario));

    //Instancia o objeto Patente
    $patenteObj = new Patente();
    $patentes = $patenteObj->listar();

    //Instancia o objeto Estado
    $estadoObj = new Estado();
    $estados = $estadoObj->listar();

    //Instancia o objeto Instituicao
    $instituicaoObj = new Instituicao();
    $instituicoes = $instituicaoObj->listar();

?>

<!DOCTYPE html>

    <body>
        <form name="editarUsuario" action="../Controller/controllerUsuario.php" method="POST" >
        <input type="hidden" name="action" id="action" value="alterarUsuario" />
        <input type="hidden" name="id" value="<?=$idUsuario?>"
            <div class="row">
                <div class="col-md-3">           

                </div>
                <div class="col-md-3">
                    <label>Patente</label>
                        <?php 
                        //Se existirem patentes, exibe
                        if($patentes){ ?>
                          <select class="selectpicker form-control" name="patente" id="patente">
                            <optgroup label="militar">
                            <?php
                            for($l=0; $l<mysql_num_rows($patentes); $l++){
                            ?>
                              <option value="<?php echo $idPatente = mysql_result($patentes, $l, 'id');?>" <?php if($dadosUsuario["id_patente"]==$idPatente){ ?>selected<?php } ?>><?php echo mysql_result($patentes, $l, 'nome');?></option>
                            <?php
                            }
                            ?>
                            </optgroup>
                          </select>
                        <?php }else{ //Não há patentes, exibe mensagem ?>
                        Não há patentes cadastradas. Você precisa primeiro cadastrar uma patente.
                        <?php } ?>
                </div>

                 <div class="col-md-3">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o seu nome aqui." value="<?php echo $dadosUsuario["nome"]; ?>"/>
                </div>
            </div>    

            <div class="row">
                <div class="col-md-3">
                    <label>RG</label>
                    <input type="text" class="form-control" name="rg" id="rg" placeholder="RG"/>
                </div>

                <div class="col-md-3">
                    
                </div>
            </div>                 

            <div class="row">
                <div class="col-md-3">
                    
                </div>

                 <div class="col-md-3">
                    <label>Instituição</label>
                        <?php 
                        //Se existirem patentes, exibe
                        if($instituicoes){ ?>
                          <select class="selectpicker form-control" name="instituicao" id="instituicao">
                            <optgroup label="instituicao">
                            <?php
                            for($l=0; $l<mysql_num_rows($instituicoes); $l++){
                            ?>
                              <option value="<?=$idInstituicao = mysql_result($instituicoes, $l, 'id');?>" <?php if($dadosUsuario["id_instituicao"]==$idInstituicao){ ?>selected<?php } ?>><?php echo mysql_result($instituicoes, $l, 'nome');?></option>
                            <?php
                            }
                            ?>
                            </optgroup>
                          </select>
                        <?php }else{ //Não há instituições, exibe mensagem ?>
                        Não há instituições cadastradas. Você precisa primeiro cadastrar uma instituição.
                        <?php } ?>
                </div>


                <div class="col-md-3">
                     <label>UF:</label>
                    <?php
                    if(mysql_num_rows($estados)>0){
                    ?>
                    <select class="form-control" name="estado" id="estado">
                        <?php
                        for($l=0; $l<mysql_num_rows($estados); $l++){
                        ?>
                        <option value="<?=$idEstado = mysql_result($estados, $l, 'id')?>" <?php if($dadosUsuario["id_estado"]==$idEstado){ ?>selected<?php } ?>><?=mysql_result($estados, $l, 'nome')?></option>
                        <?php } ?>
                    </select>
                    <?php }else{ //Não há estados cadastrados ?>
                    Ops... parece que não há estados cadastrados. Você precisa primeiro cadastrar um Estado.
                    <?php } ?>
                </div>
                <div class="col-md-3">
                    
                </div>

            </div>

            <div class="row">
                <div class="col-md-3">
                
                </div>
                <div class="col-md-3">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Digite o seu e-mail aqui." value="<?php echo $dadosUsuario["email"]; ?>"/>
                </div>
                <div class="col-md-3">
                     <label>Entre sua senha:</label>
                     <input type="text" class="form-control" name="senha" id="senha" placeholder="Digite a sua senha aqui ou deixe-a em branco."/>
                </div>
                <div class="col-md-3">
                    
                </div>           
            </div>

            <div class="row">
                <div class="col-md-3">
                
                </div>
                <div class="col-md-3">
                    <label>Administrador:</label>
                    <input type="checkbox" class="form-control" name="administrador" id="administrador" <?php if($dadosUsuario["permissao"]==1){ ?>checked<?php } ?> value=1/>
                </div>
                <div class="col-md-3">
                     <label>Ativo:</label>
                     <input type="checkbox" class="form-control" name="ativo" id="ativo" <?php if($dadosUsuario["ativo"]){ ?>checked<?php } ?> value=1/>
                </div>
                <div class="col-md-3">
                    
                </div>           
            </div>  


        </div>
        <!--    ###########################################  -->
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                 
                </div>
                <div class="col-md-6">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary btn-block" onclick="location.href='usuarios.php'">Cancelar</button>    
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-block">Salvar</i></button>    
                    </div>                    
                </div>
            </div>
        </div>

    </form>

</body>



<?php
    include 'inferior.php';
?>





