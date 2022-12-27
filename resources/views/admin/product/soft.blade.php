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
                @foreach($products as $key => $soft)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <td colspan="4">{{ $soft->name }}</td>
                <td>
                     <form action="{{ route('products.restoredelete', $soft->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                                <button type="submit" class="btn btn-success">Khôi Phục</button>
                                                <a  data-href="{{ route('products.destroy', $soft->id) }}"
                                                    id="{{ $soft->id }}" class="btn btn-danger deleteIcon">Xóa</a>
                                        </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection
