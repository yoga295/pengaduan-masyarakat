

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/landing.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'PEKAT - Pengaduan Masyarakat'); ?>

<?php $__env->startSection('content'); ?>

<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h4 class="semi-bold mb-0 text-white">PEKAT</h4>
                    <p class="italic mt-0 text-white">Pengaduan Masyarakat</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php if(Auth::guard('masyarakat')->check()): ?>
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="<?php echo e(route('pekat.laporan')); ?>">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="<?php echo e(route('pekat.logout')); ?>"
                                style="text-decoration: underline"><?php echo e(Auth::guard('masyarakat')->user()->nama); ?></a>
                        </li>
                    </ul>
                    <?php else: ?>
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <button class="btn text-white" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#loginModal">Masuk</button>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('pekat.formRegister')); ?>" class="btn btn-outline-purple">Daftar</a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="text-center">
        <h2 class="medium text-white mt-3">Layanan Pengaduan Masyarakat</h2>
        <p class="italic text-white mb-5">Sampaikan laporan Anda langsung kepada yang pemerintah berwenang</p>
    </div>

    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>

<div class="row justify-content-center">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">

            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger"><?php echo e($error); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(Session::has('pengaduan')): ?>
                <div class="alert alert-<?php echo e(Session::get('type')); ?>"><?php echo e(Session::get('pengaduan')); ?></div>
            <?php endif; ?>

            <div class="card mb-3">Tulis Laporan Disini</div>
            <form action="<?php echo e(route('pekat.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4"><?php echo e(old('isi_laporan')); ?></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div>

<div class="pengaduan mt-5">
    <div class="bg-purple">
        <div class="text-center">
            <h5 class="medium text-white mt-3">JUMLAH LAPORAN SEKARANG</h5>
            <h2 class="medium text-white">10</h2>
        </div>
    </div>
</div>

<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2021 Ihsanfrr • All rights reserved</p>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="mt-3">Masuk terlebih dahulu</h3>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="<?php echo e(route('pekat.login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
                </form>
                <?php if(Session::has('pesan')): ?>
                <div class="alert alert-danger mt-2">
                    <?php echo e(Session::get('pesan')); ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php if(Session::has('pesan')): ?>
    <script>
        $('#loginModal').modal('show');

    </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan_masyarakat\resources\views/user/landing.blade.php ENDPATH**/ ?>