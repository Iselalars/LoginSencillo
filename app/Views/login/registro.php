<?= $this->extend('layouts/layout') ?>

<?= $this->section('contenido') ?>
<div class="col-xxl-5 col-lg-5 col-md-8 col-ms-12 pt-5 mx-auto">
    <div class="card text-white bg-info">
        <div class="card-header text-center">
            <h2>Registra tus datos</h2>
        </div>
        <div class="card-body">
        <?= form_open(base_url('registrar')); ?>
                <div class="mb-3">
                    <?= form_label('Nombre:'); ?>
                    <?= form_input(['type' => 'text', 'class' => ' form-control', 'id' => 'nombre', 'name' => 'nombre','required' => 'required']); ?>
                </div>
                <div class="mb-3">
                    <?= form_label('Correo electronico:'); ?>
                    <?= form_input(['type' => 'email', 'class' => ' form-control', 'id' => 'correo', 'name' => 'correo','required' => 'required']); ?>
                </div>
                <div class="mb-3">
                    <?= form_label('Contraseña:'); ?>
                    <?= form_input(['type' => 'password','class' => ' form-control', 'id' => 'clave', 'name' => 'clave','required' => 'required']); ?>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark">Registrate</button>
                </div>
                <?= form_close(); ?>
                <?= session()->getFlashdata('error') ?>
            <div>
                <a href="<?= base_url('/') ?>" class="btn btn-dark">Regresar</a>
            </div>
            <?= validation_list_errors() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>