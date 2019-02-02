@extends('layouts.backend')
@section('content')

<div class="content-wrapper" style="height: 900px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
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
            {{ Form::model($gejala, array('action' => $action, 'files' => true, 'method' => $method)) }}
                <div class="form-group">    
                    {{ Form::label('nama', 'Nama Gejala') }}    
                    {{ Form::text('nama',null,['class'=>'form-control','placeholder' => 'Nama Gejala','autofocus']) }}
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group">    
                    {{ Form::label('detail', 'Detail Gejala') }}    
                    {{ Form::text('detail',null,['class'=>'form-control','placeholder' => 'Detail Gejala','autofocus']) }}
                    <span class="text-danger">{{ $errors->first('detail') }}</span>
                </div>
                <div class="form-group">    
                    {{ Form::label('pertanyaan', 'Pertanyaan') }}    
                    {{ Form::text('pertanyaan',null,['class'=>'form-control','placeholder' => 'Pertanyaan','autofocus']) }}
                    <span class="text-danger">{{ $errors->first('pertanyaan') }}</span>
                </div>
                <div class="form-group">
                    {{ Form::label('kode', 'Kode') }}
                    {{ Form::text('kode',null,array('class'=>'form-control','placeholder' => 'Kode')) }}
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                </div>
                <div class="form-group" style="padding-bottom: 50px; padding-left: 10px; padding-top: 5px; padding-right: 10px;">
                    {!! Form::submit($btn_submit, ['class' => 'btn btn-primary col-md-2']) !!}
                    <a class="btn btn-info col-md-2 pull-right" href="{{ route('dataGejala') }}" role="button">Kembali</a>
                </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection