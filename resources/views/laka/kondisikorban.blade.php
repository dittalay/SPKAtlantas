@extends('apps')
@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Kondisi Korban</h1>
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
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                  <label>Kondisi Korban</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_kon" placeholder="Masukan Kondisi Korban">
                    </div>
                  </div>
                  <div class="form-group row">
                  <label>Keterangan</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="txt_ket" placeholder="Masukan Keterangan"></textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
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
              <h3 class="card-title">Data Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kondisi Korban</th>
                  <th>Keterangan</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td>
                      <button type="button" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                      Update</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>
                      <button type="button" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                      Update</button>
                  </td>    
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@extends('menukiriL')