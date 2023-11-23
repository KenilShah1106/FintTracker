@extends('layouts.app')
@section('page-content')
    <div class='payment-success'>
        <p>Hurray! You have been awarded 100 reward points for choosing our recommendation</p>
    </div>
@endsection

@section('page-styles')
<style>
    .payment-success{
        margin-top: 17rem;

    }
    p{
        text-align: center;
        font-size: 25px;
    }
</style>
@endsection
