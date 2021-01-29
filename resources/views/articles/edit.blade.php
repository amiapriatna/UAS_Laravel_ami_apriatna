@extends('layouts.app')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Article</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('articles.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('articles.update',$article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $article->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea class="form-control" style="height:150px" name="content" placeholder="Content">{{ $article->content }}</textarea>
                </div>
            </div>
            <?php $path = Storage::url('images/articles/' . $article->image); ?>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <img src="{{ $path }}" alt="" style="max-width: 80%; max-height: 300px;">
              <div class="form-group">
                  <strong>Image:</strong>
                  <input type="file" name="image" class="form-control">
              </div>
            </div>
            <input type="hidden" name="oldImage" value="{{ $article->image }}">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection