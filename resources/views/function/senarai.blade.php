@extends('app.layout')

@section('content')

<div class="card">
<div class="card-header">
    <h3 class="card-title">Files</h3>
</div>
<div class="card-body">
    {{-- <button class="btn btn-success float-right" onclick="createfile({{$file_id}})">Add New Function</button> --}}
    <a href="{{ route("function.create", "id=".encrypt($file_id)) }}" class="btn btn-success float-right">Add New Function</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Function Name</th>
                    <th>Function Description</th>
                    <th>Creator</th>
                    <th>Created At</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($functionList as $item)
                <tr>
                    <td>{{$item->function_name}}</td>
                    <td>{{$item->functionDesc}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td align="center">
                        <a href="{{ route('functionShow', $item->functionID) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('function.edit', $item->functionID) }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ route('function.destroy', $item->functionID) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name='function_id' value="{{$item->functionID}}">
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    
    
@endsection