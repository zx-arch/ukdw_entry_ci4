<?php if(in_groups('user')) : ?>
<?php $this->extend('layouts/template') ?>
<?php $this->section('container') ?>
        <?php include APPPATH . 'Views/layouts/navbaruser.php'; ?>
        <div class="p-1 my-container active-cont">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom"
            >
                <h1 class="h2 p-3">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button
                            type="button"
                            class="btn btn-sm btn-outline-secondary"
                            >
                            Export
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <div
                    id="w0-container"
                    class="table-responsive kv-grid-container"
                >
            <table
                class="table text-nowrap table-striped table-bordered mb-0 kv-grid-table kv-table-wrap"
            >
                <thead>
                    <tr>
                        <th style="width: 6.95%">NO</th>
                        <th style="width: 6%">ID Entry</th>
                        <th data-col-seq="1" style="width: 15.11%">
                            Username
                        </th>
                        <th data-col-seq="2" style="width: 10%">
                            Tanggal
                        </th>
                        <th data-col-seq="1" style="width: 10.11%">
                            Ruangan
                        </th>
                        <th data-col-seq="5" style="width: 10.81%">
                            Jam Masuk
                        </th>
                        <th data-col-seq="5" style="width: 10.81%">
                            Jam Keluar
                        </th>
                    </tr>

                    <td>
                        <input
                            type="text"
                            class="form-control"
                            name="no"
                        />
                    </td>
                    <td>
                        <input
                            type="text"
                            class="form-control"
                            name="id"
                        />
                    </td>
                    <td>
                        <input
                            type="text"
                            class="form-control"
                            name="username"
                        />
                    </td>
                    <td>
                        <input
                            type="date"
                            id="datepick"
                            class="form-control"
                            name="tanggal"
                        />
                    </td>
                    <td>
                        <input
                            type="text"
                            class="form-control"
                            name="ruangan"
                        />
                    </td>
                    <td>
                        <input
                            type="time"
                            class="form-control"
                            name="jam_masuk"
                        />
                    </td><td>
                        <input
                            type="time"
                            class="form-control"
                            name="jam_keluar"
                        />
                    </td>
                </thead>

                <tbody>
                    <tr class="w0" data-key="260481">
                        <td>1</td>
                        <td>UKDWAAI0001</td>
                        <td class="w0" data-col-seq="1">
                            ditopamungkas
                        </td>
                        <td class="w0" data-col-seq="2">
                            08-10-2022
                        </td>
                        <td class="w0" data-col-seq="1">
                            Lab AI
                        </td>
                        <td class="w0" data-col-seq="4">08:00 WIB</td>
                        <td class="w0" data-col-seq="4">15:00 WIB</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
<?php endif; ?>