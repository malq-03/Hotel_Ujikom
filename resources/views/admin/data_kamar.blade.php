<!DOCTYPE html>

<head>
    @include('admin.css')
    
<style>
    th {
        color: rgb(255, 255, 255);
    }
    .description-container {
        position: relative;
    }
    .description-summary {
        display: block;
    }
    .description-text {
        display: none;
        /* Sembunyikan teks lengkap secara default */
    }
    .read-more {
        display: block;
        color: rgb(205, 205, 216);
        cursor: pointer;
        text-decoration: underline;
    }
    .read-more.active {
        color: red;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var readMoreLinks = document.querySelectorAll('.read-more');

        readMoreLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var container = this.parentElement;
                var text = container.querySelector('.description-text');
                var summary = container.querySelector('.description-summary');

                if (text.style.display === 'none') {
                    text.style.display = 'block';
                    summary.style.display = 'none';
                    this.textContent = 'Read Less';
                } else {
                    text.style.display = 'none';
                    summary.style.display = 'block';
                    this.textContent = 'Read More';
                }
            });
        });
    });
</script>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success')}}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kamar</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Wifi</th>
                            <th scope="col">Type Kamar</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $read)
                        <tr>
                            <td>{{ $read->nama_kamar }}</td>
                            <td><div class="descripsion-container">
                                <p class="descripsion-text">{{ $read->desk }}</p>
                                <p class="descripsion-summary">{{ Str::limit($read->deskripsi, 100) }}</p>
                                <a href="#" class="read-more">Read More</a>
                            </td></div>
                                
                            <td>{{ $read->harga }}</td>
                            <td>{{ $read->wifi }}</td>
                            <td>{{ $read->type_kamar }}</td>
                            <td>
                                <img width="75" src="room/{{ $read->gambar }}" alt="">
                            </td>
                            <td>
                                <a class="btn btn-outline-warning" href="{{ url('update_kamar',$read->id)}}">Update</a>
                            </td>
                            <td>
                                <a onclick="return confirm('Apakah anda ingin menghapus kamar')" class="btn btn-outline-danger" href="{{ url('delete_kamar',$read->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.footer')
</body>
</html>
