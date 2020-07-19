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
          <!-- /.card-header -->
          <!-- Horizontal Form -->
          <div class="card card-info">
              <!-- form start -->
              <form class="form-horizontal" action="/spk/kupdate/{{ $kriteria->id }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
                <div class="card-body">
                  <div class="form-group row">
                  <label>Nama Kriteria</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kriteria" value="{{ $kriteria->kriteria }}" required>

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
                    <input type="submit" class="btn btn-success swalUpdateSuccess" value="Update">
                  <input href="/spk/kriteria" type="submit" class="btn btn-default float-right" value="Cancel">
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          <!-- /.card-body -->
        </div>
     </div>
</section>
@endsection
@extends('menukiriL')
