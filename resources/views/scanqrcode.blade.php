@extends('layouts.app')
@section('page-script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
@endsection


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
        background-color: #6f42c1;
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
        background-color: #6f42c1;
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
    const shopping = ["Amazon","Flipkart","Ajio","Myntra"];
    const food = ["Zomato","Swiggy","Starbucks","food"];
    let category;
    let warningFlag = false;
    let isShopping = false;
    let keywords;
    fetch('/get-keywords')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            keywords = data;

        })
        .catch(error => console.error(error));

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
        for(let i=0;i<shopping.length;i++){
            if(result.includes(shopping[i].toLowerCase()));
            isShopping = true;
        }

        for(let i=0;i<keywords.length;i++){
            if(isShopping && keywords[i]['Category'] == 'Shopping'){
                warningFlag=true;
                showCustomModal("Warning", "A threshold has been reached for shopping. Do you want to continue? If you continue, you will lose the rewards for this transaction.");

            }
        }
        if(warningFlag!=true){
            showCustomModalSecond("Information", "You haven't reached the limit. Wanna try offers?");
        }


        scanner.clear();
        document.getElementById('reader').remove();
    }

    function error(err) {
        console.error(err);
    }


        function showCustomModal(title, message) {
        const modal = `
        <div class="modal fade" id="customModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">${title}</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      ${message}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"><a href="{{ route('paymentsuccess') }}">Yes</a></button>
        <button type="button" class="btn btn-primary"><a href="{{ route('paymentcancel') }}">No</a></button>
      </div>
    </div>
  </div>
</div>
        `;

        // Append the modal HTML to the body
        document.body.insertAdjacentHTML('beforeend', modal);

        // Show the modal
        $('#customModal').modal('show');
    }

    function showCustomModalSecond(title, message) {
        const modal = `
        <div class="modal fade" id="customModalSecond" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">${title}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      ${message}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="{{ route('rewards.index') }}">Yes</a></button>
        <button type="button" class="btn btn-primary"><a href="{{ route('dashboard') }}">No</a></button>
      </div>
    </div>
  </div>
</div>
        `;

        // Append the modal HTML to the body
        document.body.insertAdjacentHTML('beforeend', modal);

        // Show the modal
        $('#customModalSecond').modal('show');
    }

</script>
@endsection
