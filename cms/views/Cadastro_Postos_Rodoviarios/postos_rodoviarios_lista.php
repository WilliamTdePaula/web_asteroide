<div class="lista_duvida">
  <div class="item_duvida">Nome</div>
  <div class="item_duvida">imagem</div>
  <div class="item_duvida">Cep</div>
  <div class="item_duvida">Opções</div>
</div>

<script type="text/javascript"></script>
<script>
$(document).ready(function() {

  $(".ver").click(function() {
    $(".modalContainer").fadeIn(500);
	//slideToggle
	//toggle
	//FadeIn
  });
});

	function Modal(idIten){
		$.ajax({
			type: "POST",
			url: "views/modal.php",
			data: {id:idIten, pagina:'postos_rodoviarios'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/postos_rodoviarios_controller.php");
  require_once("../../models/postos_rodoviarios_class.php");

  $controllerPostosRodoviarios = new controllerPostosRodoviarios();
  $list = $controllerPostosRodoviarios::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista">
  <div class="itens_mostrar"><?php echo $list[$cont]->nome ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->imagem ?></div>
  <div class="itens_mostrar"><?php echo $list[$cont]->cep ?></div>
  <div class="itens_mostrar">
    <a href="router.php?controller=postos_rodoviarios&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
      <img src="img/icon-delete.png" alt="">
    </a>

    <a href="#" class="ver" onclick="Modal(<?php echo($list[$cont]->id);?>)">
      <img src="img/icon-edit.png" alt="">
    </a>
  </div>
</div>

<?php
     $cont+=1;
   }
?>
