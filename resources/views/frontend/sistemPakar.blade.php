@extends('layouts.frontend')

@section('content')
<section class="mbr-section content5 cid-r81rsCLT9y mbr-parallax-background" id="content5-h">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8"><br><br>
                <h5 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-2">
                    Langkah 1</h5>
                 <h5 class="align-left mbr-bold mbr-white pb-3 mbr-fonts-style display-2">
                    Masukkan Identitas Anda</h5>
            </div>
          </div>
       </div>
</section>
<section>
	<div class="container" >
		<div class="row" style="background-color: white; padding-top: 50px; padding-bottom: 50px;">
	        <!-- left column -->
	        <div class="col-md-6">
	          <div class="box box-primary">
	            {{ Form::model($pasien, array('action' => $action, 'files' => true,)) }}
	            <div class="form-group" style="padding: 10px;">    
	                {{ Form::label('nama_anjing', 'Nama Anjing') }}    
	                {{ Form::text('nama_anjing',null,['class'=>'form-control','placeholder' => 'Nama Anjing','autofocus']) }}
	                <span class="text-danger">{{ $errors->first('nama_anjing') }}</span>
	            </div>
	            <div class="form-group" style="padding: 10px;">
	                {{ Form::label('umur_anjing', 'Umur Anjing') }}
	                {{ Form::text('umur_anjing',null,array('class'=>'form-control','placeholder' => 'Umur Anjing')) }}
	                <span class="text-danger">{{ $errors->first('umur_anjing') }}</span>
	            </div>
	            <div class="form-group" style="padding: 10px;">
	            	{{ Form::label('jekel_anjing', 'Jenis Kelamin') }}
	            	<div>
	            		{{ Form::radio('jekel_anjing', 'ja', false, ['style'=>'margin-left:30px; width: 18px; height: 18px;']) }}
	            		{{ Form::label('jekel_anjing', 'Jantan', ['style'=>'font-size:24px; padding-right:30px;']) }}
	            		{{ Form::radio('jekel_anjing', 'be', false, ['style'=>'width: 18px; height: 18px;']) }}
	            		{{ Form::label('jekel_anjing', 'Betina', ['style'=>'font-size:24px; padding-right:10px;']) }}
	            	</div>
	                <span class="text-danger">{{ $errors->first('jekel_anjing') }}
	            </div>
	            <div class="form-group" style="padding: 10px;">
	            	{{ Form::label('nama_pemilik', 'Nama Pemilik') }}
	                {{ Form::text('nama_pemilik',null,['class'=>'form-control','placeholder' => 'Nama Pemilik','autofocus']) }}
	                <span class="text-danger">{{ $errors->first('nama_pemilik') }}
	            </div>
	            <div class="form-group" style="padding: 10px;">
	            	{{ Form::label('nohp_pemilik', 'Kontak Pemilik') }}
	                {{ Form::text('nohp_pemilik',null,['class'=>'form-control','placeholder' => 'Kontak Pemilik','autofocus']) }}
	                <span class="text-danger">{{ $errors->first('nohp_pemilik') }}
	            </div>
	            {!! Form::submit($btn_submit, ['class' => 'btn btn-primary']) !!}
	            {!! Form::close() !!}
	            <!-- form start -->
	          </div>
	          <!-- /.box -->
	        </div>
	        <div class="col-md-6">
	        	<div class="img-responsive">
	        		<img src="{{ asset('frontend\assets\images\smiling-dog.png') }}" alt="" style="width: 100%;">
	        	</div>
	        </div>
		</div>
	</div>
</section>

@endsection