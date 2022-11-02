<?php $this->extend('layouts/template') ?>
<?php $this->section('container') ?>

<?php include APPPATH . 'Views/layouts/navbaradmin.php'; ?>
<div class="p-1 active-cont" style="overflow: hidden;">
    <div class="text-center">
        <h2 class="h4 text-gray-900 mb-4">Create User Login</h2>
    </div>
    <?= view('\Myth\Auth\Views\_message_block') ?>
    <form action="<?= base_url(); ?>/admin/tambah_user/staff" class="user" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
        <div class="form-group row">
            <div class="col-sm-12 mb-3">
                <input type="email" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3">
                <input type="text" class="form-control form-control-user <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" name="password" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
            </div>
            <div class="col-sm-6">
                <input type="password" name="pass_confirm" class="form-control form-control-user <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
            </div>
        </div>
        <br>
        <h2 class="h4 text-gray-900 text-center">Create Profil User</h2>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <input type="text" name="nama" class="form-control form-control-user" placeholder="Masukkan Nama" value="<?= old('nama') ?>" required>
            </div>
        <div class="col-sm-2 mb-3">
            <input type="text" name="nip" class="form-control form-control-user" placeholder="Masukkan NIP" value="<?= old('nip') ?>">
        </div>
        <div class="col-sm-2 mb-3">
            <input type="text" name="nik" class="form-control form-control-user" placeholder="Masukkan NIK" value="<?= old('nik') ?>">
        </div>
        <div class="col-sm-2 mb-3">
            <input type="text" name="no_hp" class="form-control form-control-user" placeholder="Masukkan No HP" value="<?= old('no_hp') ?>">
        </div>
        <div class="col-sm-8 mb-3">
            <input type="textarea" required name="alamat" class="form-control form-control-user" placeholder="Masukkan Alamat" value="<?= old('alamat') ?>">
        </div>
        
        <input type="hidden" name="tipe_user" value="Staff">
        <input type="hidden" name="idCardUser"value="staff-">
    </div>
    <div class="col-sm-5 mb-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="ALFTI3" id="flexCheckChecked" required name="room_access" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Lab FTI 3
            </label>
        </div>
    </div>
    <div>
        <input type="file" class="form-control" name="gambar" id="gambar" aria-label="file example" required>
        <div class="invalid-feedback">Example invalid form file feedback</div>
    </div>
    <br>
    <button type="submit" class="btn btn-md btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection(); ?>