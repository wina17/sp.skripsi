<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
{{-- <script src="{{ ltrim(public_path('chart/highcharts.js')) }}"></script>
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
  </script> --}}
	
<div class="container">
  <div class="media-container-row">
      <div class="title col-12 col-md-8"><br><br>
          <h2 class="align-center">
              HASIL DIAGNOSA</h2>
      </div>
    </div>
</div>

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