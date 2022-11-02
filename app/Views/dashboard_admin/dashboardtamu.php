<?php $this->extend('layouts/template') ?>
<?php $this->section('container') ?>
        <?php include APPPATH . 'Views/layouts/navbaradmin.php'; ?>
        <div class="p-1 active-cont">
            <h1 class="h2 p-1"><?= $title; ?></h1>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom" style="overflow: hidden;"
            >
                <div class="row">
                    <div class="col-xl-3 col-lg-6 mb-2">
                        <div class="card card-stats mb-2 mb-xl-0 bg-success">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title"><?= $semuatamuterdaftar; ?></h5>
                                        <p class="card-text">Total Semua User Tamu yang Ada Kartu</p>
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
                        <div class="card card-stats mb-2 mb-xl-0 bg-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title"><?= $semuatamukeluar; ?></h5>
                                        <p class="card-text">Total User Tamu yang Keluar Hari Ini</p>
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
                        <div class="card card-stats mb-2 mb-xl-0 bg-warning">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title"><?= $semuatamumasuk; ?></h5>
                                        <p class="card-text">Total User Mahasiswa yang Masuk Hari Ini</p>
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
                        <div class="card card-stats mb-2 mb-xl-0 bg-danger">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title"><?= $usertamubelumterdaftar; ?></h5>
                                        <p class="card-text">Total User Tamu yang Belum Ada Kartu</p>
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
                    <div class="col-xl-3 col-md-6" onClick="location.href='/admin/dashboard/mahasiswa'">
                            <div class="card bg-primary text-white mb-2">
                                <div class="card-body">Daftar Mahasiswa</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/admin/dashboard/mahasiswa">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6" onClick="location.href='/admin/dashboard/dosen'">
                                <div class="card bg-warning text-white mb-2">
                                    <div class="card-body">Daftar Dosen</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/admin/dashboard/dosen">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6" onClick="location.href='/admin/dashboard/staff'">
                                <div class="card bg-success text-white mb-2">
                                    <div class="card-body">Daftar Staff</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/admin/dashboard/staff">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6" onClick="location.href='/admin/dashboard/tamu'">
                                <div class="card bg-danger text-white mb-2">
                                    <div class="card-body">Daftar Tamu</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/admin/dashboard/tamu">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-toolbar mb-md-0">
                        <div class="btn-group me-2 mb-2">
                            <button
                                type="button"
                                class="btn btn-sm btn-outline-secondary"
                                >
                                Export
                            </button>
                        </div>
                    </div>
                    <form action="/admin/dashboard/tamu" id="form1" method="post">
                    <?= csrf_field() ?>
                    <input
                            type="month"
                            class="form-control w-25"
                            name="bulan"
                            value="<?= $inputbulan; ?>"
                            onchange='this.form.submit()'
                    />
                    </form>
                    <div class="table-responsive">
                        <div id="w0-container" class="table-responsive kv-grid-container">
                            <table class="table text-nowrap table-striped table-bordered mb-0 kv-grid-table kv-table-wrap" style="width: 140%">
                                <thead>
                                    <tr>
                                        <th style="width: 6.95%">NO</th>
                                        <th style="width: 10%">ID Card</th>
                                        <th data-col-seq="1" style="width: 10.11%">
                                            NIK
                                        </th>
                                        <th data-col-seq="1" style="width: 15.11%">
                                            Nama Lengkap
                                        </th>
                                        <th data-col-seq="1" style="width: 15.11%">
                                            Username
                                        </th>
                                        <th data-col-seq="2" style="width: 8%">
                                            Tanggal
                                        </th>
                                        <th data-col-seq="5" style="width: 10.81%">
                                            Ruangan
                                        </th>
                                        <th data-col-seq="5" style="width: 8.81%">
                                            Status Aktivitas
                                        </th>
                                        <th data-col-seq="5" style="width: 10.81%">
                                            Action
                                        </th>
                                    </tr>
                                    <form action="/admin/dashboard/tamu" method="post">
                                    <td>
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="id_card"
                                            value="<?= $inputidCard; ?>"
                                            pattern=".{3,}" title="Cari ID Card Minimal 3 Karakter"
                                            />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="nik"
                                            value="<?= $inputnik; ?>"
                                            pattern=".{3,}" title="Cari NIK Minimal 3 Karakter"/>
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
                                                name="username"
                                                value="<?= $inputusername; ?>"
                                                pattern=".{3,}" title="Cari Username Minimal 3 Karakter"
                                            />
                                        </td>
                                        <td>
                                            <input
                                                type="date"
                                                id="datepick"
                                                class="form-control"
                                                name="tanggal"
                                                value="<?= $inputtanggal; ?>"
                                                onchange='this.form.submit()'
                                            />
                                        </td>
                                        <td>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="ruangan"
                                                value="<?= $inputruangan; ?>"
                                                pattern=".{3,}" title="Cari Ruangan Minimal 3 Karakter"
                                            />
                                        </td>
                                        <td>
                                            <select class="form-control" name="status" onchange='this.form.submit()'>
                                                <option selected value="" disabled selected><?= $inputstatus_aktivitas; ?></option>
                                                <option value="Masuk">Masuk</option>
                                                <option value="Keluar">Keluar</option>
                                            </select>
                                        </td>
                                    <input type="submit" style="display:none;">
                                    </form>
                                </thead>

                                <tbody>
                                    <?php $i=0; ?>
                                    <?php foreach($datacardmasuk as $dt) : ?>
                                    <?php $i++; ?>
                                    <tr class="w0" data-key="260481">
                                        <td><?= $i; ?></td>
                                        <td class="w0" data-col-seq="1">
                                            <?= str_replace($inputidCard,'<span style="color: red;">' . $inputidCard . '</span>',$dt['idCard']); ?>
                                        </td>
                                        <td class="w0" data-col-seq="1">
                                            <?= str_replace($inputnik,'<span style="color: red;">' . $inputnik . '</span>',$dt['nik']); ?>
                                        </td>
                                        <td class="w0" data-col-seq="1">
                                            <?php if($inputnama == null) : ?>
                                                <?= $dt['nama']; ?>
                                            <?php else : ?>
                                                <?= str_replace(mb_substr($dt['nama'], stripos($dt['nama'],$inputnama), strlen($inputnama)),'<span style="color: red;">' . mb_substr($dt['nama'], stripos($dt['nama'],$inputnama), strlen($inputnama)) . '</span>',$dt['nama']); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="w0" data-col-seq="1">
                                            <?= str_replace($inputusername,'<span style="color: red;">' . $inputusername . '</span>',$dt['username']); ?>
                                        </td>
                                        <td class="w0" data-col-seq="2">
                                            <?= str_replace($data[0],'<span style="color: red;">' . $data[0] . '</span>',$dt['created_at']); ?>
                                        </td>
                                        <td class="w0" data-col-seq="4">
                                            <?= str_replace($inputruangan,'<span style="color: red;">' . $inputruangan . '</span>',$dt['entry']); ?>
                                        </td>
                                        <td class="w0" data-col-seq="4" style="white-space: pre-line;
                                        "><?= $dt['status_aktivitas']; ?></td>
                                        <td>
                                            <button
                                                type="button"
                                                class="btn btn-warning"
                                            >
                                                <i class='bx bxs-comment-edit'></i>
                                            </button>
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
                                                            swal('Poof! Your imaginary file has been deleted!', {
                                                            icon: 'success',
                                                        });
                                                        } else {
                                                            swal('Data Batal Dihapus');
                                                        }
                                                    });
                                                })();"
                                            >
                                                <i class='bx bxs-trash'></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
