<div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $model->nama ?? '') }}"
        class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
        placeholder="Nama Penuh">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    {{-- @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Umur</label>
    <input type="number" name="umur" value="{{ $model->umur ?? '' }}"
        class="form-control @error('umur') is-invalid @enderror" id="exampleInputPassword1" placeholder="Umur">
    {{-- @error('umur')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</div>

<div class="form-group">
    <label for="exampleFormControlSelect1">Jantina</label>
    <select class="form-control @error('jantina') is-invalid @enderror" name="jantina" id="exampleFormControlSelect1">
        <option value="">Sila pilih</option>
        <option {{ ($model->jantina ?? '') == 'lelaki' ? 'selected' : '' }} value="lelaki">Lelaki</option>
        <option {{ ($model->jantina ?? '') == 'perempuan' ? 'selected' : '' }} value="perempuan">Perempuan</option>
    </select>
    {{-- @error('jantina')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</div>

<div class="form-group">
    <label for="exampleFormControlSelect1">Negeri</label>
    <select class="form-control @error('negeri') is-invalid @enderror" name="negeri" id="exampleFormControlSelect1">
        <option value="">Sila pilih</option>
        {{-- @foreach ($getNegeri as $key => $item)
            <option {{ ($model->negeri ?? '') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $item }}
            </option>
        @endforeach --}}
    </select>
    {{-- @error('negeri')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</div>
