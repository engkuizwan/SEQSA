@extends('app.layout')

@section('content')
{{-- {{dd($modul)}} --}}
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Modul</h3>
    </div>
    <div class="card-body">
      <button class="btn btn-success float-right" onclick="createmodul({{$project_id}})">Add New Modul</button>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Modul Name</th>
          <th>No. Of Flow</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th style="text-align: center;">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($modul as $item )
        <tr>
          <td><a href="{{route('flowindex', encrypt($item->modul_id))}}">{{$item->modul_name}}</a></td>
          <td></td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->update_at}}</td>
          <td align="center">
            <button onclick="showmodul({{$item->modul_id}})" class="btn btn-primary btn-sm">
              <i class="fas fa-folder"></i>
              View
            </button>
            <button onclick="editmodul({{$item->modul_id}})" class="btn btn-info btn-sm">
              <i class="fas fa-pencil-altr"></i>
              Edit
            </button>
              <form action="{{ route('modul.destroy', $item->modul_id) }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name='project_id' value="{{$item->projectID}}">
                  <button type="submit" class="btn btn-danger btn-sm buttonsaveajax" data-message2="This modul will be deleted" >
                    <i class="fas fa-trash"></i>
                    Delete
                  </button>
              </form>
          </td>
        </tr>
        @endforeach
        
        </tbody>
        {{-- <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </tfoot> --}}
      </table>
    </div>
    <!-- /.card-body -->

  </div>
    
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Files</h3>
    </div>
    <div class="card-body">
      <button class="btn btn-success float-right" onclick="createfile({{$project_id}})">Add New File</button>
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>File Name</th>
          <th>File Type</th>
          <th>Created At</th>
          <th style="text-align: center;">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($file as $item )
        <tr>
          <td><a href="">{{$item->file_name}}</a></td>
          <td>{{$item->file_type}}</td>
          <td>{{$item->created_at}}</td>
          <td align="center">
            <button onclick="showfile({{$item->file_ID}})" class="btn btn-primary btn-sm">
              <i class="fas fa-folder"></i>
              View
            </button>
            <button onclick="editfile({{$item->file_ID}})" class="btn btn-info btn-sm">
              <i class="fas fa-pencil-altr"></i>
              Edit
            </button>
            <form action="{{ route('file.destroy', $item->file_ID) }}" method="post">
              @csrf
              @method('delete')
              <input type="hidden" name='project_id' value="{{$item->projectID}}">
                <a type="submit" class="btn btn-danger btn-sm buttonsaveajax" data-message2='This file will be deleted'>
                  <i class="fas fa-trash"></i>
                  Delete
                </a>
            </form>
          </td>
        </tr>
        @endforeach
        
        </tbody>
        {{-- <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </tfoot> --}}
      </table>
    </div>
    <!-- /.card-body -->

  </div>
    

    <script>
      $(function () {

        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false, 
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
          "pagelength":2,
          'order': []
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $("#example2").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false, 
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
          "pagelength":2
          'order': []
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

      });

      function createfile(project_id){
        $.get("{{ route('file.create') }}", {}, function(data,status){
          $('#page').html(data);
          $('#modal').modal('show');
          $('#modallable').html('Create File');
          $('#project_id').val(project_id); //to set value
        });
      }

      function createmodul(project_id){
        $.get("{{ route('modul.create') }}", {}, function(data,status){
          $('#page').html(data);
          $('#modal').modal('show');
          $('#modallable').html('Create Modul');
          $('#project_id').val(project_id); //to set value
        });
      }
      function editmodul(id){
        // alert(id);
        // var id1 = id;
        $.get("{{ url('modul_edit') }}/"+id, {}, function(data,status){
          $('#page').html(data);
          $('#modal').modal('show');
          $('#modallable').html('Update Modul');
        });
      }
      function editfile(id){
        // alert(id);
        // var id1 = id;
        $.get("{{ url('file_edit') }}/"+id, {}, function(data,status){
          $('#page').html(data);
          $('#modal').modal('show');
          $('#modallable').html('Update File');
        });
      }

      function showfile(id){
        // alert(id);
        // var id1 = id;
        $.get("{{ url('file_show') }}/"+id, {}, function(data,status){
          $('#page').html(data);
          $('#modal').modal('show');
          $('#modallable').html('Update File');
        });
      }

      function showmodul(id){
        // alert(id);
        // var id1 = id;
        $.get("{{ url('modul_show') }}/"+id, {}, function(data,status){
          $('#page').html(data);
          $('#modal').modal('show');
          $('#modallable').html('Update File');
        });
      }

      

    </script>

@endsection

