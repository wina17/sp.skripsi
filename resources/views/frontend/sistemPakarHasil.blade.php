@extends('layouts.frontend')
@section('content')
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
      <div class="row" style="background-color: white; padding-top: 50px; padding-bottom: 50px;">
        <div class="col-md-12">
          <div class="col-md-5">
          @foreach ($hitung_persens as $hitung_persen)
            {{ $hitung_persen->pasien->nama_anjing}}
            {{ $hitung_persen->penyakit->nama }}
            {{ $hitung_persen->persen->max()}}
          @endforeach  
          </div>
          {{ $hitung_persens->links() }}
          <div class="col-md-7">
            
          </div>
          
        </div>
</section>
@endsection