@extends('layouts.app')
<style>
.list-content {
    background-image: url("https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Colorful-Circle-Simple-Background-Image-1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    margin-bottom: 50px;
    padding-bottom: 20px;
    padding-top: 20px;
    width: 100%;
    background:#04212c;
    color: #fff;
}

.content {
    width: 80%;
    margin-left: 10%;
    background-color: silver;
    padding: 5px 25px;
    margin-top: 25px;
    color: #000;
}

.relative{
    display: none;
}
</style>
@section('content')
<div class="container-fluid">
    <div id="carouselExampleCaptions" class="carousel slide row" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" style=" width:100%; ">
            <div class="carousel-item active">
            <img src="{{Storage::url('images/slider/1.jpeg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Welcome to IIHA</h2>
                <p>The Indonesian Industrial Hygiene Association (IIHA) is a voluntary, non-profit, non-governmental professional credentialing organization. IIHA was established on the 12th January 2016 and officially approved by Ministry of Human Right and Law – Republic of Indonesia by the 10th February 2016 (approval letter No.: AHU-0023179.AH.01.07.TAHUN 2016).</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="{{Storage::url('images/slider/2.jpg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>Guardian of Worker's Health</h2>
                <p>We analyze, identify, and measure workplace hazards or stressors that can cause sickness, impaired health, or significant discomfort in workers through chemical, physical, ergonomic, or biological exposures.<br>We protect our workers' health.</p>
            </div>
            </div>
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="list-content row mt-5 p-5">
    <h1 class="mx-auto">List Artikel</h1>
    @foreach ($articles as $article)
        <div class="content">
            <h1>{{ $article->title }}</h1>
            <small>{{ $article->updated_at }}</small>
            <?php $path = Storage::url('images/articles/' . $article->image); ?>
            <img src="{{$path}}" alt="" class="rounded d-block" style="height: 100px;" >
            <h4>{{ substr($article->content, 0, 100) }} ...</h4>
            <a class="btn btn-info btn-sm float-right" href="{{ route('articles', $article->id) }}">Baca Selengkapnya</a>
        </div>
    
    @endforeach
    </div>

    <div class="list-content mt-5 p-5">
        {!! $articles->links() !!}
    </div>

</div>
@endsection
