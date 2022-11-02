<?php if(in_groups('admin')) : ?>
<?php $this->extend('layouts/template') ?>
<?php $this->section('container') ?>
    <?php include APPPATH . 'Views/layouts/navbaradmin.php'; ?>
    <div class="p-1 my-container active-cont">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom"
        >
            <h1 class="h2 p-3">Komplain</h1>
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
        <div class="col-2 mb-2">
            <select class="form-select" aria-label="Cari select">
                <option selected>Urutkan Berdasarkan</option>
                <option value="1">Komplain Baru</a></option>
                <option value="2">Komplain Dikonfirmasi</a></option>
                <option value="3">Komplain Selesai</a></option>
                <option value="4">Komplain Dihapus</a></option>
                <option value="5">Komplain Tanggal Terbaru</a></option>
                <option value="6">Komplain Tanggal Terlama</a></option>
            </select>
        </div>
        <!-- <div class="dropdown mb-2 col d-flex justify-content-end align-items-end">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cari Berdasarkan
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">Komplain Baru</a></li>
                <li><a class="dropdown-item" href="#">Komplain Dikonfirmasi</a></li>
                <li><a class="dropdown-item" href="#">Komplain Selesai</a></li>
                <li><a class="dropdown-item" href="#">Komplain Dihapus</a></li>
                <li><a class="dropdown-item" href="#">Komplain Tanggal Terbaru</a></li>
                <li><a class="dropdown-item" href="#">Komplain Tanggal Terlama</a></li>
            </ul>
        </div> -->
        <div class="alert alert-primary mb-3" role="alert">
            <p style="float:right;text-align:right;">10/10/2022 09:00 WIB</p>
            <p>Pengirim : Ardi Yusuf</p>
            <p>Lokasi : Lab Big Data</p>
            <p>Pesan : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            <button type="button" class="btn btn-warning">Konfirmasi</button>
            <button type="button" class="btn btn-success">Selesai</button>
            <button type="button" class="btn btn-danger">Delete</button>
            <p style="float:right;text-align:right;">New</p>
        </div>
        <div class="alert alert-warning mb-3" role="alert">
            <p style="float:right;text-align:right;">10/10/2022 12:00 WIB</p>
            <p>Pengirim : Dito Setiawan</p>
            <p>Lokasi : Lab AI</p>
            <p style="white-space: pre-line;">Pesan : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            <button type="button" class="btn btn-warning disabled">Konfirmasi</button>
            <button type="button" class="btn btn-success">Selesai</button>
            <button type="button" class="btn btn-danger">Delete</button>
            <p style="float:right;text-align:right;">Confirmed</p>
        </div>
        <div class="alert alert-success mb-3" role="alert">
            <p style="float:right;text-align:right;">11/10/2022 11:00 WIB</p>
            <p>Pengirim : Tono Ardiawan</p>
            <p>Lokasi : Lab AI</p>
            <p>Pesan : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            <button type="button" class="btn btn-warning disabled">Konfirmasi</button>
            <button type="button" class="btn btn-success disabled">Selesai</button>
            <button type="button" class="btn btn-danger">Delete</button>
            <p style="float:right;text-align:right;">Done</p>
        </div>
        <div class="alert alert-danger mb-3" role="alert">
            <p style="float:right;text-align:right;">12/10/2022 14:00 WIB</p>
            <p>Pengirim : Jonathan Ardi Setiawan</p>
            <p>Lokasi : Lab A</p>
            <p>Pesan : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            <button type="button" class="btn btn-warning disabled">Konfirmasi</button>
            <button type="button" class="btn btn-success disabled">Selesai</button>
            <button type="button" class="btn btn-danger disabled">Delete</button>
            <p style="float:right;text-align:right;">Deleted</p>
        </div>
    </div>
<?php $this->endSection() ?>
<?php endif; ?>