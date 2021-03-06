<div class="lista_duvida">
  <div class="item_home">Usuario</div>
  <div class="item_home">Localização</div>
  <div class="item_home">Permição</div>
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
			data: {id:idIten, pagina:'interacao'},
			success: function(dados){
				$('.modal').html(dados);
			}
		});
	}
</script>
<?php
  require_once("../../controllers/interacao_controller.php");
  require_once("../../models/interacao_class.php");

  $controller_interacao = new controllerInteracao();
  $list = $controller_interacao::Listar();
  $cont = 0;

  while($cont < count($list)){
?>
<div class="container_lista">
  <div class="itens_mostrar_home"><?php echo $list[$cont]->idUsuario ?></div>
  <div class="itens_mostrar_home"><?php echo $list[$cont]->local ?></div>
  <div class="itens_mostrar_home"><?php echo $list[$cont]->ativar ?></div>
  <div class="itens_mostrar_home">
    <a href="router.php?controller=interacao&modo=excluir&id=<?php echo($list[$cont]->id) ?>">
      <img src="img/icon-delete.png" alt="">
    </a>

    <a href="#" class="ver" onclick="Modal()">
      <img src="img/icon-edit.png" alt="">
    </a>
  </div>
</div>
<?php
    $cont+=1;
  }
?>
