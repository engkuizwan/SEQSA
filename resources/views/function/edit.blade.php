@extends('app.layout')

@section('content')

<form action="{{ route('function.update', $funcDetail->functionID) }}" method="POST">
    @csrf
    @method('put');

    @include('function._form')

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary" href="javascript:history.go(-1)">Cancel</a>
    </div>
</form>
    
@endsection