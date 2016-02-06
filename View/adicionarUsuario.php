<?php 
    include 'menu.php'; 
?>

    <body>
        <form name="editarUsuario" action="../Controller/controllerUsuario.php" method="POST" >
        <input type="hidden" name="action" id="action" value="salvarUsuario" />
        <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$dadosUsuario['id']?>" />
            <div class="row">
                <div class="col-md-3"></div>
                

                 <div class="col-md-6">
					   <label>Nome</label>
                    <input type="text" value="<?=$dadosUsuario['nome']?>" class="form-control" name="nome" id="nome" placeholder="Digite o seu nome aqui."/>
                </div>
            </div>    

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                       <label>RG</label>
                    <input type="text" class="form-control" name="rg" value="<?=$dadosUsuario['rg']?>" id="rg" placeholder="RG"/>
                </div>
                <div class="col-md-3">
                    <label>Patente</label>

                        <select class="form-control" name="patente" id="patente">
                          <?php                                                                      
                            foreach ($listaDePatentes as $row) {
                                if($dadosUsuario['id_patente'] == $row['id']){
                                     echo "<option selected value='".$row['id']."'>".$row['nome']."</option>";

                                 }else{
                                    echo "<option value='".$row['id']."'>".$row['nome']."</option>";
                                }
                            }
                           ?>
                        </select>
                </div>
            </div>                 

            <div class="row">
                <div class="col-md-3"></div>

                 <div class="col-md-3">
                    <label>Instituição</label>
                          <select class="form-control" name="instituicao" id="instituicao">
                              <?php                                                                      
                                foreach ($listaDeInstituicoes as $row) {
                                    echo "<option value='".$row['id']."'>".$row['nome']."</option>";
                                }
                           ?>
                          </select>
                    
                </div>


                <div class="col-md-3">
                     <label>UF:</label>
                    <select class="form-control" name="estado" id="estado">
                        <?php                                                                      
                                foreach ($listaDeEstados as $row) {
                                    echo "<option value='".$row['sigla']."'>".$row['nome']."</option>";
                                }
                           ?>
                    </select>
                </div>
                <div class="col-md-3">
                    
                </div>

            </div>

            <div class="row">
                <div class="col-md-3">
                
                </div>
                <div class="col-md-3">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" value="<?=$dadosUsuario['email']?>" id="email" placeholder="Digite o seu e-mail aqui."/>
                </div>
                <div class="col-md-3">
                     <label>Entre sua senha:</label>
                     <input type="text" class="form-control" name="senha" value="" id="senha" placeholder="Digite a sua senha aqui."/>
                </div>
                <div class="col-md-3">
                    
                </div>           
            </div>
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-3">
                    <label>IP:</label>
                    <input type="text" class="form-control" name="ip" value="" id="ip" placeholder="Digite o IP aqui."/>
                </div>
                <div class="col-md-3">
                    <label>Administrador:</label>
                    <?php 
                        if($dadosUsuario['ativo'] == 1){
                            $statusAtivo = "checked";
                        }else{
                            $statusAtivo = "";
                        }

                        if($dadosUsuario['permissao'] == 1){
                            $statusAdministrador = "checked";
                        }else{
                            $statusAdministrador = "";
                        }
                    ?>
                    <input type="checkbox"  class="" <?=$statusAdministrador?> name="administrador" id="administrador" value="1" />
                    <br>
                    <label>Ativo:</label>
                     <input type="checkbox" class="" <?=$statusAtivo?> name="ativo" id="ativo" value="1" />
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





