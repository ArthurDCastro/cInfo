<form action="perfil/<?= $_COOKIE['login'] ?>/editar_perfil" method="post" id="formulario">
    <input name="erro" type="text" value="<?= $data['erro'] ?> " />
    <button type="submit" id="submit"></button>
</form>
<script>
$(document).ready(function() {
    $('#formulario').hide();
    $("#submit").trigger("click");
});
</script>