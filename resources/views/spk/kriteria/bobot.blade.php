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
    <div class="row">
    <div class="col-12">
      <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bobot Kriteria</h3>
          </div>
          <!-- /.card-header j-->
         <div class="card-body">
             <form action="/nilaikriteria/create" method="POST">
                {{ csrf_field() }}
            <table id="example1" class="table table-bordered table-striped">
                <tbody>
                  @for($l = 0; $l < sizeof($kriteria); $l++)
                    @for($r = ($l+1); $r < sizeof($kriteria); $r++)
                    <tr>
                        <th>{{ $kriteria[$l]['kriteria'] }}</th>
                        <td>
                          <select name="{{ $kriteria[$l]['id'] . '_' .$kriteria[$r]['id'] }}" class="form-control">
                            <option value="0" selected>Pilih...</option>
                            <option value="1">1. Sama Penting</option>
                            <option value="3">3. Cukup Penting</option>
                            <option value="5">5. Lebih Penting</option>
                            <option value="7">7. Mutlak Lebih Penting</option>
                          </select>
                        </td>
                        <th>Dari Pada {{ $kriteria[$r]['kriteria'] }}</th>
                      </tr>
                      @endfor
                      @endfor
                </tbody>
            </table>
                <input type="submit" class="btn btn-info" value="Simpan">
        </form>
          </div>
        </div>
    </div>
</div>
</section>

<script>
    $(document).ready(function(){
      $('.opt-select').change(function(){
        if ($(this).val() == 1){
          var arr = $(this).attr('name').split('_');
          var name = 'select[name=' + arr[1] + '_' + arr[0] + ']';
          $(name).val(1);
        } else {
          var arr = $(this).attr('name').split('_');
          var name = 'select[name=' + arr[1] + '_' + arr[0] + ']';
          $(name).val(0);
        }
      });
    });
  </script>

@endsection
@extends('menukiriL')
