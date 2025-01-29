
<!DOCTYPE html>
<html>

<head>
    <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="title"><strong>Edit Kamar</strong></div>
                        <div class="block-body">
                            <form action="<?php echo e(url('edit_kamar', $data->id)); ?>" method="Post" enctype="multipart/form-data"
                                class="form-horizontal">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Nama Kamar</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="kamar" value="<?php echo e($data->nama_kamar); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="desk" id="exampleFormControlTextarea1" rows="3"><?php echo e($data ->deskripsi); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="harga" value="<?php echo e($data->harga); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Type Kamar</label>
                                    <div class="col-sm-9">
                                        <select name="type" class="form-control mb-3 mb-3">
                                            <option value="<?php echo e($data->type_kamar); ?>"><?php echo e($data->type_kamar); ?></option>
                                            <option value="reguler">Reguler</option>
                                            <option value="superior">Superior</option>
                                            <option value="deluxe">Deluxe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Wifi</label>
                                    <div class="col-sm-9">
                                        <select name="wifi" class="form-control mb-3 mb-3">
                                            <option  value="<?php echo e($data->wifi); ?>"><?php echo e($data->wifi); ?></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Gambar Sebelumnya</label>
                                    <div class="col-sm-9">
                                        <img width="100" src="/room/<?php echo e($data->gambar); ?>" alt="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Upload Gambar</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-9 ml-auto">
                                        <button  type="submit" value="" class="btn btn-primary">Update Kamar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\hotel\resources\views/admin/update_kamar.blade.php ENDPATH**/ ?>