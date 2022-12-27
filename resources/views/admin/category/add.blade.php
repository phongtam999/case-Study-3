
@extends('master')
@section('content')
    <h4 style="color: red" >Thêm Loại Sản Phẩm</h4>
<div class="container">
<div class="col-12 col-lg-12 d-flex">
    <div class="card border shadow-none w-100">
      <div class="card-body">
        <form class="row g-3" action="{{route('category.store')}}" method = 'post'>
            @csrf
          <div class="col-12">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                    <div style="color: red">{{$message}}</div>
            @enderror
          </div >
         <div class="col-12">
           <div class="d-grid">
             <button class="btn btn-primary" type="submit">Add Category</button>
           </div>
         </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
