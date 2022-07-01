@extends('layouts.parent')
@section('title', 'Edit-Product')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="{{route('dashboard.products.update',['id' => $product->id ])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="product-name" class="text-success">Product Name</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Product Name"
                            name="name_en" value="{{ $product->name_en }}">
                            @error('name_en')
                            <div class="alert alert-danger">{{$message}}</div>
                                                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Product-name-ar" class="text-success">اسم المنتج</label>
                        <input type="text" class="form-control" placeholder="اسم المنتج" name="name_ar"
                            value="{{ $product->name_ar }}">
                            @error('name_ar')
                            <div class="alert alert-danger">{{$message}}</div>
                                                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="code" class="text-success">Code</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Product-Code"
                            name="code" value="{{ $product->code }}">
                            @error('code')
                            <div class="alert alert-danger">{{$message}}</div>
                                                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="text-success">Price</label>
                        <input type="number" class="form-control" placeholder="Price" name="price"
                            value="{{ $product->price }}">
                            @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                                                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="text-success">Quantity</label>
                        <input type="number" class="form-control" placeholder="quantity" name="quantity"
                            value="{{ $product->quantity }}">
                            @error('quantity')
                            <div class="alert alert-danger">{{$message}}</div>
                                                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" class="text-success">Status</label>
                        <select class="form-control" name="status">
                            <option @selected($product->status == 1) value="1">Not Active</option>
                            <option @selected($product->status ==2) value="2">Active</option>


                        </select>
                        @error('status')
                        <div class="alert alert-danger">{{$message}}</div>
                                                    @enderror
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="desc-en" class="text-success">Desc_en</label>
                        <textarea class="form-control" rows="3" name="desc_en">{{ $product->desc_en }}</textarea>
                        @error('desc_en')
                        <div class="alert alert-danger">{{$message}}</div>
                                                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc-ar" class="text-success">Desc_ar</label>
                        <textarea class="form-control" rows="3" name="desc_ar">{{ $product->desc_ar }}</textarea>
                        @error('desc_ar')
                        <div class="alert alert-danger">{{$message}}</div>
                                                    @enderror
                    </div>


                    <div class="form-group">
                        <label for="brands" class="text-success">Brands</label>
                        <select class="form-control" name="brand_id">
                            @foreach ($brands as $brand)
                                <option @selected($brand->id == $product->brand_id) value="{{ $brand->id }}">{{ $brand->name_en }} -
                                    {{ $brand->name_ar }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <div class="alert alert-danger">{{$message}}</div>
                                                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="subcategories" class="text-success">Subcategories</label>
                        <select class="form-control" name="subcategory_id">
                            @foreach ($subcategories as $subcategory)
                                <option @selected($subcategory->id == $product->subcategory_id) value="{{ $subcategory->id }}">
                                    {{ $subcategory->name_en }} - {{ $subcategory->name_ar }}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                        <div class="alert alert-danger">{{$message}}</div>
                                                    @enderror
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="image" class="text-success">Choose file</label>
                        <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon03"
                            name="image">
                        <img src='{{ asset("images/product/{$product->image}") }}' alt="{{ $product->name_en }}" width="10%">
                            @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                                                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 offset-5 px-5 ">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
