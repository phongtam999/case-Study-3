<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('viewAny', Category::class);
        $categories = Category::paginate(5);
        $param = [
            'categories'=> $categories
        ];
        return view('admin.category.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Category::class);
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//
$category = new Category();
$category->name = $request->name;
$category->save();
return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $this->authorize('update', Category::class);
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
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
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('category.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //xóa tạm thời
     public function destroy($id){
        $Category = Category::find($id);
        $Category->delete();

    }
    //thùng rác
    public function Garbagecan(){
        // dd($product);
        $softs = Category::onlyTrashed()->get();
        // dd($softs);
        return view('admin.category.soft',compact('softs'));
    }
    // //khôi phục
    public function restore($id){
        // dd($id);
        $softs = Category::withTrashed()->find($id);
        $softs->restore();
        return redirect()->route('category.index');
    }
    // //xóa vĩnh viễn
    // public function deleteforever($id){
    //     $softs = Category::withTrashed()->find($id);
    //     $softs->forceDelete();
    //     return redirect()->route('products.index');
    // }
    

}
