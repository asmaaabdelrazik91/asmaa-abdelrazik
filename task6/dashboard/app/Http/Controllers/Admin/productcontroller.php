<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Media;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\StoreProductRequest;
use App\Http\Requests\Admins\UpdateProductRequest;

class productcontroller extends Controller
{
    use Media ;
    public function index()
    {
        $products = DB::table('products')
            ->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $brands = DB::table('brands')
            ->select('id', 'name_en', 'name_ar')
            ->get();
        $subcategories = DB::table('subcatecories')
            ->select('id', 'name_en', 'name_ar')
            ->get();


        return view('products.create', compact('brands', 'subcategories'));
    }
    public function edit($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->first();
        $brands = DB::table('brands')
            ->select('id', 'name_en', 'name_ar')
            ->get();
        $subcategories = DB::table('subcatecories')
            ->select('id', 'name_en', 'name_ar')
            ->get();
        return view('products.edit', compact('product', 'brands', 'subcategories'));
    }

    public function store(StoreProductRequest $request)
    {

        $data = $request->except('_token', 'image');
        $photo_name = $this->upload_photo($request,'product');
        $data['image'] = $photo_name;
        DB::table('products')
            ->insert($data);
        return redirect()->route('dashboard.products.index')->with('sucsses', 'The Product Is Created Successfully');
    }

    public function update(UpdateProductRequest $request, $id)
    {

        $data = $request->except('_token', '_method', 'image');
        if ($request->has('image')) {
            $photo_name = $this->upload_photo($request,'product');

            $data['image'] = $photo_name;
            $photo_name  = DB::table('products')
                ->select('image')
                ->where('id', $id)
                ->value('image');
            $this->delete_photo(public_path("images\product\\{$photo_name}"));

            }

        DB::table('products')
            ->where('id', $id)
            ->update($data);
        return redirect()->route('dashboard.products.index')->with('sucsses', 'The Product Is Updated Successfully');
    }
    public function delete($id)
    {

        $photo_name  = DB::table('products')
            ->select('image')
            ->where('id', $id)
            ->value('image');
        $this->delete_photo(public_path("images\product\\{$photo_name}"));

        DB::table('products')
            ->where('id', $id)
            ->delete();
        return redirect()->back()->with('sucsses', 'The Product Is Deleted Successfully');
    }
}
