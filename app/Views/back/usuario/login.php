<section class="conteiner-fluid">
  <div class="container-fluid login">
    <br><br><br><br><br><br><br>
    <div class="row justify-content-center">
      <div class="col-md-4 col-lg-3">
        <div class="card shadow-lg">
          <div class="card-body">
            <h1 class="supertitulo" id="login">Iniciar Sesión</h1>
            <!-- Mensaje de error -->
            <?php if (session()->getFlashdata('msg')) : ?>
              <div class="alert alert-warning">
                <?= session()->getFlashdata('msg') ?>
              </div>
            <?php endif; ?>

            <!-- Inicio formulario login -->
            <form method="post" action="<?php echo base_url('/enviarlogin'); ?>">
              <div class="mb-3">
                <label for="email" class="registro-label">
                  <p class="supertexto">Correo electrónico</p>
                </label>
                <input name="email" type="email" id="email" class="form-control registro-input" placeholder="ejemplo@gmail.com" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Por favor, ingrese un correo electrónico válido">
              </div>
              <div class="mb-3">
              <label for="password" class="registro-label">
              <p class="supertexto">Contraseña</p>
              </label>
              <input name="pass" type="password" id="password" class="form-control registro-input" placeholder="password" required pattern=".{6,16}" title="La contraseña debe tener entre 6 y 16 caracteres">
              </div>
              <div class="d-grid gap-2">
                <input class="btn btn-primary btn-block" type="submit" value="Ingresar"></input>
              </div>
              <div class="text-center">
                <!--<button class="btn btn-link btn-sm" type="button">Reestablecer contraseña</button>-->
                <button class="btn btn-link btn-sm" type="button"><a href="<?php echo base_url('registro'); ?>">Registrarse</a></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>