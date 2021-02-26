<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Konfirmasi Booking</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <style>
    /* -------------------------------------
        INLINED WITH htmlemail.io/inline
    ------------------------------------- */
    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
    }
    </style>
  </head>
  <body class="" style="background-color: #f2f2f2; font-family: roboto; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: roboto; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: Roboto; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

                <img src="https://booking.oper.co.id/logo.png" width="140px" height="50px" style="display: block;margin-left: auto;margin-right: auto;"> 
              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: Roboto; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                        
                        
                      <td style="font-family: Roboto; font-size: 14px; vertical-align: top;">
                        <p style="font-family: Roboto; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Halo, {{ $fullname }} </p>
                        <p style="font-family: Roboto; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Booking anda telah berhasil tercatat disistem kami </p>
                          <p style="font-family: Roboto; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Kode booking anda : {{ $booking_no }} </p>
                          
                         
                          <p style="font-family: Roboto; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Waktu booking anda : {{ $booking_time }} </p>
                          
                          <p style="font-family: Roboto; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Merk dan tipe : {{ $vehicle_brand_and_type }} </p>
                          
                          <p style="font-family: Roboto; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Nomor plat kendaraan : {{ $vehicle_license_plat }} </p>
                          
                        
                        <p style="font-family: Roboto; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Note :</p>
                          <p style="font-family: Roboto; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">1. Informasi lebih lanjut mengenai layanan ini dapat anda pelajari <a href="http://bit.ly/operworkshop" style="color: black;font-weight: bold">disini</a> </p>
                          
                          
                          <p style="font-family: Roboto; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;"> 2. Silahkan klik tombol merah dibawah ini untuk melihat keseluruhan proses dari servis anda </p>
                       
                          
                          <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;margin-left: auto;margin-right: auto">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: Roboto; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;margin-left: auto;margin-right: auto;">
                                  <tbody>
                                    <tr>
                                        <td style="font-family: Roboto; font-size: 14px; vertical-align: top; background-color: #D50000; border-radius: 5px; text-align: center;"> <a href="{{ $booking_uri }}" target="_blank" style="display: inline-block; color: white; background-color: #D50000; border: solid 1px #D50000; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #D50000;">Lihat proses</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                          
                          
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
             <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: Roboto; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #737373; text-align: center;">
                    <span class="apple-link" style="color: #737373; font-size: 12px; text-align: center;">PT. Online Helper Internasional <br/>Panin Tower, 15th Floor, Senayan City, Jl. Asia Afrika No.Lot. 19, RT.1/RW.3, Gelora,Kota Jakarta Pusat,</span>
                    <br> Daerah Khusus Ibukota Jakarta 10270.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: Roboto; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #737373; text-align: center;">
                    <a href="https://oper.co.id" style="color: #737373; font-size: 12px; text-align: center; text-decoration: none;">Oper.co.id</a>
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: Roboto; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>