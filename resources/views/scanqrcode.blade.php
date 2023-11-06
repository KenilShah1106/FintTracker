@extends('layouts.app')

@section('page-content')
<main>
    <div id="reader"></div>
    <div id="result"></div>
</main>
@endsection

@section('page-styles')
<style>
    main{
        margin-left: 15rem;
        color: #FFF;
        background-color: #5e72e4;
    }
    #reader {
        width: 600px;
        color:#FFF;
    }
    #result {
        text-align: center;
        font-size: 1.5rem;
        color:#FFF;
    }

@media only screen and (max-width: 720px) {
    main{
        margin-left: 5rem;
        color: #FFF;
        background-color: #5e72e4;
    }
    #reader {
        width: 300px;
        color:#FFF;
    }
    #result {
        text-align: center;
        font-size: 1rem;
        color:#FFF;
    }
}
</style> 
@endsection

@section('page-scripts')
<!-- <script src="{{ asset('node_modules/html5-qrcode/html5-qrcode.min.js') }}"></script> -->
<script>
    const scanner = new Html5QrcodeScanner('reader', {
        qrbox: {
            width: 250,
            height: 250,
        },
        fps: 20,
    });

    scanner.render(success, error);

    function success(result) {
        // document.getElementById('result').innerHTML = `
        // <h2>Success!</h2>
        // <p><a href="${result}">${result}</a></p>
        // `;

        window.confirm("Are you sure you want to continue?");

        scanner.clear();
        document.getElementById('reader').remove();
    }

    function error(err) {
        console.error(err);
    }
</script>
@endsection
