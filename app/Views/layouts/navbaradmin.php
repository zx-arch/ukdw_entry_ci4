<?php if(in_groups('admin')) : ?>
<div
    class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column"
    id="sidebar"
>
    <ul class="nav flex-column text-white">
        <a href="<?= base_url(); ?>/admin/dashboard/mahasiswa" class="nav-link h4 text-white my-2"> Entry UKDW </a>
        <a href="<?= base_url(); ?>/admin/dashboard/mahasiswa" class="nav-link">
            <i class="bx bxs-dashboard"></i>
            <span class="mx-2">Dashboard</span>
        </a>
        <a href="<?= base_url(); ?>/admin/users/mahasiswa" class="nav-link">
            <i class='bx bxs-user-circle'></i>
            <span class="mx-2">Users</span>
        </a>
        <a href="<?= base_url(); ?>/admin/cards" class="nav-link">
            <i class="fa-solid fa-address-card"></i>
            <span class="mx-2">Cards</span>
        </a>
        <a href="<?= base_url(); ?>/admin/rooms" class="nav-link">
            <i class='bx bxs-school'></i>
            <span class="mx-2">Rooms</span>
        </a>
        <a href="<?= base_url(); ?>/admin/komplain" class="nav-link">
            <i class="bx bx-conversation"></i>
            <span class="mx-2">Komplain</span>
        </a>
        <br>
        <a href="<?= base_url(); ?>/logout" class="nav-link">
            <i class='bx bxs-user'></i>
            <span class="mx-2">Logout</span>
        </a>

    </ul>
    <span class="nav-link h4 w-100 mb-5">
        <a href="https://www.instagram.com/ukdwyogyakarta/"><i class="bx bxl-instagram-alt text-white"></i></a>
        <a href="https://twitter.com/ukdwyogyakarta"><i class='bx bxl-twitter' ></i></a>
        <a href="https://www.facebook.com/ukdwyogyakarta/"><i class="bx bxl-facebook text-white"></i></a>
    </span>
</div>
<?php endif; ?>