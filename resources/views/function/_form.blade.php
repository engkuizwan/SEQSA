<div class="container">
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Function Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('func_name') is-invalid @enderror" id="func_name" name="func_name" placeholder="index" value="{{old('func_name')??($funcDetail->function_name??'')}}"  {{ $disabled??'' }}>
            @error('func_name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    {{-- <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Function Description</label>
        <div class="col-sm-8">
            <textarea type="text" class="form-control @error('func_desc') is-invalid @enderror" id="func_desc" name="func_desc" placeholder="The Description of your Function is here" {{ $disabled??'' }}>{{old('func_desc')??($funcDetail->function_name??'')}} </textarea>
            @error('func_desc')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div> --}}
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">User Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('user') is-invalid @enderror" id="user" name="user" placeholder="Ahmad Bin Abu" value="{{old('user')??($funcDetail->userID??'')}}"  {{ $disabled??'' }}>
            @error('user')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Role Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" placeholder="Admin IT" value="{{old('role')??($funcDetail->roleID??'')}}"  {{ $disabled??'' }}>
            @error('role')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">File Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="file" name="file" placeholder="Index.php" value="{{old('file')??($funcDetail->file_ID??'')}}"  @readonly(true)>
        </div>
    </div>
    {{-- <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">File Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('role') is-invalid @enderror" id="file" name="file" placeholder="Index.php" value="{{old('file')??($funcDetail->file_ID??'9')}}"  @readonly(true)>
            @error('file')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div> --}}
</div>