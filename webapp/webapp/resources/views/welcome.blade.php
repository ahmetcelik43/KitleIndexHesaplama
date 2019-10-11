<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="col-md-4 col-md-offset-3 text-center">

        <div class="alert alert-info">
        Boy olarak 1.45 ile 2.00 arasında metre ve kilo olarak da 40-110 kg arasında giriniz.

        </div>
<form>
<input type="hidden" id="route" value="{{Route('IndexPOST')}}">

<input type="text" name="boy" class="form-control" placeholder="Boyunuzu giriniz" required>
<input type="number" name="kilo" class="form-control" placeholder="Kilonuzu giriniz" required>
<br>
<button class="btn btn-success" type="submit">Hesapla</button>
</form>
<br>
<div  id="col">

</div>

</div>
               

    </div>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script>
    
$('form').submit(function (event)
{
                event.preventDefault();
                var boy=$('input[name="boy"]').val();
    var kilo=$('input[name="kilo"]').val();
    var formvalue=new FormData();
    formvalue.append("boy",boy);
    formvalue.append("kilo",kilo);
   
               
    $.ajax({
                    url:"/IndexPOST",
                    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
					contentType: false,//gönderilen data veri türü temsil eder.
					data:formvalue,
                    dataType:"json",
					type: 'post',
                    processData: false,
					success: function (response) {
                        $("#col").html("");
                        $("#col").append('<p>Kitle indexi:  '+response.kitleIndex+'</p>'
                        
                        
                        +'<br><p>Durum:  '+response.durum+'</p>')
                      
                      
                    //alert("Başarılı");


          },
					error: function (response) {
                      alert("hata");
					}
				});
})

</script>
    </body>
</html>
