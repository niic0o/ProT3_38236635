<section class="container-fluid">
  <div class="container registro">
    <br><br><br><br>
    <div class="row justify-content-center mx-auto">
      <div class="col-md-8">
        <h2 class="supertitulo" id="login">Editar Usuario</h2>
        <br><br><br>
        <!-- Inicio formulario -->
        <!-- Condiciones back -->
        <?php $validation = \config\Services::validation();?>
        <form method="post" action="<?php echo base_url('/editar_usuario');?>">
          <?= csrf_field();?> <!--Esta linea brinda token de seguridad contra ataques CSRF al servidor -->
          <?php if (!empty(session()->getFlashdata('fail'))) :?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail');?></div>
          <?php endif;?>
          <?php if (!empty(session()->getFlashdata('success'))) :?>
            <div class="alert alert-success"><?= session()->getFlashdata('success');?></div>
          <?php endif;?>
          <!--  -->
          <div class="registro-row">
            <div class="col-md-6">
              <label for="nombre" class="registro-label">Nombre</label>
              <input name="nombre" type="text" id="nombre" class="form-control registro-input" placeholder="Ingrese su nombre"
              required title="Solo se permiten letras" onblur="this.value = this.value.toUpperCase()" value="<?php echo $usuario['nombre'];?>">
              <!-- Inicio Error -->
              <?php if ($validation->getError('nombre')) {?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('nombre');?>
                </div>
              <?php }?>
              <!-- Fin Error -->
            </div>
          </div>
          <div class="registro-row">
            <div class="col-md-6">
              <label for="apellido" class="registro-label">Apellido</label>
              <input name="apellido" type="text" id="apellido" class="form-control registro-input" placeholder="Ingrese su apellido"
              required title="Solo se permiten letras" onblur="this.value = this.value.toUpperCase()" value="<?php echo $usuario['apellido'];?>">
              <!-- Inicio Error -->
              <?php if ($validation->getError('apellido')) {?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('apellido');?>
                </div>
              <?php }?>
              <!-- Fin Error -->
            </div>
          </div>
          <div class="registro-row">
            <div class="col-md-6">
              <label for="usuario" class="registro-label">Nombre de usuario</label>
              <input name="usuario" type="text" id="usuario" class="form-control registro-input" required
              placeholder="Ingrese un nombre de usuario (menos de 10 caracteres)" value="<?php echo $usuario['usuario'];?>">
              <!-- Inicio Error -->
              <?php if ($validation->getError('usuario')) {?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('usuario');?>
                </div>
              <?php }?>
              <!-- Fin Error -->
            </div>
          </div>
          <div class="registro-row">
            <div class="col-md-6">
              <label for="email" class="registro-label">Correo electrónico</label>
              <input name="email" type="email" id="email" class="form-control registro-input" placeholder="ejemplo@gmail.com" required
              pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Por favor, ingrese un correo electrónico válido"
              value="<?php echo $usuario['email'];?>">
              <!-- Inicio Error -->
              <?php if ($validation->getError('email')) {?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('email');?>
                </div>
              <?php }?>
              <!-- Fin Error -->
            </div>
          </div>

          <div class="registro-row">
            <div class="col-md-6">
              <label for="provincia" class="registro-label">Provincia</label>
              <input name="provincia" type="text" id="provincia" class="form-control registro-input" placeholder="Provincia donde reside"
              required title="Solo se permiten letras" value="<?php echo $usuario['provincia'];?>">
              <!-- Inicio Error -->
              <?php if ($validation->getError('provincia')) {?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('provincia');?>
                </div>
              <?php }?>
              <!-- Fin Error -->
            </div>
          </div>
          <div class="registro-row">
            <div class="col-md-6">
              <label for="ciudad" class="registro-label">Ciudad</label>
              <input name="ciudad" type="text" id="ciudad" class="form-control registro-input" placeholder="Ciudad donde reside" required
              title="Solo se permiten letras" value="<?php echo $usuario['ciudad'];?>">
              <!-- Inicio Error -->
              <?php if ($validation->getError('ciudad')) {?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('ciudad');?>
                </div>
              <?php }?>
              <!-- Fin Error -->
            </div>
          </div>
          <div class="registro-row">
            <div class="col-md-6">
              <label for="domicilio" class="registro-label">Domicilio</label>
              <input name="domicilio" type="text" id="domicilio" class="form-control registro-input" required
              placeholder="Domicilio donde reside" title="Ejemplo: San Martin nº 1500" value="<?php echo $usuario['domicilio'];?>">
              <!-- Inicio Error -->
              <?php if ($validation->getError('domicilio')) {?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('domicilio');?>
                </div>
              <?php }?>
              <!-- Fin Error -->
            </div>
          </div>
          <div class="registro-row">
            <div class="col-md-6">
              <label for="dni" class="registro-label">DNI</label>
              <input name="dni" type="text" id="dni" class="form-control registro-input" required
              placeholder="11333222 sin puntos" title="Sólo numeros sin puntos" value="<?php echo $usuario['dni'];?>">
              <!-- Inicio Error -->
              <?php if ($validation->getError('dni')) {?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('dni');?>
                </div>
              <?php }?>
              <!-- Fin Error -->
            </div>
          </div>
          <br><br>
          <!-- Paso el id para buscar en la bdd -->
          <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'];?>">
          <input type="submit" value="Confirmar" class="btn btn-success btn-lg btn-comprar supertitulo focus"></input>
          <input type="reset" value="Cancelar" class="btn btn-danger btn-lg btn-comprar supertitulo focus"></input>
          <input type="button" value="Volver" class="btn btn-primary btn-lg btn-comprar supertitulo focus" onclick="location.href='<?php echo base_url('/');?>/';">
        </form>
        <!-- Fin formulario -->
        <br><br>
      </div>
    </div>
  </div>
</section>                  