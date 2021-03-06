
<?php
   require_once("../../controllers/postos_controller.php");
   require_once("../../models/postos_class.php");
?>
<script src="js/jquery.min.js"></script>
<script>
$("#foto").change(function(){
   if($(this).val()){ // só se o input não estiver vazio
      var img = this.files[0]; // seleciona o arquivo do input
      var f = new FileReader(); // cria o objeto FileReader
      f.onload = function(e){ // ao carregar a imagem
         $("#id_sua_img").attr("src",e.target.result); // altera o src da imagem
      }
      f.readAsDataURL(img); // lê o arquivo
   }
});
</script>
<form class="frmCadDuvida" method="post" enctype="multipart/form-data" action="router.php?controller=postos&modo=novo" enctype="multipart/form-data">
  <div class="cadastro_postos">
      <div class="text_postos">Nome do Posto Rodoviario</div>
      <input class="box_postos" type="text" name="txtnome">
      <div class="text_postos">Imagem</div>
      <label for="foto">
        <div  class="adicionar_frota" id="imagem">
          <img id="id_sua_img" src="img/bus.jpg" alt="foto"/>
        </div>
      </label>
      <!--Botão para selecionar a foto-->
      <div class="input-foto">
        <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
      </div>
      <div class="text_postos">Texto</div>
      <input class="box_postos" type="text" name="txttexto" value="">
      <div class="text_postos">Link de Localização</div>
      <input class="box_postos" type="text" name="txtlocalizacao" value="">
      <div class="text_postos">Logradouro</div>
      <input class="box_postos" type="text" name="txtlogradouro" value="">
      <div class="text_postos">Estados</div>
      <select class="select_onibus" name="estado">
          <?php
              require_once("../../controllers/estados_postos_controller.php");
              require_once("../../models/estados_postos_class.php");

              $controllerEstadosPostos = new controllerEstadosPostos();
              $list=$controllerEstadosPostos::Listar();

              $cont = 0;

              while($cont < count($list)){

              ?>
              <option value="<?php echo($list[$cont]->id)?>">
                  <?php echo($list[$cont]->estado)?></option>

              <?php
                $cont+=1;
                  }
                  ?>
              </select>
      <input class="salvar_postos" type="submit" name="btnsalvar" value="Salvar">
  </div>
</form>
