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
	}
  td,th{
    border-top: 1px solid black;
    border-right: 1px solid black;
    border-left: 1px solid black;
    border-bottom: 1px solid black;
    font-size: 17px;
  }
	</style>
<body>
<div class="container">
	<div class="sub-container">
		 <p style="font-style: italic; font-size: 14px;">- SISTEM PAKAR DIAGNOSA PENYAKIT ANJING / STIKOM Dinamika Bangsa Jambi-</p>
		 <p class="font" style="text-align: center; font-size: 25px;"><strong>Hasil Diagnosa</strong></p>
         <p class="font" style="font-size: 20px;">
         	Anjing anda, <strong>{{ $hasil->pasien->nama_anjing }} </strong> terdiagnosa terjangkit penyakit <strong>{{ $hasil->penyakit->nama }}</strong>.
         </p>
         <p class="font" style="font-size: 20px;">
         	Tindakan medis awal yang dapat anda lakukan:<br>
          {{ $hasil->penyakit->solusi }}
         </p><br>
        <div class="box-body">
              <table class="font">
                  <thead>
                      <tr style="font-size: 22px;">
                         {{-- <th style="text-align: center;">PASIEN</th> --}}
                          <th style="text-align: center;">PERTANYAAN</th>
                          <th style="text-align: center;">JAWABAN</th>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($diagnosa as $row)
                      <tr>
                        <td style="text-align: justify; padding-left: 10px;padding-right: 10px;">{{ $row->gejala->pertanyaan }}</td>
                        <td style="text-align: center;">
                          @if ($row->jawaban==1)
                              <p>Benar</p>
                            @elseif ($row->jawaban==0.6)
                              <p>Mungkin Benar</p>
                            @elseif ($row->jawaban==0)
                              <p>Tidak Tahu</p>
                            @elseif ($row->jawaban==-0.6)
                              <p>Mungkin Salah</p>
                            @else
                              <p>Salah</p>
                            @endif
                        </td>
                      </tr>
                    @empty
                      {{-- empty expr --}}
                    @endforelse
                  </tbody>
              </table>
          </div>
          <br><br><br><br>
          <p style="font-style: italic;"> - SISTEM PAKAR CREATED BY </p>
	</div>
</div>		
</body>
</html>