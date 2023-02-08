@extends('app.layout')

@section('content')

<div>
    <a href="{{ route('projectadd') }}" class="btn btn-success float-right upModalCustom"><i class="fas fa-user-plus"></i> Tambah </a>
    {{-- <button data-title='New Project' data-url="{{ route('projectadd') }}" class="btn btn-primary upModalCustom" type="button">Tambah</button> --}}
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Umur</th>
            <th scope="col">Jantina</th>
            <th scope="col">Aktiviti</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($model as $value) --}}
            <tr>
                {{-- <th scope="row" class="col-md-2">{{ ++$bil }}</th> --}}
                {{-- <td class="col-md-3">{{ $value->nama }}</td> --}}
                {{-- <td class="col-md-2">{{ $value->umur }}</td> --}}
                {{-- <td class="col-md-2">{{ $value->jantina }}</td> --}}
                {{-- <td class="d-flex"> --}}
                    {{-- <a href="{{ route('pelajaredit', $value->id) }}" class="btn btn-warning mr-2"><i class="fas fa-user-edit"></i> Kemaskini</a> --}}
                    {{-- <a href="#" class="btn btn-primary mr-2"><i class="fas fa-info-circle"></i> Papar</a> --}}
                    {{-- <form action="{{ route('pelajarpadam', $value->id) }}" method="post"> --}}
                        {{-- @csrf --}}
                        {{-- @method('delete') --}}

                        {{-- <button class="btn btn-danger deleteConfirm" type="submit"><i class="fas fa-trash-alt"></i> Padam</button> --}}
                    {{-- </form> --}}
                {{-- </td> --}}
            </tr>
        {{-- @endforeach --}}
    </tbody>
</table>



@endsection