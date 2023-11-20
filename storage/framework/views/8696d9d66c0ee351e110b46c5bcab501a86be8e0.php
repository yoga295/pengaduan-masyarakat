

<?php $__env->startSection('title', 'Form Tambah Petugas'); ?>

<?php $__env->startSection('css'); ?>

<style>
    .text-primary:hover{
        text-decoration: underline;
    }
    .text-grey{
        color: #6c757d;
    }

    .text-grey:hover{
        color: #6c757d;
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<a href="<?php echo e(route('petugas.index')); ?>" class="text-primary">Data Petugas</a>
<a href="#" class="text-grey">/</a>
<a href="#" class="text-grey">Form Tambah Petugas</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                Form Tambah Petugas
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('petugas.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <div class="input-group mt-3">
                            <select name="level" id="level" class="custom-select">
                                <option value="petugas" selected>Pilih Level (Default Petugas)</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" style="width: 100%">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan_masyarakat\resources\views/Admin/Petugas/create.blade.php ENDPATH**/ ?>