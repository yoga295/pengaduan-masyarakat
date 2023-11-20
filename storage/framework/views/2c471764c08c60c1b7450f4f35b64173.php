

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/landing.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/laporan.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'PM - Pengaduan Masyarakat'); ?>

<?php $__env->startSection('content'); ?>

<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo e(route('pekat.index')); ?>">
                    <h4 class="semi-bold mb-0 text-white">PM</h4>
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

</section>

<div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
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
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
            <div class="content content-bottom shadow">
                <div>
                    <img src="<?php echo e(asset('images/user_default.svg')); ?>" alt="user profile" class="photo">
                    <div class="self-align">
                        <h5><a style="color: #B83B5E" href="#"><?php echo e(Auth::guard('masyarakat')->user()->nama); ?></a></h5>
                        <p class="text-dark"><?php echo e(Auth::guard('masyarakat')->user()->username); ?></p>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <p class="italic mb-0">Terverifikasi</p>
                            <div class="text-center">
                                <?php echo e($hitung[0]); ?>

                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Proses</p>
                            <div class="text-center">
                                <?php echo e($hitung[1]); ?>

                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Selesai</p>
                            <div class="text-center">
                                <?php echo e($hitung[2]); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8">
            <a class="d-inline tab <?php echo e($siapa != 'me' ? 'tab-active' : ''); ?> mr-4" href="<?php echo e(route('pekat.laporan')); ?>">
                Semua
            </a>
            <a class="d-inline tab <?php echo e($siapa == 'me' ? 'tab-active' : ''); ?>" href="<?php echo e(route('pekat.laporan', 'me')); ?>">
                Laporan Saya
            </a>
            <hr>
        </div>
        <?php $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-8">
            <div class="laporan-top">
                <img src="<?php echo e(asset('images/user_default.svg')); ?>" alt="profile" class="profile">
                <div class="d-flex justify-content-between">
                    <div>
                        <p><?php echo e($v->user->nama); ?></p>
                        <?php if($v->status == '0'): ?>
                        <p class="text-danger">Pending</p>
                        <?php elseif($v->status == 'proses'): ?>
                        <p class="text-warning"><?php echo e(ucwords($v->status)); ?></p>
                        <?php else: ?>
                        <p class="text-success"><?php echo e(ucwords($v->status)); ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <p><?php echo e($v->tgl_pengaduan->format('d M Y, h:i')); ?></p>
                    </div>
                </div>
            </div>
            <div class="laporan-mid">
                <div class="judul-laporan">
                    <?php echo e($v->judul_laporan); ?>

                </div>
                <p><?php echo e($v->isi_laporan); ?></p>
            </div>
            <div class="laporan-bottom">
                <?php if($v->foto != null): ?>
                <img src="<?php echo e(Storage::url($v->foto)); ?>" alt="<?php echo e('Gambar '.$v->judul_laporan); ?>" class="gambar-lampiran">
                <?php endif; ?>
                <?php if($v->tanggapan != null): ?>
                <p class="mt-3 mb-1"><?php echo e('*Tanggapan dari '. $v->tanggapan->petugas->nama_petugas); ?></p>
                <p class="light"><?php echo e($v->tanggapan->tanggapan); ?></p>
                <?php endif; ?>
            </div>
            <hr>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2021 Ihsanfrr • All rights reserved</p>
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
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan_masyarakat\resources\views/user/laporan.blade.php ENDPATH**/ ?>