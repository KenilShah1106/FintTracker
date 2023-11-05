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
                <div class="card mb-3 p-3 d-flex justify-content-center col-md-5">
                    <div class="card-title p-3 fw-bolder fs-2 w-100 d-flex justify-content-between">
                        <div>
                            {{$product->name}}
                        </div>
                        <div>
                            {{-- <span class="badge bg-gradient-info">{{$product->priority}}</span> --}}

                        </div>
                    </div>
                    <div class="card-body p-3">

                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
@section('page-scripts')

@endsection
