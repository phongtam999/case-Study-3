@extends('master')
@section('content')
<main class="page-content">
    <a  class="btn btn-warning" href="">Xuất</a>
<section class="wrapper">
    <div class="pagetitle">
      <h1>Đơn hàng</h1>
      <hr>
    </div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Ngày Đặt Hàng</th>
            <th scope="col">Tổng Tiền(Đồng)</th>
            <th scope="col">Tùy Chọn</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->customer->name}}</td>
            <td>{{$item->customer->email}}</td>
            <td>{{$item->customer->phone}}</td>
            <td>{{$item->customer->address}}</td>
            <td>{{$item->date_at}}</td>
            <td>{{number_format($item->total)}}</td>
            <td>
                {{-- @if (Auth::user()->hasPermission('Order_view')) --}}
                <a class="btn btn-info" href="">Chi tiết</a>
                {{-- @endif --}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- {{ $items->onEachSide(5)->links() }} --}}

</section>
</main>
@endsection
