<!DOCTYPE html>
<html>
<?php echo $__env->make('home.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- our_room -->
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kamar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <div style="padding:20px" class="room_img">
                                    <img style="height:300px; width:800px" src="../room/<?php echo e($kamar->gambar); ?>"
                                        alt="" />
                                </div>
                            </div>
                            <div class="bed_room">
                                <h3><?php echo e($kamar->nama_kamar); ?></h3>
                                <p style="padding: 12px"><?php echo e(Str::limit($kamar->deskripsi, 75)); ?> </p>
                                <p style="padding: 12px">Free WIFI : <?php echo e($kamar->wifi); ?> </p>
                                <p style="padding: 12px">Type Kamar : <?php echo e($kamar->type_kamar); ?> </p>
                                <p style="padding: 12px">Harga : <?php echo e($kamar->harga); ?> </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h1 style="font-size: 40px!important;"> Booking Kamar</h1>
                        <div>
                            <?php if(session()->has('message')): ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-bs-dismiss="alert">x</button>
                                <?php echo e(session()->get('message')); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if($errors): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li style="color: red">
                                    <?php echo e($errors); ?>

                                </li>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <form action="<?php echo e(url('add_booking', $kamar->id)); ?>" method="get">
                            <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="floatingInput">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama" <?php if(Auth::id()): ?> value="<?php echo e(Auth::user()->name); ?>"<?php endif; ?>>
                        </div> 
                        <div class="mb-3">
                            <label for="floatingInput">Email</label>
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="floatingInput">No Telepon</label>
                            <input type="number" name="telpon" class="form-control" id="floatingInput" placeholder="Masukan Nomor Telp">
                        </div>
                        <div>
                            <label for="floatingInput">Check In</label>
                            <input type="date" name="startDate" class="form-control" id="startDate" >
                        </div>
                        <div>
                            <label for="floatingInput">Check out</label>
                            <input type="date" name="endDate" class="form-control" id="endDate" >
                        </div>
                        <div style="width: 200px, padding: 20px">
                            <input type="submit" class="btn btn-primary" value="Booking Kamar">
                        </div>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php echo $__env->make('home.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var yesr = dtToday.getFullYear();

        if ( month < 10 )
        month = '0' + month.string();
        if ( day < 10 )
        day = '0' day.tostring();

        var maxDate = year + '-' + month + '-' + day;
        
        $('#startDate').attr('min', maxDate);
        $('#endDate').attr('min', maxDate);
    })
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</script>
</html>

<?php /**PATH C:\xampp\htdocs\hotel\resources\views/home/detail_kamar.blade.php ENDPATH**/ ?>