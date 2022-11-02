<?php $this->extend('layouts/template') ?>
<?php $this->section('container') ?>
        <?php include APPPATH . 'Views/layouts/navbaradmin.php'; ?>
        <div class="p-1 active-cont">
            <h1 class="h2 p-2"><?= $title; ?></h1>
            <div class="table-responsive p-2">
                
                <div class="btn-group me-2">
                    <button type="submit" class="btn btn-success mb-2 mr-2" onclick="location.href=`/admin/tambah_user`;">
                        <i class="fa-solid fa-user-plus"></i> Tambah Data
                    </button>
                    <form action="/admin/cards" id="form1" method="post">
                    <?= csrf_field() ?>
                    <input
                            type="month"
                            class="form-control w-25 mb-2"
                            name="bulan"
                            value="<?= $inputbulan; ?>"
                            onchange='this.form.submit()'
                    />
                    </form>
                </div>
                <div id="w0-container" class="table-responsive kv-grid-container">
                    <table class="table text-nowrap table-striped table-bordered mb-0 kv-grid-table kv-table-wrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 4.95%">NO</th>
                                    <th data-col-seq="1" style="width: 10.11%">
                                        ID Card
                                    </th>
                                    <th data-col-seq="1" style="width: 15.11%">
                                        ID User
                                    </th>
                                    <th data-col-seq="2" style="width: 10.46%">
                                        Tanggal Dibuat
                                    </th>
                                    <th data-col-seq="6" style="width: 10.46%">
                                        Last Update
                                    </th>
                                    <th data-col-seq="1" style="width: 15.11%">
                                        Status User
                                    </th>
                                    <th data-col-seq="7" style="width: 11%">
                                        Action
                                    </th>
                                </tr>

                                <td>
                                </td>
                                <form action="/admin/cards" id="form1" method="post">
                                <?= csrf_field() ?>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="idCard"
                                        value="<?= $inputidCard; ?>"
                                        pattern=".{3,}" title="Cari ID Card Minimal 3 Karakter"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="idUser"
                                        value="<?= $inputidUser; ?>"
                                        pattern=".{3,}" title="Cari ID User User Minimal 3 Karakter"
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
                                    <input
                                        type="date"
                                        id="datepick"
                                        class="form-control"
                                        name="updated_at"
                                        value="<?= $inputupdated_at; ?>"
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
                                        <?= str_replace($inputidCard,'<span style="color: red;">' . $inputidCard . '</span>',$dt['idCard']); ?>
                                    </td>
                                    <td>
                                        <?= str_replace($inputidUser,'<span style="color: red;">' . $inputidUser . '</span>',$dt['idCardUser']); ?>
                                    </td>
                                    <td class="w0" data-col-seq="1">
                                        <?= str_replace($inputtanggaldibuat,'<span style="color: red;">' . $inputtanggaldibuat . '</span>',$dt['created_at']); ?>
                                    </td>
                                    <td class="w0" data-col-seq="2">
                                        <?= str_replace($inputupdated_at,'<span style="color: red;">' . $inputupdated_at . '</span>',$dt['updated_at']); ?>
                                    </td>
                                    
                                    <?php if($dt['active'] == 1) : ?>
                                        <td class="w0" data-col-seq="6"><?= str_replace($inputstatus,'<span style="color: red;">' . $inputstatus . '</span>','Active'); ?></td>
                                    <?php else : ?>
                                        <td class="w0" data-col-seq="6"><?= str_replace($inputstatus,'<span style="color: red;">' . $inputstatus . '</span>','Deleted'); ?></td>
                                    <?php endif; ?>
                                    <td>
                                        <form action="/admin/users/<?= strtolower($dt['tipe_user']); ?>/<?= $dt['idCardUser']; ?>" class="d-inline" method="post">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                        <i class='bx bx-detail'></i>
                                        </button>
                                        </form>
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
                                            })();return false;"
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

<?php $this->endSection() ?>
