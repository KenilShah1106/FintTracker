@extends('layouts.app')

@section('page-title', 'Rewards')

@section('page-styles')

@endsection

@section('page-content')
    <div class="row justify-content-sm-around">
        @if($products->isEmpty())
            <div class="card mb-3 p-3 d-flex justify-content-center col-md-5">
                <div class="card-title p-3 fw-bolder fs-2">No products</div>
                <div class="card-body p-3">
                    Currently there are no products
                </div>
            </div>
        @else
            @foreach ($products as $product)
                <div class="product-card card m-3 p-3 d-flex col-md-3" style="cursor: pointer"
                    onclick="handleProductClick({{auth()->user()->reward_points}}, {{$product->price}})">
                    <div class="card-title p-0 d-flex border rounded-3">
                        <img src="{{$product->image_path}}" alt="Product Image" width="100%" height="180px">
                    </div>
                    <div class="card-body p-0">
                        <div class="w-full d-flex justify-content-between align-items-center gap-1">
                            <h4 class="fs- fw-bolder">{{$product->name}}</h4>
                            <h5 class="badge rounded-pill text-bg-primary">{{$product->price}} pts.</h5>
                        </div>
                        <p class="p-0">{{$product->description}}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
@section('page-scripts')
<script>
    function handleProductClick(rewardPoints, price) {
        if(rewardPoints == null || rewardPoints == 0 || rewardPoints < price) {
            alert("You don't have enough points to buy this product");
            return;
        }
        if(confirm("Are you sure you want to buy this product?")) {
            alert("You have successfully bought this product");
        }

        $.ajax({
            url: "{{route('updateRewardPoints')}}",
            type:"POST",
            data: {
                _token: "{{ csrf_token() }}",
                price,
            },
            success: function(response) {
                console.log(response);
            },
            error: function(response) {
                console.error(response);
            }
        })

    }
</script>
@endsection
