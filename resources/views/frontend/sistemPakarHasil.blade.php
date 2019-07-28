@extends('layouts.frontend')
@section('content')
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
                Anjing anda, <strong>{{ $hasil->pasien->nama_anjing }} </strong> terdiagnosa terjangkit penyakit <strong>{{ $hasil->penyakit->nama }}</strong>.
              </p>
              <p>
              Tindakan medis awal yang dapat anda lakukan:<br>
              {{ $hasil->penyakit->solusi }}
            </p>
                <a class="btn btn-primary" href="{{ url('/sistemPakar/pertanyaan') }}" role="button">Tes Ulang</a>
                <a class="btn btn-success pull-right" href="{{ url('/sistemPakar/pdf') }}" role="button">Cetak PDF</a>
              </div>
          </div>
          <div class="col-md-6">
            <div id="container3">

            </div>        
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="box-body">
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th style="text-align: center;">PERTANYAAN</th>
                          <th style="text-align: center;">BOBOT JAWABAN</th>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($diagnosa as $row)
                      <tr>
                        <td>{{ $row->gejala->pertanyaan }}</td>
                        <td>
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
      </div>
    </div>
      
  </div>
</section>
@endsection