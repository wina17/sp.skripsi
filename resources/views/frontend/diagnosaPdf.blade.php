<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
	<style type="text/css" media="screen">
	@page{
		margin: 3cm;
	}
	/*Font Styling*/
	.font{
		font-family: Arial,Helvetica,sans-serif;
	}
	/*Container*/
	.container{
		/*background-color: blue;*/
	}
	.sub-container{
		/*background-color: yellow;*/
		display: inline-block;
		padding-bottom: 1px;
		margin-top: 2cm;
	}
	</style>
<body>
<div class="container">
	<div class="sub-container" style="font-size: 20px;">
		 <p style="font-style: italic; font-size: 12px;">- SISTEM PAKAR DIAGNOSA PENYAKIT ANJING / STIKOM Dinamika Bangsa Jambi-</p>
		 <p class="font"><strong>Hasil Diagnosa</strong></p>
         <p class="font">
         	Anjing anda, <strong>{{ $hasil->pasien->nama_anjing }} </strong> terdiagnosa terjangkit penyakit <strong>{{ $hasil->penyakit->nama }}</strong>.
         </p>
         <p class="font">
         	Tindakan medis awal yang dapat anda lakukan:<br>
           {{ $hasil->penyakit->solusi }}
         </p><br>
         <div class="box-body">
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th style="text-align: center;">PERTANYAAN</th>
                          <th style="text-align: center;">JAWABAN</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      {{-- <th>{{ $hasilPdf->gejala->nama }}</th> --}}
                    </tr>
                  </tbody>
              </table>
          </div>
	</div>
</div>		
</body>
</html>