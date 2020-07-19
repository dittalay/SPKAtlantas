@extends('apps')
@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Kriteria-Kriteria</h1>
    </div>
    <div class="col-sm-6">

    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection
@section('content')
<section class="content">
      <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Input Kriteria</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- Horizontal Form -->
          <div class="card card-body">
              <!-- form start -->
              <form class="form-horizontal" action="/spk/kstore" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group row">
                  <label>Nama Kriteria</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kriteria" placeholder="Masukan Nama Kriteria" required>

                      @if($errors->has('kriteria'))
                      <div class="text-danger">
                          {{ $errors->first('kriteria')}}
                      </div>
                      @endif

                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-info swalInputSuccess" value="Simpan">
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          <!-- /.card-body -->
        </div>
     </div>
</section>
<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Kriteria</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kriteria</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
              @foreach($kriteria as $k)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $k->kriteria }}</td>
                  <td>
                    <a href="{{route('show', ['id' => $k->id]) }}" type="button" class="btn btn-warning">Edit</a>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                        Delete
                      </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-12">
      <div class="card">
          <div class="card-header">
            <h3 class="card-title">Matriks Kriteria</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>-</th>
                @foreach($kriteria as $k)
                <th>{{ $k->kriteria }}</th>
                @endforeach
              </tr>
              </thead>
              <tbody>
                @foreach($nilai as $i)
                <tr>
                    <th>{{ $i->kriteria }}</th>
                    @foreach($i->NilaiKriteria1 as $j)
                    <td>{{ $j->nilai }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Configuration</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure want to delete this data?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">No, Close</button>
          <a href="/spk/kdlt/{{ $k->id }}" type="button" class="btn btn-danger swalDeleteSuccess">Yes, Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Configuration</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure want to edit this data?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">No, Close</button>
          <a href="{{route('show', ['id' => $k->id]) }}" type="button" class="btn btn-warning">Yes, Edit</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
@extends('menukiriL')
