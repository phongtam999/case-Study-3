@extends('master')
@section('content')
    <main class="page-content">
        <h1>Danh sách sản phẩm</h1>
        <div class="container">
            <table class="table">
                <div class="col-6">
                </div>
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Hình Ảnh</th>
                        <th adta-breakpoints="xs">Hành Động</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($products as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->category->name }}</td>
                            <td>{{ $team->amount }}</td>
                            <td>
                                <img src="{{ asset('/public/assets/product/' . $team->image) }}" alt=""
                                    style="width: 50px">
                            </td>
                            <form action="{{ route('products.softdeletes', $team->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>
                                    <a href="{{ route('products.edit', $team->id) }}" class="btn btn-primary">Sửa</a>
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Chuyên vào thùng rác')">Xóa</button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $items->appends(request()->input())->links() }} --}}
            </section>
    </main>
@endsection
