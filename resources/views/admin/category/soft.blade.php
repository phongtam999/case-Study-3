@extends('master')
@section('content')

        <table class="table">
            <a href="#" class="btn btn-info">Back</a>
            <h1 style="color:rgb(110, 41, 41)" >Danh sách Tìm kiếm </h1>
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Name</th>
            </tr>
            </thead>
            <tbody>
                @foreach($softs as $key => $soft)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <td colspan="4">{{ $soft->name }}</td>
                <td>
                    <a href="#" class="btn btn-secondary">Delete Forever</a>
                    <a href="{{ route('category.restore',[$soft->id])}}" class="btn btn-warning" >Restore</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection
