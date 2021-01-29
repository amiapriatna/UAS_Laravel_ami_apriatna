@extends('layouts.app')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h1> {{ $article->title }}</h1>
            </div>  
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ url()->previous() }}"> Back</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <?php $path = Storage::url('images/articles/' . $article->image); ?>
              <img src="{{$path}}" alt="" class="rounded mx-auto d-block pb-5" style="max-width: 40vw;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ \DateTime::createFromFormat("Y-m-d H:i:s", $article->updated_at)->format("l, m-d-Y H:i") }}</strong>
                <p style="white-space: pre-line; word-break: break-all; font-size: 20px;">
                {{ $article->content }}
                </p>
            </div>
        </div>
    </div>
@endsection