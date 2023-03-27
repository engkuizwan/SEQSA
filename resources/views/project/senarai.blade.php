



    @foreach ( $model as $project )
      <div class="card" id="project">
        <a href="{{ route('modulindex',$project->projectID) }}">
        <img class="card-img-top" src="">
          <div class="card-body">
            <h5 class="card-title">{{ $project->project_name }}</h5>
            <p class="card-text">{{ $project->project_description }}</p>
            <p class="card-text"><small class="text-muted">Created at :  {{ $project->created_at }}</small></p>
          </div>
        </a>
        <button onclick="show({{$project->projectID}})" class="btn btn-warning"><i class="fas fa-user-edit"></i>Edit</button>
        <form action="{{ route('newproject.destroy', $project->projectID) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger deleteConfirm" type="submit"><i class="fas fa-trash-alt"></i> Padam</button>
        </form>
      </div>  
    @endforeach

    
    <!-- Button trigger modal -->
    <a type="button" class="btn" id='buttonaddproject' onClick="create()">
      <img id="addproject"  src="{{ asset('asset/icon/plus-square.svg') }}" alt="Example">
    </a>

    @section('script2')
    <script type="text/javascript">
        $('.deleteConfirm').click(function(event) {
            alert('test');
            var form = $(this).parents('form');
            event.preventDefault();
            Swal.fire({
                title: 'Adakah anda pasti?',
                text: 'Data pelajar akan dibuang dari sistem',
                icon: 'warning',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                confirmButtonText: 'Ya',
                denylButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Berjaya',
                    'Data pelajar telah dibuang dari sistem',
                    'success'
                    )
                    form.submit()
                } else if (result.isDenied) {
                    Swal.fire(
                    'Tindakan Dibatalkan',
                    'Tiada tindakan dilakukan',
                    'error'
                    )
                }
            })
        });
    </script>
@endsection

  