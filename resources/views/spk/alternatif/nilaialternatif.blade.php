@extends('apps')
@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Nilai Alternatif</h1>
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
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>-</th>
                    @foreach ($kriteria as $i)
                <th>{{ $i->kriteria}}</th>
                    @endforeach
                </tr>
                  <!--<th>No</th>
                  <th>Lokasi / Nama Jalan</th>
                  <th>Diatas 17 Tahun</th>
                  <th>Dibawah 17 Tahun</th>
                  <th>Total Laka Lantas</th>-->
                </tr>
                </thead>
                <tbody>
                    @foreach($alternatif as $i)
                    <tr>
                        <th>{{ $i->lokasi_pelanggaran }}</th>
                        @foreach($i->NilaiAlternatif as $j)
                        <td>{{ $j->nilai }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
                </tfoot>
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
