@extends('master')
@section('content')
        <h1 style="color: blue">Danh sách loại sản phẩm</h1>
        {{-- @include('sweetalert::alert') --}}

        <div class="container">
            <table class="table">
                <div class="col-6">
                <a href="{{ route('category.Garbagecan') }} " class="btn btn-danger"> Thùng Rác </a>
                    <form class="navbar-form navbar-left" action="#" method="GET">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-8">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-default">Tìm kiếm</button>
                            </div> --}}
                        </div>
                    </form>
                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col" >Tên</th>
                        <th adta-breakpoints="xs">Thao Tác</th>

                    </tr>
                </thead>
                <tbody id="myTable">

                    @foreach ($categories as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>
                                {{-- <form  action="{{ route('category.softdeletes', $team->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    @if (Auth::user()->hasPermission('Category_delete'))
                                     <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Chuyên vào thùng rác')">Xóa</button>
                                    @endif
                                    @if (Auth::user()->hasPermission('Category_update'))
                                    <a href="{{ route('category.edit', [$team->id]) }}" class="btn btn-primary">Sửa</a>
                                    @endif
                                </form> --}}
                                <form action="{{ route('category.destroy', $team->id) }}" method="POST">
                                        <a href="{{ route('category.edit', $team->id) }}" class="btn btn-info"> Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xoá</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $categories->appends(request()->query()) }} --}}
        </div>
@endsection
