	<?php include 'menu.php';?>
        <div class="container">
            <form action="imprimirRelatorio.php" method="POST"  enctype="multipart/form-data">
            <input value="1" id="numeroDeArquivos" name="numeroDeArquivos" type="hidden" class="">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="thumbnail col-md-12">
                    <div class="col-md-6">
                            <h4>1. Imagem de cabeçalho</h4>
                            <input type="file" name="arquivoCabecalho" id="arquivoCabecalho" >                       
                    </div>                
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="thumbnail col-md-12">
                    <div class="col-md-12">
                            <h4>2. Título do Relatório</h4>
                            <input type="text" class="form-control" name="tituloRelatorio" id="tituloRelatorio" placeholder="Título"/>                    
                    </div>                
                </div>
            </div>


            <div class="row">
                <div class="col-md-2"></div>
                <div class="thumbnail col-md-12">
                    <div class="col-md-12">
                            <h4>3. Mapas e descrições</h4>
                            <div class="thumbnail col-md-12">
                                <h6>#arquivo1</h6>
                                <input value="1" id="arquivo1" name="arquivo1" type="hidden" class="">
                                <input type="file" id="arquivo1" name="arquivo1" style="margin-bottom:1%;">                       
                                <textarea style="margin-bottom: 2%" id="txtArquivo1" name="txtArquivo1" class="form-control" rows="6"></textarea>                  
                            </div>  
                            <div class="maisArquivos" id="maisArquivos" name="maisArquivos"></div>
                            <button type="button" onclick="maisArquivos()">+</button>

                    </div>                
                </div>
            </div>
        <div class="row" style="margin-top: 2%">
            <div class="col-md-12">
                <div class="pull-right">
                    <button type="submit"  class="btn btn-primary btn-lg">
                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
                    </button>
                </div>
            </div>
        </div>
        </form>	
		
        </div>
    

        <script type="text/javascript">
            
            function maisArquivos(){
                var numero = parseFloat($('#numeroDeArquivos').val());
                numero = numero+1;
                $('#numeroDeArquivos').val(numero);

                var numeroArq = "arquivo"+numero;

                var scriptDeArquivo = "<div class='thumbnail col-md-12'><h6>#"+numeroArq+"</h6><input value='1' id='"+numeroArq+"' name='"+numeroArq+"' type='hidden' class=''><input type='file' id='"+numeroArq+"' style='margin-bottom:1%;'/><textarea style='margin-bottom: 2%' id='txt"+numeroArq+"' name='txt"+numeroArq+"' class='form-control' rows='6'></textarea></div>";

                $('#maisArquivos').append(scriptDeArquivo);
            }
        </script>
            
    </body>
</html>
	
	
	
	
	
