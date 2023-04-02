
{{-- SweetAlert2 --}}
<script src="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
  $('.deleteConfirm').click(function(event) {
      // alert('test');
      var form = $(this).parents('form');
      event.preventDefault();
      Swal.fire({
          title: 'Are you sure?',
          text: 'This project will be move to archive',
          icon: 'warning',
          showDenyButton: true,
          confirmButtonColor: '#3085d6',
          denyButtonColor: '#d33',
          denyButtonText: 'No',
          confirmButtonText: 'Yes',
          reverseButtons: true
      }).then((result) => {
          if (result.isConfirmed) {
          // disable the button to prevent multiple clicks
          $(this).attr('disabled', true);
          
          // submit the form using AJAX
          $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
              // show the success message
              Swal.fire(
                'Successfull',
                'Project have been moved to archive',
                'success'
              );
              
              // reload the page after a short delay
              setTimeout(function() {
                // location.reload();
                read();
              }, 2000);
            },
            error: function(xhr) {
              // show an error message
              Swal.fire(
                'Error',
                'The form could not be submitted',
                'error'
              );
              
              // re-enable the button
              $(this).attr('disabled', false);
            }
          });
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


    @foreach ( $model as $project )
      <div class="card" id="project">
        <a href="{{ route('modulindex', encrypt($project->projectID)) }}">
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
    <a  id='buttonaddproject' onClick="create()">
      <img id="addproject"  src="{{ asset('asset/icon/plus-square.svg') }}" alt="Example">
    </a>



  