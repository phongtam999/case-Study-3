@extends('master')
@section('content')

<h2>Sửa thể loại</h2>
<div class="container">
    {{-- @include('sweetalert::alert') --}}

    <div class="col-12 col-lg-12 d-flex">
        <div class="card border shadow-none w-100">
          <div class="card-body">
            <form class="row g-3" action="{{route('category.update',[$categories->id])}}" method="POST">
                @method('put')
                @csrf
              <div class="col-12">
                <label class="form-label">Tên</label>
                <input type="text" class="form-control" value="{{$categories->name}}" name="name" >
                @error('name')
                        <div style="color: red">{{$message}}</div>
                @enderror
              </div >
             <div class="col-12">
               <div class="d-grid">
                 <button class="btn btn-primary" type="submit">Thêm thể loại</button>

               </div>
             </div>
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection
