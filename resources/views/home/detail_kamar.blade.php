<!DOCTYPE html>
<html>
@include('home.header')
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
                @foreach ($room as $kamar)
                    <div class="col-md-6">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <div style="padding:20px" class="room_img">
                                    <img style="height:300px; width:800px" src="../room/{{ $kamar->gambar }}"
                                        alt="" />
                                </div>
                            </div>
                            <div class="bed_room">
                                <h3>{{ $kamar->nama_kamar }}</h3>
                                <p style="padding: 12px">{{ Str::limit($kamar->deskripsi, 75) }} </p>
                                <p style="padding: 12px">Free WIFI : {{ $kamar->wifi }} </p>
                                <p style="padding: 12px">Type Kamar : {{ $kamar->type_kamar }} </p>
                                <p style="padding: 12px">Harga : {{ $kamar->harga }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h1 style="font-size: 40px!important;"> Booking Kamar</h1>
                        <div>
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-bs-dismiss="alert">x</button>
                                {{ session()->get('message')}}
                            </div>
                            @endif
                        </div>
                        @if($errors)
                            @foreach($errors->all() as $errors )
                                <li style="color: red">
                                    {{$errors}}
                                </li>  
                            @endforeach
                        @endif
                        <form action="{{ url('add_booking', $kamar->id) }}" method="get">
                            @csrf
                        <div class="mb-3">
                            <label for="floatingInput">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama" @if(Auth::id()) value="{{Auth::user()->name}}"@endif>
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
                @endforeach
            </div>
        </div>
    </div>
    @include ('home.footer')
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

