@extends('layouts.applte')

@section('content')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

<script src="{{ asset('assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
    })
})
</script>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            &nbsp;
          </h1>
          <ol class="breadcrumb">
              <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Tambah Field Mobil {{ $title->name }}</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Field Mobil {{ $title->name }}</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <button type="button" class="btn btn-default" onclick="location.href='{{ route('mobils') }}'">Kembali</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('mobil.addfield', ['id' => Crypt::encryptString($mobil_id)]) }}'">Tambah Field</button>
                  <br><br>

                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; ?>
                          @foreach($fields as $field)
                      <tr>
                        <td><?=$no++?></td>
                        <td>{{ $field->name_field }}</td>
                        <td>{{ $field->description }}</td>
                        <td>
                          <?php /*<a href="{{ route('mobil.editfield', ['id_field' => Crypt::encryptString($field->id_field)]) }}">
                            <i class="fa fa-edit text-blue" style="font-size: 20px"></i>
                        </a>&nbsp;*/ ?>
                        <a href="{{ route('mobil.deletefield', ['id_field' => Crypt::encryptString($field->id_field)]) }}" onclick="return confirm('Apakah anda yakin akan menghapus {{ $field->name_field }}?')">
                            <i class="fa fa-trash text-red" style="font-size: 20px"></i>
                        </a>
                        </td>
                      </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
            <!-- /.box-body -->
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.content -->
      </div>
@endsection
