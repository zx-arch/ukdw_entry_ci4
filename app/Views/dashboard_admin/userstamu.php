<?php $this->extend('layouts/template') ?>
<?php $this->section('container') ?>
        <?php include APPPATH . 'Views/layouts/navbaradmin.php'; ?>
        <div class="p-1 active-cont">
            <h1 class="h2 p-1"><?= $title; ?></h1>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom" style="overflow: hidden;"
            >
                <div class="row">
                    <div class="col-xl-3 col-lg-6 mb-">
                        <div class="card card-stats mb-2 mb-xl-0 bg-success">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title"><?= $semuauser; ?></h5>
                                        <p class="card-text">Total Semua User</p>
                                        </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-2 mb-xl-0 bg-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title"><?= $semuausertamu; ?></h5>
                                        <p class="card-text">Total Semua Tamu</p>
                                        </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-2 mb-xl-0 bg-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title"><?= $semuausertamudeleted; ?></h5>
                                        <p class="card-text">Total Tamu Deleted</p>
                                        </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 mb-2">
                        <div class="card card-stats mb-2 mb-xl-0 bg-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title"><?= $semuausertamuaktif; ?></h5>
                                        <p class="card-text">Total Tamu Active</p>
                                        </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6" onClick="location.href='/admin/users/mahasiswa'">
                        <div class="card bg-primary text-white mb-2">
                            <div class="card-body">User Mahasiswa</div>
                            
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/admin/users/mahasiswa">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6" onClick="location.href='/admin/users/dosen'">
                            <div class="card bg-warning text-white mb-2">
                                <div class="card-body">User Dosen</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/admin/users/dosen">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6" onClick="location.href='/admin/users/staff'">
                            <div class="card bg-success text-white mb-2">
                                <div class="card-body">User Staff</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/admin/users/staff">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 mb-2" onClick="location.href='/admin/users/tamu'">
                            <div class="card bg-danger text-white">
                                <div class="card-body">User Tamu</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/admin/users/tamu">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(session()->getFlashdata('uploadfotosukses')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('uploadfotosukses'); ?>
                    </div>
                <?php endif; ?>
                <div class="btn-toolbar mb-md-0">
                    <div class="btn-group me-2">
                        <button type="submit" class="btn btn-primary mb-2" onclick="location.href=`/admin/tambah_user/tamu`;">
                            <i class="fa-solid fa-user-plus"></i> Tambah Tamu
                        </button>
                    </div>
                    <div class="btn-group me-2 mb-2">
                        <button
                            type="button"
                            class="btn btn-sm btn-outline-secondary"
                            >
                            Export
                        </button>
                        <button type="button" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Upload Foto</button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Foto Profil User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/admin/users/upload_foto/tamu" enctype="multipart/form-data" id="form1" method="post">
                                        <div class="modal-body">
                                                <?= csrf_field() ?>
                                                <div class="mb-3">
                                                    <label for="exampleDataList" class="form-label">Enter Username / NIK / Email</label>
                                                    <input class="form-control" list="datalistOptions" name="user" placeholder="Type to search...">
                                                    <datalist id="datalistOptions">
                                                    <?php $i=0; ?>
                                                        <?php foreach ($data_users as $dt) : ?>
                                                            <?php $i++; ?>
                                                            <?php if($i > 5) : ?>
                                                                <?php break; ?>
                                                            <?php endif; ?>
                                                            <option value="<?= $dt['username']; ?> / <?= $dt['nik']; ?> / <?= $dt['email']; ?>">
                                                                <?= $dt['username']; ?> / <?= $dt['nik']; ?> / <?= $dt['email']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </datalist>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar" name="gambar" id="gambar" class="form-label">Upload Foto</label>
                                                    <input class="form-control" name="gambar" type="file" id="gambar">
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Send message</button>
                                            <input type="submit" style="display:none;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
                
                <form action="/admin/users/tamu" id="form1" method="post">
                <?= csrf_field() ?>
                <input
                        type="month"
                        class="form-control w-25 mb-2"
                        name="bulan"
                        value="<?= $inputbulan; ?>"
                        onchange='this.form.submit()'
                />
                </form>

                <?php if(session()->getFlashdata('actived')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('actived'); ?>
                    </div>
                <?php elseif(session()->getFlashdata('deleted')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('deleted'); ?>
                    </div>
                <?php elseif(session()->getFlashdata('edited')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('edited'); ?>
                    </div>
                <?php elseif(session()->getFlashdata('adduser')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('adduser'); ?>
                    </div>
                <?php elseif(session()->getFlashdata('invalid_passwd')) : ?>
                    <div class="alert alert-warning" role="alert">
                        <?= session()->getFlashdata('invalid_passwd'); ?>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <div
                        id="w0-container"
                        class="table-responsive kv-grid-container"
                    >
                    
                        <table class="table text-nowrap table-striped table-bordered mb-0 kv-grid-table kv-table-wrap" style="width: 130%" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 4.95%">NO</th>
                                    <th data-col-seq="1" style="width: 10.11%">
                                        NIK
                                    </th>
                                    <th data-col-seq="1" style="width: 15.11%">
                                        Username
                                    </th>
                                    <th data-col-seq="1" style="width: 15.11%">
                                        Nama
                                    </th>
                                    <th data-col-seq="1" style="width: 15.11%">
                                        Email
                                    </th>
                                    <th data-col-seq="2" style="width: 10.46%">
                                        Tanggal Dibuat
                                    </th>
                                    <th data-col-seq="5" style="width: 10.13%">
                                        Status User
                                    </th>
                                    <th data-col-seq="6" style="width: 10.46%">
                                        Last Login
                                    </th>
                                    <th data-col-seq="6" style="width: 10.46%">
                                        Last Update
                                    </th>
                                    <th data-col-seq="7" style="width: 11%">
                                        Action
                                    </th>
                                </tr>

                                <td>
                                </td>
                                <form action="/admin/users/tamu" id="form1" method="post">
                                <?= csrf_field() ?>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nik"
                                        value="<?= $inputnik; ?>"
                                        pattern=".{5,}" title="Cari NIK Minimal 5 Karakter"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="username"
                                        value="<?= $inputusername; ?>"
                                        pattern=".{3,}" title="Cari Username Minimal 3 Karakter"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nama"
                                        value="<?= $inputnama; ?>"
                                        pattern=".{3,}" title="Cari Nama Minimal 3 Karakter"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="email"
                                        value="<?= $inputemail; ?>"
                                        pattern=".{3,}" title="Cari Username Minimal 3 Karakter"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="date"
                                        id="datepick"
                                        class="form-control"
                                        name="tanggaldibuat"
                                        value="<?= $inputtanggaldibuat; ?>"
                                        onchange='this.form.submit()'
                                    />
                                </td>
                                <td>
                                    <select class="form-control" name="status" onchange='this.form.submit()'>
                                        <option selected value="" disabled selected><?= $inputstatus; ?></option>
                                        <option value="Active">Active</option>
                                        <option value="Deleted">Deleted</option>
                                    </select>
                                </td>
                                <td>
                                    <input
                                        type="date"
                                        id="datepick"
                                        class="form-control"
                                        name="last_login"
                                        value="<?= $inputlast_login; ?>"
                                        onchange='this.form.submit()'
                                    />
                                </td>
                                <td>
                                    <input
                                        type="date"
                                        id="datepick"
                                        class="form-control"
                                        name="updated_at"
                                        value="<?= $inputupdated_at; ?>"
                                        onchange='this.form.submit()'
                                    />
                                </td>
                                <input type="submit" style="display:none;">
                                </form>
                            </thead>

                            <tbody>
                                <?php $i=0; ?>
                                <?php foreach($data_users as $dt) : ?>
                                <?php $i++; ?>
                                <tr class="w0" data-key="260481">
                                    <td><?= $i; ?></td>
                                    <td class="w0" data-col-seq="1">
                                        <?= str_replace($inputnik,'<span style="color: red;">' . $inputnik . '</span>',$dt['nik']); ?>
                                    </td>
                                    <td class="w0" data-col-seq="1">
                                        <?= str_replace($inputusername,'<span style="color: red;">' . $inputusername . '</span>',$dt['username']); ?>
                                    </td>
                                    <td class="w0" data-col-seq="1">
                                        <?php if($inputnama == null) : ?>
                                            <?= $dt['nama']; ?>
                                        <?php else : ?>
                                            <?= str_replace(mb_substr($dt['nama'], stripos($dt['nama'],$inputnama), strlen($inputnama)),'<span style="color: red;">' . mb_substr($dt['nama'], stripos($dt['nama'],$inputnama), strlen($inputnama)) . '</span>',$dt['nama']); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="w0" data-col-seq="1">
                                        <?= str_replace($inputemail,'<span style="color: red;">' . $inputemail . '</span>',$dt['email']); ?>
                                    </td>
                                    <td class="w0" data-col-seq="2">
                                        <?= str_replace($inputtanggaldibuat,'<span style="color: red;">' . $inputtanggaldibuat . '</span>',$dt['created_at']); ?>
                                    </td>
                                    <?php if($dt['active'] == 1) : ?>
                                        <td class="w0" data-col-seq="6"><?= str_replace($inputstatus,'<span style="color: red;">' . $inputstatus . '</span>','Active'); ?></td>
                                    <?php else : ?>
                                        <td class="w0" data-col-seq="6"><?= str_replace($inputstatus,'<span style="color: red;">' . $inputstatus . '</span>','Deleted'); ?></td>
                                    <?php endif; ?>
                                    <td class="w0" data-col-seq="7" style="">
                                        <?php if($dt['last_login'] !== '0000-00-00 00:00:00') : ?>
                                            <?= $dt['last_login']; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="w0" data-col-seq="7" style="">
                                        <?= str_replace($inputupdated_at,'<span style="color: red;">' . $inputupdated_at . '</span>',$dt['updated_at']); ?>
                                    </td>
                                    <?php if($dt['active'] == 1) : ?>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal<?= $dt['nim']; ?>"
                                        >
                                        <i class='bx bx-detail'></i>
                                        </button>
                                        <div class="modal fade" id="exampleModal<?= $dt['nim']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="/admin/users/edit/tamu" method="post" enctype="multipart/form-data" id="dtform">
                                                    <?= csrf_field() ?>
                                                    
                                                        <input type="hidden" name="idUser" value="<?= $dt['idUser']; ?>">
                                                        <input type="hidden" name="id" value="<?= $dt['id']; ?>">
                                                        <input type="hidden" name="created_at" value="<?= $dt['created_at']; ?>">
                                                        <input type="hidden" name="last_login" value="<?= $dt['last_login']; ?>">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data <?= $dt['username']; ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div class="text-center mb-2">
                                                                    <img src="/img/<?= $dt['foto_profil']; ?>" class="rounded-1 h-25 w-25" alt="...">
                                                                </div>
                                                                <div class="input-group flex-nowrap mb-2">
                                                                    <span class="input-group-text" id="addon-wrapping">NIM</span>
                                                                    <input type="text" class="form-control"
                                                                    name="nim"
                                                                    value="<?= $dt['nim']; ?>"
                                                                    aria-label="NIM" aria-describedby="addon-wrapping">
                                                                </div>
                                                                <div class="input-group flex-nowrap mb-2">
                                                                    <span class="input-group-text" id="addon-wrapping">Username</span>
                                                                    <input type="text" class="form-control"
                                                                    value="<?= $dt['username']; ?>"
                                                                    aria-label="Username"
                                                                    name="username" 
                                                                    aria-describedby="addon-wrapping">
                                                                </div>
                                                                <div class="input-group flex-nowrap mb-2">
                                                                    <span class="input-group-text" id="addon-wrapping">Email</span>
                                                                    <input type="text" class="form-control"
                                                                    value="<?= $dt['email']; ?>"
                                                                    aria-label="Email"
                                                                    name="email"
                                                                    aria-describedby="addon-wrapping">
                                                                </div>
                                                                <div class="input-group flex-nowrap mb-2">
                                                                    <span class="input-group-text" id="addon-wrapping">Nama</span>
                                                                    <input type="textarea" class="form-control"
                                                                    value="<?= $dt['nama']; ?>"
                                                                    name="nama"
                                                                    aria-label="Nama" aria-describedby="addon-wrapping">
                                                                </div>
                                                                
                                                                <div class="input-group flex-nowrap mb-2">
                                                                    <span class="input-group-text" id="addon-wrapping">No HP</span>
                                                                    <input type="textarea" class="form-control"
                                                                    value="<?= $dt['no_hp']; ?>"
                                                                    name="no_hp"
                                                                    aria-label="no_hp" aria-describedby="addon-wrapping">
                                                                </div>
                                                                <div class="input-group flex-nowrap mb-2">
                                                                    <span class="input-group-text" id="addon-wrapping">Alamat</span>
                                                                    <input type="textarea" class="form-control"
                                                                    value="<?= $dt['alamat']; ?>"
                                                                    name="alamat"
                                                                    aria-label="Alamat" aria-describedby="addon-wrapping">
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                                        <input type="password" name="password" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                                                    </div>
                                                                    <div class="col-sm-6 mb-2">
                                                                        <input type="password" name="pass_confirm" class="form-control form-control-user <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group flex-nowrap mb-2">
                                                                <input class="form-check-input" type="checkbox" value="ALFTI3" id="flexCheckChecked" required name="room_access" checked>
                                                                <label class="form-check-label ml-2" for="flexCheckChecked">
                                                                    Lab FTI 3
                                                                </label>

                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" value="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        <input type="submit" style="display:none;">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            onclick="(function(){
                                                swal({
                                                    title: 'Yakin Ingin Menghapus Data',
                                                    icon: 'warning',
                                                    buttons: true,
                                                    dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                    if (willDelete) {
                                                        swal('Data Berhasil Dihapus', {
                                                        icon: 'success'
                                                    }).then(okay => {
                                                        if (okay) {
                                                            window.location.href = '/admin/users/delete/tamu/<?= $dt['username']; ?>';
                                                        }
                                                    });
                                                    } else {
                                                        swal('Data Batal Dihapus');
                                                    }
                                                });
                                            })();return false;"
                                        >
                                            <i class='bx bxs-trash'></i>
                                        </button>
                                    </td>
                                    <?php else : ?>
                                        <td>
                                            <button
                                                type="button"
                                                class="btn btn-success mx-auto"
                                                onclick="(function(){
                                                    swal({
                                                        title: 'Yakin Ingin Mengaktifkan Data',
                                                        icon: 'warning',
                                                        buttons: true,
                                                        dangerMode: true,
                                                        })
                                                        .then((willDelete) => {
                                                        if (willDelete) {
                                                            swal('Data Berhasil Diaktifkan', {
                                                            icon: 'success'
                                                        }).then(okay => {
                                                            if (okay) {
                                                                window.location.href = '/admin/users/active/tamu/<?= $dt['username']; ?>';
                                                            }
                                                        });
                                                        } else {
                                                            swal('Data Batal Diaktifkan');
                                                        }
                                                    });
                                                })();return false;"
                                            >
                                                <i class='bx bxs-user-check'></i>
                                            </button>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                </div>

            </div>
            

        </div>
        
    </div>
</div>

<?php $this->endSection() ?>
