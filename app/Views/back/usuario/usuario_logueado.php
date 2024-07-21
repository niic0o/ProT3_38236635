<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-5">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') . ' ' . session()->get('nombre') ?>
                </div>
            <?php endif; ?>
            <br><br>
            <?php if (session()->perfil_id == 1) : ?>
        </div>
        <div class="text-center mb-5">
            <img class="center d-block w-25 basic" src="<?php echo base_url('assets/img/admin.png'); ?>">
        </div>
        <div class="card mb-5">

            <div class="card-body panel">
                <h2 class="supertitulo text-center" id="login">Administración de Usuarios</h2>
                <div class="card-text text-center">
                    <a href="<?php echo base_url('/listado'); ?>">
                        <button class="btn btn-success btn-lg btn-comprar supertitulo focus">Ver Usuarios</button>
                    </a>
                    <a href="<?php echo base_url('/listado_de_eliminados'); ?>">
                        <button class="btn btn-success btn-lg btn-comprar supertitulo focus">Reestablecer Usuarios</button>
                    </a>
                    <a href="<?php echo base_url('/registro'); ?>">
                        <button class="btn btn-success btn-lg btn-comprar supertitulo focus">Registrar Usuarios</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php elseif (session()->perfil_id == 2) : ?>
    <div>
        <img class="center" height="100px" width="100px" src="<?php echo base_url('assets/img/cliente.png'); ?>">
    </div>
<?php endif; ?>
</div>
</div>
</div>