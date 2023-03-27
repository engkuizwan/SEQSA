    {{-- <form action="{{route('newproject.store')}}" id="project_add" method="post"> --}}
        <form>
        {{-- @csrf
        @method('put') --}}


            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="project_name" value="{{ $project->project_name??""?$project->project_name:old('project_name'??'') }}" 
                class="form-control @error('project_name') is-invalid @enderror" placeholder="Project Name" id='project_name'>
                @error('project_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="project_description" value="{{ $project->project_description??""?$project->project_description:old('project_description' ?? '') }}"  
                class="form-control @error('project_description') is-invalid @enderror" placeholder="Description" id='project_description'>
                @error('project_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="">Framework</label>
                <input type="text" name="project_framework" value="{{  $project->project_framework??""?$project->project_framework:old('project_framework' ?? '') }}" 
                class="form-control @error('project_framework') is-invalid @enderror" placeholder="Project Framework" id='project_framework'>
                @error('project_framework')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a type="button" class="btn btn-warning " onclick="update({{$project->projectID}})">Edit</a>


    </form>

<script>
    function update(id){
            event.preventDefault();
            var project_name = $("#project_name").val();
            var project_description = $("#project_description").val();
            var project_framework = $("#project_framework").val(); 
            // alert(project_framework);
        $.ajax({
            type: "post",
            url: "{{ url('project_update') }}/" + id,
            data: {
                "_token": "{{ csrf_token() }}",
                "project_name" : project_name,
                "project_framework" : project_framework,
                "project_description" : project_description
            },
            success: function(data){ 
                $(".btn-close").click();
                read();
            }
        });
    }
  </script>
  
