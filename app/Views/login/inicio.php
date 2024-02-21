<?= $this->extend('layouts/layout') ?>

<?= $this->section('contenido') ?>
<div class="col-xxl-5 col-lg-5 col-md-8 col-ms-12 pt-5 mx-auto">
    <div class="card text-white bg-info">
        <div class="card-header text-center">
        <h3>Bienvenido, <?php echo session()->get('usuario')['nombre'] ?></h3>
        </div>
        <div class="card-body text-center">
        <p>Te encuentras dentro de tu perfil, pero esta en mantenimiento, por el momento solo puedes
            confirmar que tienes un usuario activo y tu sesion iniciada
        </p>
        </div>
    </div>
    <div>
        <a href="<?= base_url('cerrarSesion') ?>" class='btn btn-danger'>Cerrar sesión</a>
    </div>
    <?= $this->endSection() ?>