@extends('layout.admin')
@section('content')
    
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Pegawai</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
{{-- Data Pegawai --}}
<div class="container">
  {{-- @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
      {{ $message }}
  </div>
  @endif --}}
    <a href="/tambahpegawai" class="btn btn-success">Tambah Data +</a>
    <div class="row g-3 align-items-center mt-1">
      <div class="col-auto">
      <form action="/pegawai" method="GET">
        <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
      </form>
      </div>
      <div class="col-auto">
        <a href="/exportpdf" class="btn btn-primary">Eksport PDF</a>
      </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Hp</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($data as $index => $row)
              <tr>
                <th scope="row">{{ $index + $data->firstItem() }}</th>
                <td>
                  <img src="{{ asset('fotopegawai/'.$row->foto) }}" alt="" style="width: 40px;">
                </td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->jenkel }}</td>
                <td>{{ $row->alamat }}</td>
                <td>0{{ $row->notelpon }}</td>
                <td>{{ $row->jabatan }}</td>
                <td>{{ $row->created_at->format('D M Y')}}</td>
                <td>
                    <a href="/tampilkandata/{{ $row->id }}" class="btn btn-primary">Update</a>
                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
                </td>
              </tr>   
              @endforeach
            </tbody>
          </table>
          {{ $data->links() }}
    </div>
</div>
</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        
    <!-- ini adalah script sweetalert -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- ini adalah toastr laravel notifikasi-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    -->
    </body>
    <script>
    $('.delete').click(function(){

      var pegawaiid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');

    swal({
      title: "Hapus Data?",
      text: "Apakah anda yakin ingin menghapus data berdasarkan nama "+nama+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
    .then((willDelete) => {
      if (willDelete) {
        window.location= "/delete/" +pegawaiid+" "
        swal("Data telah Berhasil di Hapus!", {
          icon: "success",
        });
      } else {
    swal("Data tidak terhapus!");
    }
    });
    });
    </script>
    <!-- script dari notifikasi toaster laravel-->
    <script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
    </script>
@endsection
