@extends('apps')
@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Hasil SPK</h1>
    </div>
    <div class="col-sm-6">
    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection
@section('content')
<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <a type="submit" class="btn btn-primary" href="{{route('maps')}}">Visual Maps</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!--<th>No</th>-->
                  <th>Lokasi / Nama Jalan</th>
                  <th>Hasil Akhir</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($alternatif as $i)
                <tr>
                  <th>{{ $i->lokasi_pelanggaran }}</th>
                  <td>{{ $i->nilai }}</td>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Cek Konsistensi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if($cekKonsistensi != null)
                            <tr>
                                <th>P</th>
                                <td>{{ $cekKonsistensi->p }}</td>
                              </tr>
                              <tr>
                                <th>CI</th>
                                <td>{{ $cekKonsistensi->ci }}</td>
                              </tr>
                              <tr>
                                <th>RI</th>
                                <td>{{ $cekKonsistensi->ri }}</td>
                              </tr>
                              <tr>
                                <th>CR</th>
                                <td>{{ $cekKonsistensi->cr }}</td>
                              </tr>
                              <tr>
                                <th>CR %</th>
                                <td>{{ $cekKonsistensi->cr_persen }}%  < 10% (
                                  @if($cekKonsistensi->cr_persen < 10)
                                  Fill the Requirement
                                  @else
                                  No Fill the requirement
                                  @endif
                                  )</td>
                              </tr>
                            @endif
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Konsistensi Kriteria</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($konsistensi as $i)
                            <tr>
                              <th>{{ $i->kriteria }}</th>
                              <td>{{ $i->nilai }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('menukiriL')
