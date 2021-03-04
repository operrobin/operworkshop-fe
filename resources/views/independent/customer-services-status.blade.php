<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Booking Service</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1" />

<meta property="og:title" content="" />
<meta property="og:type" content="" />
<meta property="og:url" content="" />
<meta property="og:image" content="" />

<!-- Place favicon.ico in the root directory -->
{{--
  Bootstrap
  --}}

<link 
    rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous" />

{{--
    Font Awesome
    --}}

<link 
    rel="stylesheet" 
    href="{{ asset('/styles/independent/font-awesome.min.css') }}" />

<link rel="stylesheet" href="{{ asset('/styles/independent/customer-main.css') }}" /> 
<link rel="stylesheet" href="{{ asset('/styles/independent/customer-style.css') }}" /> 
<meta name="theme-color" content="#fafafa" />

<script 
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous">
</script>

<script 
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous">
</script>

<script 
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
    crossorigin="anonymous">
</script>


<style>

    
</style>

</head>
<body>
    
    {{-- 
      Headers
      --}}

<div class="div_wrapper">
	<div class="container bott_padd">
	  	<div class="row">
	    		<div class="col bott_padd">
	    			  <h6 class="heading normal_font">BOOKING</h6>
	    		</div>
	  	</div>
	  	<div class="row">
	  	  	<div class="col-4 no_right_padd">
	  	  		<h6 class="heading normal_font">Kode booking</h6>
	  	  	</div>
	   	  	<div class="col-8">
	   	  		<h6 class="heading normal_font">: <span>{{ $data->booking_no }}</span></h6>
	   	  	</div>
	  	</div>
	  	<div class="row">
	  	    <div class="col-4 no_right_padd">
	  	        <h6 class="heading normal_font">Waktu booking</h6>
	  	    </div>
	  	    <div class="col-8">
	  	    	<h6 class="heading normal_font">: <span>{{ $data->booking_time }}</span></h6>
	  	    </div>
	  	</div>
	  	<div class="row">
	  	    <div class="col-4 no_right_padd">
	  	  	    <h6 class="heading normal_font">Lokasi booking</h6>
	  	    </div>
	  	    <div class="col-8">
	  		    <h6 class="heading normal_font">: <span>{{ $data->customer_address }}</span></h6>
	    	    </div>
	  	</div>
      
    <input type="hidden" value="{{ $data->booking_no }}" id="kodebooking">
	</div>
</div>

{{--
    
    OperOrder Status 
    @see \App\Model\OperOrder

    WAITING_FOR_DRIVER = 0;
    GET_DRIVER = 1;
    SERVICE_ADVISOR_OPEN_ORDER = 2;
    SERVICE_ADVISOR_SUBMIT_PKB = 3;
    FOREMAN_TASK = 4;
    SERVICE_ADVISOR_UPLOAD_INVOICE = 5;
    WAITING_FOR_DRIVER_AFTER_INVOICE = 6;
    GET_DRIVER_AND_SHOW_DRIVER = 7;

    --}}

<div class="div_wrapper">
    <div class="container">
        <div class="row text-center relative_pos">
              <div class="col no_horiz_padd">
                  <div id="icon_penjemputan" class="relative_pos box_circle circle1 bott_margin_1 @if($data->order_status == \App\Model\OperOrder::WAITING_FOR_DRIVER) box_active @endif"></div>
                  <h6 class="smallest">Penjemputan</h6>
              </div>
              <div class="col no_horiz_padd">
                  <div id="icon_service_advisor" class="relative_pos box_circle circle1 bott_margin_1 @if($data->order_status >= \App\Model\OperOrder::SERVICE_ADVISOR_OPEN_ORDER && $data->order_status <= \App\Model\OperOrder::SERVICE_ADVISOR_SUBMIT_PKB) box_active @endif" data-div="#service_advisor" data-hide=".content_area"></div>
                  <h6 class="smallest">Service Advisor</h6>
              </div>
              <div class="col no_horiz_padd">
                  <div id="icon_service" class="relative_pos box_circle circle1 bott_margin_1 @if($data->order_status == \App\Model\OperOrder::FOREMAN_TASK) box_active @endif" data-div="#service" data-hide=".content_area"></div>
                  <h6 class="smallest">Service</h6>
              </div>
              <div class="col no_horiz_padd">
                  <div id="icon_pembayaran" class="relative_pos box_circle circle1 bott_margin_1 @if($data->order_status == \App\Model\OperOrder::SERVICE_ADVISOR_UPLOAD_INVOICE) box_active @endif" data-div="#pembayaran" data-hide=".content_area"></div>
                  <h6 class="smallest">Pembayaran</h6>
              </div>
              <div class="col no_horiz_padd">
                  <div id="icon_pengantaran" class="relative_pos box_circle circle1 bott_margin_1 @if($data->order_status >= \App\Model\OperOrder::WAITING_FOR_DRIVER_AFTER_INVOICE && $data->order_status <= \App\Model\OperOrder::GET_DRIVER_AND_SHOW_DRIVER) box_active @endif" data-div="#pengantaran" data-hide=".content_area"></div>
                  <h6 class="smallest">Pengantaran</h6>
              </div>
        </div>
    </div>
</div>

    @switch($data->order_status)

        @case(\App\Model\OperOrder::WAITING_FOR_DRIVER)
            
            @include('independent/includes/status-0')

            @break

        @case(\App\Model\OperOrder::GET_DRIVER)
            
            @include('independent/includes/status-1')

            @break

        {{--
            
            Status 2 and 3 had same view
            
            --}}

        @case(\App\Model\OperOrder::SERVICE_ADVISOR_OPEN_ORDER)
            
            @include('independent/includes/status-2-3')

            @break

        @case(\App\Model\OperOrder::SERVICE_ADVISOR_SUBMIT_PKB)
            
            @include('independent/includes/status-2-3')

            @break


        @case(\App\Model\OperOrder::FOREMAN_TASK)

            @include('independent/includes/status-4')

            @include('independent/includes/modal')

            @break

        @case(\App\Model\OperOrder::SERVICE_ADVISOR_UPLOAD_INVOICE)
            
            @include('independent/includes/status-5')

            @break

        @case(\App\Model\OperOrder::WAITING_FOR_DRIVER_AFTER_INVOICE)
            
            @include('independent/includes/status-6')

            @break

        @case(\App\Model\OperOrder::GET_DRIVER_AND_SHOW_DRIVER)

            @include('independent/includes/status-7')

            @break

        @default

            @break

    @endswitch

	<div id="confirm_popup" class="popup_fixed dnone">
		<div class="inner_popup">
           <div><p class="bold_font">Terima kasih telah melakukan booking servis pada bengkel kami.<br>Apakah anda ingin memberikan feedback terkait layanan kami ?</p></div>
			<div class="form-group"><textarea class="form-control feedback_field" rows="3" id="feedback"></textarea></div>
			<div class="text-center">
                <div class="loader" id="loader"></div>
                <button type="button"  class="btn btn-block btn-primary btn-sm close_popup" onclick="submitcomment()" id="buttonya" style="background-color:#D50000;">Ya
                </button><button type="button"  class="btn btn-block btn-secondary btn-sm close_popup" onclick="submitcomment()" id="buttontidak">Tidak</button></div>
		</div>
	</div>
    <div id="confirm_popup_cancel" class="popup_fixed dnone">
		<div class="inner_popup">
            <div><p class="bold_font">Apakah anda ingin membatalkan booking ? .<br></p></div>
			<div class="form-group"><textarea class="form-control feedback_field" rows="3" id="reason" placeholder="Alasan membatalkan"></textarea></div>
			<div class="text-center">
                <div class="loader" id="loader_cancel"></div>
                <button type="button" data-hide="#confirm_popup" class="btn btn-block btn-primary btn-sm close_popup" onclick="batalkanbooking()" id="buttonyacancel" style="background-color:#D50000;">Ya</button><button type="button" data-hide="#confirm_popup_cancel" class="btn btn-block btn-secondary btn-sm close_popup" id="buttontidakcancel">Tidak</button></div>
		</div>
	</div>
    <input type="hidden" id="bookingstats" value="0">
    

    <div id="zoom_img" class="popup_fixed dnone">
		<div class="inner_zoom_popup">
			<img class="zoomimg close_popup" src="" data-hide="#zoom_img">
		</div>
	</div>


	<script src="{{ asset('/scripts/independent/main-script.js') }}"></script>
</body>
</html>