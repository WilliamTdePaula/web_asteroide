<div class="lista_duvida">
  <div class="item_home">Nome</div>
  <div class="item_home">Imagem</div>
  <div class="item_home">Estado</div>
  <div class="item_home">Opções</div>
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
			data: {id:idIten, pagina:'postos'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/postos_controller.php");
  require_once("../../models/postos_class.php");

  $controller_postos = new controllerPostos();
  $list = $controller_postos::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista">
  <div class="itens_mostrar_home"><?php echo $list[$cont]->nome ?></div>
  <div class="itens_mostrar_home"><img class="imagem_lista" src="<?php echo $list[$cont]->imagem ?>" alt="imagem"></div>
  <div class="itens_mostrar_home"><?php echo $list[$cont]->estado ?></div>
  <div class="itens_mostrar_home">
    <a href="router.php?controller=postos&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
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
