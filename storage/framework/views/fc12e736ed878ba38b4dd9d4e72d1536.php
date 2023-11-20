

<?php $__env->startSection('title', 'Halaman Lapotan'); ?>

<?php $__env->startSection('header', 'Laporan Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    Cari Berdasarkan Tanggal
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('laporan.getLaporan')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" name="from" class="form-control" placeholder="Tanggal Awal" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="to" class="form-control" placeholder="Tanggal Akhir" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                        </div>
                        <button type="submit" class="btn btn-purple" style="width: 100%">Cari Laporan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header">
                    Data Berdasakan Tanggal
                    <div class="float-right">
                        <?php if($pengaduan ?? ''): ?>
                            <a href="<?php echo e(route('laporan.cetakLaporan', [$from, $to])); ?>" class="btn btn-danger">EXPORT PDF</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php if($pengaduan ?? ''): ?>
                        <table class="table">
                            <thead>
                                <tr>                                    
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Isi_Laporan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($k + 1); ?></td>
                                        <td><?php echo e($v->tgl_pengaduan); ?></td>
                                        <td><?php echo e($v->isi_laporan); ?></td>
                                        <td>
                                            <?php if($v->status == '0'): ?>
                                            <a href="#" class="badge badge-danger">Pending</a>
                                            <?php elseif($v->status == 'proses'): ?>
                                            <a href="#" class="badge badge-warning text-white">Proses</a>
                                            <?php else: ?>
                                            <a href="#" class="badge badge-success">Selesai</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                    <div class="text-center">
                        Tidak Ada Data
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan_masyarakat\resources\views/Admin/Laporan/index.blade.php ENDPATH**/ ?>