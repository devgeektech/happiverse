<div class="card">
    <div class="card-body">
        <div class="card-title">Products</div>
        <div class="row">

            @foreach($products as $product)

            <div class="col-lg-4">
                <a href="">
                    <div class="card product-card">
                        <img src="{{asset($product->productImage[0]->imageUrl ?? null) }}" alt="" class="card-img">
                        <div class="card-body">
                            <h3 class="card-title">{{$product->productName}}</h3>
                            <p class="price">${{$product->productPrice}}</p>
                            <div class="d-flex align-items-center justify-content-start">
                                                                    <a href="#" class="btn btn-primary btn-small w-100 me-1"><i class="far fa-edit me-1"></i>Edit</a>
                                                                    <a href="#" class="btn btn-primary btn-small w-100 ms-1"><i class="fas fa-trash-alt me-1"></i>Delete</a>
                                                                </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>