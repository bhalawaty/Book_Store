@extends('layouts.app')
@section('header')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    <strong>BOOK TITLE</strong>: {{$book->title}}
                </h3>
                <div class="blog-post">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm  position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="nav d-flex" style="margin-bottom: 30px;">
                                @foreach($book->genres->pluck('name') as $tag )
                                    <div style="margin:0 10px 30px;border: solid 1px #227dc7;border-radius: 6px!important;padding:5px; background-color: #227dc7 ;color: #ffffff;margin-bottom: 5px;font-weight: 100;">
                                        <strong><a class="text-white" href="/tag/{{$tag}}">{{$tag}}</a></strong>
                                    </div>

                                @endforeach
                            </div>
                            <h3 class="mb-0">{{$book->title}}</h3>
                            <div class="mb-1 text-muted">publication date: {{$book->publication_date}}</div>
                            <p class="card-text mb-auto">{{$book->description}}.</p>
                            <div class="mb-1 text-muted">Author: {{$book->Author->name}}</div>
                            <div class="mb-1 text-muted">Publisher: {{$book->publisher->name}}</div>
                            <strong class="d-inline-block mb-2 text-primary">Price:{{$book->price}}$</strong>
                            {{--{{dd($book->discount->pluck('name'))}}--}}
                            @foreach($book->discount->pluck('value') as $discount )
                                <strong class="d-inline-block mb-2 text-danger">Discount: {{$discount}}%</strong>
                            @endforeach

                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="250" height="350"
                                 xmlns="http://www.w3.org/2000/svg"
                                 preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
                                 aria-label="Placeholder: Thumbnail"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Book Cover</text>
                            </svg>
                        </div>
                    </div>
                </div>

            </div><!-- /.blog-main -->
        </div>
    </div>
@endsection
@section('footer')

@endsection