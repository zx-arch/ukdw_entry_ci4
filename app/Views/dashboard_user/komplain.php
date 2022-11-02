<?php $this->extend('layouts/template') ?>
<?php $this->section('container') ?>
    <?php include APPPATH . 'Views/layouts/navbaruser.php'; ?>
    <div class="p-1 my-container active-cont">
            <h1 class="h2 p-3">Komplain</h1>
            <form class="row needs-validation" novalidate>
                <div class="mb-3 col-12">
                    <label for="text" class="form-label">Judul Komplain</label>

                    <input type="text" class="form-control" name="judul" autofocus required />
                    
                </div>

                <div class="mb-3 col-12">
                    <label for="DescriptionInput" class="form-label">Isi Komplain</label>

                    <textarea class="form-control" id="DescriptionInput" rows="3"></textarea>
                </div>

                <div class="mb-3 col-12">
                    <select class="form-select" aria-label="Superhero select">
                        <option selected>Pilih Ruangan</option>
                        <option value="1">Lab A</option>
                        <option value="2">Lab Big Data</option>
                        <option value="3">Lab AI</option>
                    </select>
                </div>
                
                <div class="col-12">
                    <button class="btn btn-danger" type="submit">Submit</button>
                </div>
            </form>
    </div>
<?php $this->endSection() ?>