<h2 class="supertitulo" id="login">Listado de Usuarios</h2>
<?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg')?>
                </div>
            <?php endif; ?>
<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">DNI</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Usuario</th>
        <th scope="col">Email</th>
        <th scope="col">Provincia</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Domicilio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $usuario) { ?>
        <tr>
          <td><?= $usuario['dni'] ?></td>
          <td><?= $usuario['nombre'] ?></td>
          <td><?= $usuario['apellido'] ?></td>
          <td><?= $usuario['usuario'] ?></td>
          <td><?= $usuario['email'] ?></td>
          <td><?= $usuario['provincia'] ?></td>
          <td><?= $usuario['ciudad'] ?></td>
          <td><?= $usuario['domicilio'] ?></td>
          <td>
            <div class="btn-group">
              <form action="<?php echo base_url('/buscar_usuario'); ?>" method="post">
                <button class="btn btn-success btn-sm">Editar</button>
                <input name="dni" type="hidden" value="<?= $usuario['dni'] ?>">
              </form>
              <?php if ($usuario['perfil_id'] != 1) { ?>
                <form action="<?php echo base_url('/eliminar_usuario'); ?>" method="post">
                  <button class="btn btn-danger btn-sm">Eliminar</button>
                  <input name="id_usuario" type="hidden" value="<?= $usuario['id_usuario'] ?>">
                </form>
              <?php } ?>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>