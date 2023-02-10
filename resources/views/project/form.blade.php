<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="project_name" value="{{ old('project_name'??'') }}" 
    class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
    placeholder="Project Name">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    {{-- @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</div>
<div class="form-group">
    <label for="">Description</label>
    <input type="text" name="project_description" value="{{ old('project_description' ?? '') }}"  
    class="form-control @error('umur') is-invalid @enderror" id="exampleInputPassword1" 
    placeholder="Description">
    {{-- @error('umur')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</div>


<div class="form-group">
    <label for="">Framework</label>
    <input type="text" name="project_framework" value="{{ old('project_framework' ?? '') }}" 
    class="form-control @error('umur') is-invalid @enderror" id="exampleInputPassword1" 
    placeholder="Project Framework">
    {{-- @error('umur')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</div>

{{-- <div class="form-group">
    <label for="">Framework</label>
    <select class="form-control @error('jantina') is-invalid @enderror" name="jantina" id="exampleFormControlSelect1">
        <option value="">Sila pilih</option>
        <option {{ ($model->jantina ?? '') == 'lelaki' ? 'selected' : '' }} value="lelaki">Lelaki</option> --}}
        {{-- <option {{ ($model->jantina ?? '') == 'perempuan' ? 'selected' : '' }} value="perempuan">Perempuan</option> --}}
    {{-- </select> --}}
    {{-- @error('jantina')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
{{-- </div> --}}
{{-- 
<div class="form-group">
    <label for="">Negeri</label>
    <select class="form-control @error('negeri') is-invalid @enderror" name="negeri" id="exampleFormControlSelect1">
        <option value="">Sila pilih</option> --}}
        {{-- @foreach ($getNegeri as $key => $item)
            <option {{ ($model->negeri ?? '') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $item }}
            </option>
        @endforeach --}}
    {{-- </select> --}}
    {{-- @error('negeri')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
{{-- </div> --}}

<button type="submit" class="btn btn-primary float-right btnsaveajaxfile">Hantar</button>
{{-- <a href="{{ route('pelajarindex') }}" class="btn btn-secondary float-right mr-2">Kembali</a> --}}
<a href="" class="btn btn-secondary float-right mr-2">Kembali</a>
