<div class="card">
  <div class="card-header">
    <h3 class="card-title">Modul</h3>
  </div>
  <div class="card-body">
    <button class="btn btn-info float-right" onclick="createflow({{$modul_id}})">Add New Flow</button>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Flow Name</th>
        <th>Flow Description</th>
        <th>Owner</th>
        <th>Created At</th>
        <th style="text-align: center;">Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
          if(! isset($flow[0]->flow_id)){
        ?>

        <tr>
          <td colspan="5" align="center">
            <i><strong>No flow Have been store for this modul</strong></i> 
          </td>
        </tr>

        <?php
          }
        ?>

      @foreach ($flow as $item )
      <tr>
        {{-- <td><a href="{{route('flowindex', encrypt($item->modul_id))}}">{{$item->modul_name}}</a></td> --}}
        <td><a>{{$item->flow_name}}</a></td>
        <td>{{$item->flow_description}}</td>
        <td></td>
        <td>{{$item->created_at}}</td>
        
        <td align="center">
          <ul class="list-inline">
            <li class="list-inline-item">
              <button onclick="showflow({{$item->flow_id}})" class="btn btn-primary btn-sm">
                <i class="fas fa-folder"></i>
                View
              </button>
            </li>
            
            <li class="list-inline-item">
              <button onclick="editflow({{$item->flow_id}})" class="btn btn-warning btn-sm">
                <i class="fas fa-pencil-altr"></i>
                Edit
              </button>
            </li>

            <li class="list-inline-item">
              <form action="{{ route('flow.destroy', $item->flow_id) }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="modul_id" value="{{$modul_id}}">
                {{-- <input type="hidden" name='project_id' value="{{$item->projectID}}"> --}}
                  <button type="submit" class="btn btn-danger btn-sm buttondeleteajax" data-message2="This flow will be deleted" data-id="{{$modul_id}}" >
                    <i class="fas fa-trash"></i>
                    Delete
                  </button>
              </form>
            </li>

            
          </ul>
          
          
            
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


{{-- Custom Js --}}
<script src="{{ asset('asset/js/custom.js') }}" type="text/javascript" charset="utf-8"></script>