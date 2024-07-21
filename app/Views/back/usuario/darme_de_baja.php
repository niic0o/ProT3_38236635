<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card text-center">
        <div class="card-body">
          <h2 class="supertitulo" id="login">Darme de Baja</h2>
          <h5 class="card-title">¿Estás seguro que deseas darte de baja?</h5>
          <p class="card-text text-center">Una vez que presiones en el botón <span> darme de baja </span>
            no podrás volver a iniciar sesión ni registrarte usando el mismo correo.
            Para ser reestablecido deberás solicitar por correo al administrador juan@gmail.com</p>
          <form action="<?php echo base_url('/eliminar_usuario');?>" method="post">
            <input name="id_usuario" type="hidden" value="<?= $id_usuario?>">
            <button class="btn btn-danger btn-lg">Darme de Baja</button>
          </form>
          <div class="btn-group">
            <button class="btn btn-primary btn-lg" onclick="location.href='<?php echo base_url('/');?>/';">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>