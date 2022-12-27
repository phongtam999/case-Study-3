<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(2);
        $items = Product::with('category')->get();
        // dd($items);
        return view('admin.product.index',compact('products','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Product::class);

        $categories = Category::get();
        $param = [
            'categories' => $categories
        ];
        return view('admin.product.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        $product->color = $request->color;
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public/assets/product/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();
        // alert()->success('Thêm sản phẩm','thành công');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $this->authorize('view', Product::class);

        // $productshow = Product::findOrFail($id);
        // $param =[
        //     'productshow'=>$productshow,
        // ];

        // // $productshow-> show();
        // return view('admin.product.show',  $param );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $this->authorize('update', Product::class);

        $product = Product::find($id);
        $categories = Category::get();
        $param = [
            'product' => $product ,
            'categories' => $categories
        ];
        return view('admin.product.edit' , $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        $product->color = $request->color;
        $get_image=$request->image;
        if($get_image){
            $path='public/assets/product/'.$product->image;
            if(file_exists($path)){
                unlink($path);
            }
        $path='public/assets/product/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $product->image=$new_image;
        // dd($product);

        $data['product_image'] = $new_image;
        }
        $product->save();
        // alert()->success('Sửa ','thành công');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
}
  //thùng rác
  public function Garbagecan(){
    //   dd(123);
    $products = Product::onlyTrashed()->get();
    $param = ['products'=> $products];
    return view('admin.product.soft', $param);
}
// //khôi phục
public function restore($id){
    // dd($id);
    $softs = Product::withTrashed()->find($id);
    $softs->restore();
    return redirect()->route('product.index');
}
public  function softdeletes($id){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $product = Product::findOrFail($id);
    $product->deleted_at = date("Y-m-d h:i:s");
    $product->save();
    return redirect()->route('products.index');
}
public function restoredelete($id){
    // $this->authorize('restore', Category::class);
    $products=Product::withTrashed()->where('id', $id);
    $products->restore();
    return redirect()->route('products.Garbagecan');

}

}
