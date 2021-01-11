<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">{{ucfirst($product->name)}} - Details</h4>
    <div class="d-flex align-items-start py-3 border-bottom">
        <img
            src="{{$product->image}}"
            class="img" alt="{{$product->name}}">
        <div class="px-sm-4 px-2" id="img-section">
            <b>Product description</b>
            <p>{{$product->description}}</p>
        </div>
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6">
                <label for="productId">Product Id</label>
                <input type="text" class="bg-light form-control" disabled placeholder="{{$product->id}}">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="productName">Product Name</label>
                <input type="text" class="bg-light form-control" disabled placeholder="{{ucfirst($product->name)}}">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="productPrice">Product Price</label>
                <input type="text" class="bg-light form-control" disabled placeholder="{{$product->price}}">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="productStock">Product Stock</label>
                <input type="text" class="bg-light form-control" disabled placeholder="{{$product->stock}}">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="productBrand">Product Brand</label>
                <input type="text" class="bg-light form-control" disabled placeholder="{{$product->brand}}">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="productColor">Product Color</label>
                <input type="text" class="bg-light form-control" disabled placeholder="{{$product->color}}">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="productCreated">Product Created</label>
                <input type="text" class="bg-light form-control" disabled placeholder="{{$product->created_at}}">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="productUpdated">Product Updated</label>
                <input type="text" class="bg-light form-control" disabled placeholder="{{$product->updated_at}}">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-12">
                <label for="productTags">Product Tags</label>
                <div class="col-sm-6 form-control border" style="background-color: #f8f9fa; font-weight: 500; color:#6c757d;">
                    @foreach($tags as $tag)
                        {{$tag->name.", "}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    body {
        background-color: white
    }

    .wrapper {
        padding: 30px 50px;
        border: 1px solid #ddd;
        border-radius: 15px;
        margin: 10px auto;
        max-width: 600px
    }

    h4 {
        letter-spacing: -1px;
        font-weight: 400
    }

    .img {
        width: 100px;
        height: 100px;
        border-radius: 6px;
        object-fit: cover
    }

    #img-section p,
    #deactivate p {
        font-size: 12px;
        color: #777;
        margin-bottom: 10px;
        text-align: justify
    }

    #img-section b,
    #img-section button,
    #deactivate b {
        font-size: 14px
    }

    label {
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 500;
        color: #777;
        padding-left: 3px
    }

    .form-control {
        border-radius: 10px
    }

    input[placeholder] {
        font-weight: 500
    }

    .form-control:focus {
        box-shadow: none;
        border: 1.5px solid #0779e4
    }

    select {
        display: block;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 10px;
        height: 40px;
        padding: 5px 10px
    }

    select:focus {
        outline: none
    }

    @media (max-width: 576px) {
        .wrapper {
            padding: 25px 20px
        }

    }
</style>
