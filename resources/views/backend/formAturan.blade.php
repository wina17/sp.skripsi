@extends('layouts.backend')
@section('content')

<div class="content-wrapper" style="height: 900px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Aturan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Aturan</a></li>
        <li class="active">Form Data Aturan</li>
      </ol>
    </section>
    

    <!-- Main content -->
    <!-- general form elements -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <div class="box box-primary">
            @if(Session::has('pesan'))
                <div class="box-body">
                    <div class="alert alert-info alert-dismissible" style="margin-top: 10px;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <h4><i class="fa fa-check"></i>{{ Session::get('pesan') }}</h4>  
                    </div>
                </div>
            @endif
            {{ Form::model($aturan, array('action' => $action, 'files' => true, 'method' => $method)) }}
            <div class="form-group" style="padding-top: 5px; padding-left: 30px; padding-right: 30px;">    
                {{ Form::label('penyakit_id', 'NAMA PENYAKIT') }} 
                {!! Form::select('penyakit_id', $penyakit, null, ['class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('penyakit_id') }}</span>
            </div>
            <div class="form-group" style="padding-left: 30px; padding-right: 30px;">    
                {{ Form::label('gejala_id', 'NAMA GEJALA') }} 
                {!! Form::select('gejala_id', $gejala, null, ['class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('gejala_id') }}</span>
            </div>
            <div class="form-group" style="padding-left: 30px; padding-right: 30px;">    
                {{ Form::label('cf_pakar', 'NILAI CF PAKAR') }}
                {{ Form::select('cf_pakar', array('0.8'=>'Benar','0.6'=>'Cukup Yakin','0.4'=>'Mungkin','0.2'=>'Tidak Tahu','0'=>'Tidak'), null,['class'=>'form-control','placeholder' => '- Pilih salah satu -','autofocus']) }}
                <span class="text-danger">{{ $errors->first('cf_pakar') }}</span>
            </div>
            <div class="form-group" style="padding-left: 30px; padding-right: 30px;">    
                {{ Form::label('kode', 'KODE ATURAN') }} 
                {{ Form::text('kode',null,['class'=>'form-control','placeholder' => 'Kode Aturan','autofocus']) }}
                <span class="text-danger">{{ $errors->first('kode') }}</span>
            </div>
            <div class="form-group" style="padding-bottom: 50px; padding-left: 30px; padding-top: 5px; padding-right: 30px;">
                    {!! Form::submit($btn_submit, ['class' => 'btn btn-primary col-md-2']) !!}
                    <a class="btn btn-info col-md-2 pull-right" href="{{ route('dataAturan') }}" role="button">Kembali</a>
            {!! Form::close() !!}
            <!-- form start -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
</div>
@endsection