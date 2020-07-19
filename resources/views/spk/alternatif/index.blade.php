@extends('apps')
@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Tabel Alternatif</h1>
    </div>
  </div>
</div><!-- /.container-fluid -->
<!-- /.container-fluid -->
@endsection
@section('content')
<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Lokasi / Nama Jalan</th>
                  <th>Longitude</th>
                  <th>Latitude</th>
                </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($alternatif as $a)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $a->lokasi_pelanggaran }}</td>
                        <td>{{ $a->longitude }}</td>
                        <td>{{ $a->latitude }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection
@extends('menukiriL')
