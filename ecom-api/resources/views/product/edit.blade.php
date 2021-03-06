@extends('layouts.template')

@section('content')
<div class="container-fluid">
    @if(Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
        <strong> {{ Session::get('success') }} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(Session::get('failed'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
        <strong> {{ Session::get('failed') }} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <h1 class="dash-title">Products</h1>
    <div class="row">
        <div class="col-12">
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-title">Edit Product</div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price </label>
                            <input type="number" step="0.01" class="form-control" id="price" placeholder="0.0" name="price" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount </label>
                            <input type="number" class="form-control" id="discount" placeholder="0.0" name="discount" value="{{ $product->discount }}">
                        </div>
                        <div class="form-group">
                            <label for="category"> Select Category </label>
                            <select class="form-control" name="category">
                                <option> Select </option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $product->id) selected @endif > {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="isHotProduct" name="isHotProduct" @if($product->is_hot_product > 0) checked @endif />
                            <label for="isHotProduct"> Is Hot Product </label>

                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="isNewArrival" name="isNewArrival" @if($product->is_new_arrival > 0) checked @endif />
                            <label for="isNewArrival"> Is New Arrival </label>
                        </div>
                        <div class="form-group">
                            <label for="product_image">Image</label>
                            <input type="file" class="form-control" name="image" id="product_image" onchange="loadPhoto(event)">
                        </div>
                        <div class="form-group">
                            <img id="image" height="100" width="100">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function loadPhoto(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection