<?= $this->extend('layouts/layout') ?>

<?= $this->section('contenido') ?>
<main>
<div class="col-xxl-5 col-lg-5 col-md-8 col-ms-12 pt-5 mx-auto">
    <div class="card text-white bg-info">
        <div class="card-header text-center">
            <h2>Iniciar Sesión</h2>
        </div>
        <div class="card-body">
            <?= form_open(base_url('validar')); ?>
            <div class="mb-3">
                <?= form_label('Correo electronico'); ?>
                <?= form_input(['type' => 'email', 'class' => ' form-control', 'id' => 'correo', 'name' => 'correo', 'placeholder' => 'ejemplo@ejemplo.com', 'required' => 'required']); ?>
            </div>
            <div class="mb-3">
                <?= form_label('Contraseña'); ?>
                <?= form_input(['type' => 'password','class' => ' form-control', 'id' => 'clave', 'name' => 'clave', 'placeholder' => '********', 'required' => 'required']); ?>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-dark">Iniciar Sesión</button>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <?php echo session()->getFlashdata('error') ?>
                <?php echo session()->getFlashdata('success') ?>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <label class="form-label">Si no tienes usuario?</label>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="<?= base_url('/registro') ?>">Registrate</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</main>
<?= $this->endSection() ?>