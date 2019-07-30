@extends('layouts.frontend')
@section('content')
<section class="mbr-section content5 cid-r81rsCLT9y mbr-parallax-background" id="content5-h">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8"><br><br>
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-2">
                    Langkah 2</h2>
                <h2 class="align-left mbr-bold mbr-white pb-3 mbr-fonts-style display-2">
                    Mohon isi kuesioner dengan benar</h2>
            </div>
          </div>
       </div>
</section>

<section class="container">
  
{{ Form::model($gejalas, array('action' => $action, 'files' => true, 'method' => $method)) }} 
      <div class="row" style="background-color: white; padding-top: 50px; padding-bottom: 50px;">
        <div class="col-md-5">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama Pemilik</th>
                <td>{{ $pasien->nama_pemilik }}</td>
              </tr>
              <tr>
                <th>Nama Anjing</th>
                <td>{{ $pasien->nama_anjing }}</td>
              </tr>
            </thead>
          </table>
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                          <th style="text-align: center;">NO</th>
                          <th style="text-align: center;">PERTANYAAN</th>
                          <th style="text-align: center;">TIDAK</th>
                          <th style="text-align: center;">TIDAK TAHU</th>
                          <th style="text-align: center;">MUNGKIN</th>
                          <th style="text-align: center;">CUKUP YAKIN</th>
                          <th style="text-align: center;">YAKIN</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($gejalas as $gejala)
                        <tr>
                          <td style="text-align: center;" class="radio">{{ $loop->iteration }}</td>
                          <td>{{ $gejala->pertanyaan }}</td>
                          <td style="text-align: center;">
                          	{!! Form::hidden('gejala_id[]', $gejala->id, []) !!}
                          	{{   Form::radio('jawaban['.$gejala->id.']', 0,false, ['id' => 'tidak'.$gejala->id]) }}	
                          </td>                          
                          <td style="text-align: center;">
                          	{{  Form::radio('jawaban['.$gejala->id.']',0.2,false, ['id' => 'tidak_tahu'.$gejala->id]) 
                          	}}
                          </td style="text-align: center;">
                          <td style="text-align: center;">
                          	{{  Form::radio('jawaban['.$gejala->id.']',0.4,false, ['id' => 'mungkin'.$gejala->id]) 
                          	}}
                          </td>
                          <td style="text-align: center;">
                          	{{  Form::radio('jawaban['.$gejala->id.']',0.6,false, ['id' => 'cukup_yakin'.$gejala->id]) 
                          	}}
                          </td>
                          <td style="text-align: center;">
                          	{{  Form::radio('jawaban['.$gejala->id.']',0.8,false, ['id' => 'yakin'.$gejala->id]) 
                          	}}
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        {!! Form::submit('Selanjutnya', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        <!-- /.col -->
      </div>
      <!-- /.row -->

@endsection