<!DOCTYPE html>
<html lang="en">
<head>
	<title>OPER</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

	<link rel="stylesheet" type="text/css" href="{{ asset('/styles/independent/customer-main.css') }}">
    
</head>
<body>


	<div class="container-contact100"> 
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" >
				<span class="contact100-form-title">
					<img src="{{ asset('/assets/img/logo.png') }}" alt="logo-image" width="140px" height="50px" style="display: block;margin-left: auto;margin-right: auto;"> 
				</span>


                @switch($status)
                    @case(1)

                    <p style ="font-weight: bold;font-size: 18px;margin-bottom: 18px">Booking telah selesai</p>
                    <p>Terima kasih telah melakukan booking service di bengkel kami, apa mungkin anda ingin melakukan booking service kembali ?</p>
                    <div class="container-contact100-form-btn" style="width: 25%;margin-top: 15px;margin-left: auto;margin-right: auto">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn" type="button" onclick="redirect()">
                                <span>
                                    Ya
                                </span>
                            </button>
                        </div>
                    </div>
                

                        @break

                    @case(2)

                    <p style ="font-weight: bold;font-size: 18px;margin-bottom: 18px">Booking dibatalkan</p>
                    <p>Halo sepertinya anda telah membatalkan booking service pada bengkel kami, apa mungkin anda ingin melakukan booking service kembali ? </p>
                    <div class="container-contact100-form-btn" style="width: 25%;margin-top: 15px;margin-left: auto;margin-right: auto">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn" type="button" onclick="redirect()">
                                <span>
                                    Ya
                                </span>
                            </button>
                        </div>
                    </div>

                        @break

                    @case(3)
                    <p style ="font-weight: bold;font-size: 18px;margin-bottom: 18px">Kode booking salah</p>
                    <p>Sepertinya anda telah memasukkan kode booking yang salah , apa mungkin anda ingin melakukan booking service ? </p>
                    <div class="container-contact100-form-btn" style="width: 25%;margin-top: 15px;margin-left: auto;margin-right: auto">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn" type="button" onclick="redirect()">
                                <span>
                                    Ya
                                </span>
                            </button>
                        </div>
                    </div>

                        @break
                    
                    @default

                    <p style ="font-weight: bold;font-size: 18px;margin-bottom: 18px">Booking berhasil dibatalkan</p>
                    <p>Anda telah berhasil membatalkan booking servis , apa mungkin anda ingin melakukan booking servis di hari lain ? </p>
                    <div class="container-contact100-form-btn" style="width: 25%;margin-top: 15px;margin-left: auto;margin-right: auto">
                        <div class="wrap-contact100-form-btn">
                            <div class="contact100-form-bgbtn"></div>
                            <button class="contact100-form-btn" type="button" onclick="redirect()">
                                <span>
                                    Ya
                                </span>
                            </button>
                        </div>
                    </div>

                @endswitch
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

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

<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="../js/main_home.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-175054982-1"></script><script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-175054982-1');
    
    function redirect()
    {
        
        location.href="{{ env('APP_URL') }}/booking";
        
    }
</script>

</body>
</html>
