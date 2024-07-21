<!-- inicio barra de navegacion -->
<?php
$session = session();
$id_usuario = session();
$nombre = $session->get('usuario');
$perfil = $session->get('perfil_id');
$dni = $session->get('dni');
?>

<div class="container-fluid bg-dark">
  <!-- Usar navbar-expand-xl debido al padding que agregue a los <li> usando css-->
  <nav class="navbar navbar-expand-xl navbar-dark bg-dark py-2 py-lg-0">
    <a class="navbar-brand" href="<?php echo base_url('principal'); ?>">
      <img src="assets/img/Logotipo/logo1.png" alt="" width="77" height="77" class="img-fluid">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- inicio navbar personalizado -->
    <?php if (session()->perfil_id == 1) : ?>
      <!-- [INICIO] Navbar personalizado para: admin-->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item separacion">
            <a class="nav-link supertitulo fondo_gris" id="sesion" aria-current="page">ADMIN: <?php echo session('usuario'); ?></a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo text-info" href="<?php echo base_url('/panel'); ?>">PANEL</a>
          </li>
          <li class="nav-item separacion">
            <!-- llamo a supertitulo para la fuente-->
            <a class="nav-link supertitulo" aria-current="page" href="<?php echo base_url('principal'); ?>">Inicio</a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('quienes_somos'); ?>">Quienes Somos</a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('acerca_de'); ?>">Acerca de</a>
          </li>
           <!-- inicio config -->
           <li class="nav-item dropdown supertitulo separacion">
            <a class="nav-link dropdown-toggle supertitulo" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-cog fa-xl" style="color: C52C3B;"></i>
              Opciones
            </a>
            <ul class="dropdown-menu fondo_gris" aria-labelledby="navbarDropdown">
              <!-- Uso nav-link en vez de dropdown-item para manejar los semi clicks del usuario que corrompen el :hoover de mi css-->

              <li><a class="nav-link supertitulo" href="<?php echo base_url('/listado'); ?>">Ver Usuarios</a></li>
              <li><a class="nav-link supertitulo" href="<?php echo base_url('/listado_de_eliminados'); ?>">Reestablecer Usuarios</a></li>
              <li><a class="nav-link supertitulo" href="<?php echo base_url('/registro'); ?>">Registrar Usuarios</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="nav-link supertitulo" id="baja" href="#" onclick="buscarUsuario()">Editar Mis Datos</a>
              </li>
              <li><a class="nav-link supertitulo" id="baja" href="<?php echo base_url('/logout'); ?>" tabindex="-1" aria-disabled="true">Cerrar Sesión</a></li>
            </ul>
          </li>
          <!-- fin config -->
          <li><a class="nav-link supertitulo disable" tabindex="-1" aria-disabled="true">Ver Compras</a></li>
        </ul>
        <form class="d-flex separacion" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
      <!-- [FIN] Navbar personalizado para: admin-->
      <!-- [INICIO] Navbar personalizado para: cliente-->
    <?php elseif (session()->perfil_id == 2) : ?>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item separacion">
            <a class="nav-link supertitulo fondo_gris" id="sesion" aria-current="page">CLIENTE: <?php echo session('usuario'); ?></a>
          </li>
          <li class="nav-item separacion">
            <!-- llamo a supertitulo para la fuente-->
            <a class="nav-link supertitulo" aria-current="page" href="<?php echo base_url('principal'); ?>">Inicio</a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('quienes_somos'); ?>">Quienes Somos</a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('acerca_de'); ?>">Acerca de</a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('catalogo'); ?>">Catálogo</a>
          </li>
          <li class="nav-item dropdown supertitulo separacion">
            <a class="nav-link dropdown-toggle supertitulo" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Productos
            </a>
            <ul class="dropdown-menu fondo_gris" aria-labelledby="navbarDropdown">
              <!-- Uso nav-link en vez de dropdown-item para manejar los semi clicks del usuario que corrompen el :hoover de mi css-->
              <li><a class="nav-link supertitulo" href="<?php echo base_url('catalogo'); ?>">Plantas</a></li>
              <li><a class="nav-link supertitulo" href="<?php echo base_url('catalogo'); ?>">Masetas</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
            </ul>
          </li>
          <!-- inicio config -->
          <li class="nav-item dropdown supertitulo separacion">
            <a class="nav-link dropdown-toggle supertitulo" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-cog fa-xl" style="color: C52C3B;"></i>
              Ajustes
            </a>
            <ul class="dropdown-menu fondo_gris" aria-labelledby="navbarDropdown">
              <!-- Uso nav-link en vez de dropdown-item para manejar los semi clicks del usuario que corrompen el :hoover de mi css-->
              <li>
                <a class="nav-link supertitulo" href="#" onclick="buscarUsuario()">Editar Mis Datos</a>
              </li>
              <li><a class="nav-link supertitulo" id="baja" href="<?php echo base_url('/darme_de_baja'); ?>">Darme de Baja</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="nav-link supertitulo" href="<?php echo base_url('/logout'); ?>" tabindex="-1" aria-disabled="true">Cerrar Sesión</a></li>
            </ul>
          </li>
          <!-- fin config -->
          <li><a class="nav-link supertitulo disable" tabindex="-1" aria-disabled="true">Mis Compras</a></li>
        </ul>
        <form class="d-flex separacion" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
          <!-- [FIN] Navbar personalizado para: cliente-->
      <!-- [INICIO] Navbar sin login: visitante-->
    <?php else : ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item separacion">
            <!-- llamo a supertitulo para la fuente-->
            <a class="nav-link supertitulo" aria-current="page" href="<?php echo base_url('principal'); ?>">Inicio</a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('quienes_somos'); ?>">Quienes Somos</a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('acerca_de'); ?>">Acerca de</a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('catalogo'); ?>">Catálogo</a>
          </li>
          <li class="nav-item dropdown supertitulo separacion">
            <a class="nav-link dropdown-toggle supertitulo" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Productos
            </a>
            <ul class="dropdown-menu fondo_gris" aria-labelledby="navbarDropdown">
              <!-- Uso nav-link en vez de dropdown-item para manejar los semi clicks del usuario que corrompen el :hoover de mi css-->
              <li><a class="nav-link supertitulo" href="<?php echo base_url('catalogo'); ?>">Plantas</a></li>
              <li><a class="nav-link supertitulo" href="<?php echo base_url('catalogo'); ?>">Masetas</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
            </ul>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('registro'); ?>">Registrarse</a>
          </li>
          <li class="nav-item separacion">
            <a class="nav-link supertitulo" href="<?php echo base_url('/login'); ?>">Iniciar Sesión</a>
          </li>
        </ul>
        <form class="d-flex separacion" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
      <!-- [FIN] Navbar sin login-->
    <?php endif; ?>
    <!-- fin navbar personalizado -->
          <!-- INICIO funcion editar mis datos -->
          <script>
        function buscarUsuario() {
          var dni = <?= $dni ?>;
          var form = document.createElement('form');
          form.action = '<?php echo base_url('/buscar_usuario'); ?>';
          form.method = 'post';
          var input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'dni';
          input.value = dni;
          form.appendChild(input);
          document.body.appendChild(form);
          form.submit();
        }
      </script>
      <!-- FIN funcion editar mis datos -->
  </nav>
</div>
<!-- fin barra de navegacion -->
</header>
<!-- fin encabezado -->

<body>
  <!-- inicio de cuerpo-->