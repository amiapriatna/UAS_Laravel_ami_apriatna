@extends('layouts.app')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Daftar Artikel</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Create Article</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Image</th>
            <th>Title</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($articles as $article)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <?php $path = Storage::url('images/articles/' . $article->image); ?>
            <td>
              <img src="{{$path}}" alt="" class="rounded mx-auto d-block" style="height: 100px;">
            </td>
            <td>{{ $article->title }}</td>
            <td class="text-center">
                <form action="{{ route('articles.destroy',$article->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('articles.show',$article->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('articles.edit',$article->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $articles->links() !!}
 
@endsection