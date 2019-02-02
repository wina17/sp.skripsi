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
            {{ Form::model($artikel, array('action' => $action, 'files' => true,)) }}
            <div class="form-group" style="padding-top: 5px; padding-left: 10px;padding-right: 10px;">    
                {{ Form::label('judul', 'JUDUL') }}    
                {{ Form::text('judul',null,['class'=>'form-control','placeholder' => 'Judul ','autofocus']) }}
                <span class="text-danger">{{ $errors->first('judul') }}</span>
            </div>
            <div class="form-group" style="padding-top: 5px; padding-left: 10px;padding-right: 10px;">    
                {{ Form::label('sub_judul', 'SUB JUDUL') }}    
                {{ Form::text('sub_judul',null,['class'=>'form-control','placeholder' => 'Sub Judul ','autofocus']) }}
                <span class="text-danger">{{ $errors->first('sub_judul') }}</span>
            </div>
            <div class="form-group" style="padding-top: 5px; padding-left: 10px;padding-right: 10px;">
                {{ Form::label('penulis', 'PENULIS') }}
                {{ Form::text('penulis',null,array('class'=>'form-control','placeholder' => 'Penulis Name')) }}
                <span class="text-danger">{{ $errors->first('penulis') }}</span>
            </div>
            <div class="form-group" style="padding-top: 5px; padding-left: 10px;padding-right: 10px;">
                {{ Form::label('isi', 'Isi') }}
                {!! Form::textarea('isi',null,array('class'=>'form-control','placeholder' => 'Isi')) ) !!}
                <span class="text-danger">{{ $errors->first('isi') }}</span>
            </div>
            <div class="form-group" style="padding-bottom: 50px; padding-left: 10px; padding-top: 5px; padding-right: 10px;">
                {!! Form::submit($btn_submit, ['class' => 'btn btn-primary col-md-2']) !!}
                <a class="btn btn-info col-md-2 pull-right" href="{{ route('dataArtikel') }}" role="button">Kembali</a>
            </div>
            {!! Form::close() !!}
            <!-- form start -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
</div>
@endsection