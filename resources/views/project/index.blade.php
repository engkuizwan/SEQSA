@extends('app.layout')

@section('content')

    <style>
      .box-list{
        overflow-y:auto;
        min-height: 70%;
        /* max-width: 20%; */
      }
    </style>
    {{-- list --}}
    <div class="box-list mt-3" id="list"></div>


    <script>

      $(document).ready(function(){
        read();
      })

      function read(){
        $.get("{{ url('project_list') }}", {}, function(data,status){
          $('#list').html(data);
        });
      }

      function create(){
        $.get("{{ route('newproject.create') }}", {}, function(data,status){
          $('#page').html(data);
          $('#modal').modal('show');
          $('#modallable').html('Create Project');
        });
      }

      function show(id){
        // alert(id);
        // var id1 = id;
        $.get("{{ url('project_show') }}/"+id, {}, function(data,status){
          $('#page').html(data);
          $('#modal').modal('show');
          $('#modallable').html('Update Project');
        });
      }

      


      function store(){
            var name = $("#name").val();
            $.ajax({
                type: "post",
                url: "{{route('newproject.store')}}",
                data: {
                "_token": "{{ csrf_token() }}",
                "name" : name
                },
                success: function(data) {
                $(".btn-close").click();
                read();
                }
            });
        }

      // const form = document.getElementById('project_add');

      // form.addEventListener('submit', function(event) {
      //   event.preventDefault(); // prevent the form from submitting normally

      //   const formData = new FormData(form); // get the form data

      //   fetch('{{ route('projectstore') }}', {
      //     method: 'POST',
      //     body: formData
      //   })
      //   .then(response => {
      //     if (response.ok) {
      //       $(".btn-close").click();
      //       console.log('Form submitted successfully!');
      //     } else {
      //       // handle error response
      //       console.error('Error submitting form');
      //     }
      //   })
      //   .catch(error => {
      //     console.error('Error submitting form:', error);
      //   });
      // });






    </script>

@endsection
