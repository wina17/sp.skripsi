<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Site made with Mobirise Website Builder v4.8.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{ asset ('frontend/assets/images/mbr-122x116.jpg') }}" type="image/x-icon">
  <meta name="description" content="">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="{{ asset ('frontend/assets/web/assets/mobirise-icons/mobirise-icons.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/tether/tether.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/soundcloud-plugin/style.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/bootstrap/css/bootstrap-grid.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/bootstrap/css/bootstrap-reboot.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/socicon/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/dropdown/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/style.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/slick.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/theme/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset ('frontend/assets/mobirise/css/mbr-additional.css') }}" type="text/css">
<script src="{{ asset ('frontend/assets/web/assets/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset ('frontend/assets/popper/popper.min.js') }}"></script>  
</head>
<body>
<script src="{{ asset('chart/highcharts.js') }}"></script>
<script>
  $(function () {
    $('#container3').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'PERBANDINGAN DENGAN PENYAKIT LAINNYA '
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Jumlah',
            colorByPoint: true,
            data: [
        @foreach ($hasilchart as $row)
          {
            name: '{{ $row->penyakit->nama }}',
            y: {{ $row->persen }}        
        },            
        @endforeach          
        
      ]
        }]
    });
});
  </script>
<section class="mbr-section content5 cid-r81rsCLT9y mbr-parallax-background" id="content5-h">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8"><br><br>
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-2"></h2>
                <h2 class="align-left mbr-bold mbr-white pb-3 mbr-fonts-style display-2">
                    HASIL DIAGNOSA</h2>
            </div>
          </div>
       </div>
</section>

<section class="container">
  <div class="row" style="background-color: white; padding-top: 30px;padding-bottom: 30px;">
    <div class="col-md-12">
      <div class="row">
            <div class="col-md-6">
            <div class="alert alert-success" style="font-size: 24px; text-align: justify;">
              <p>
              </p>
                Anjing anda, <strong>{{ $hasil->pasien->nama_anjing }} </strong> terdiagnosa terjangkit penyakit <strong>{{ $hasil->penyakit->nama }}</strong>.
              <p>
              Tindakan medis awal yang dapat anda lakukan:<br>
              {{ $hasil->penyakit->solusi }}
            </p>
                <a class="btn btn-primary" href="{{ url('/sistemPakar/pertanyaan') }}" role="button">Tes Ulang</a>
                <a class="btn btn-success pull-right" href="{{ url('#') }}" role="button">Cetak PDF</a>
              </div>
          </div>
          <div class="col-md-6">
            <div id="container3">

            </div>        
      </div>
    </div>
      
  </div>
</section>
</body>
</html>