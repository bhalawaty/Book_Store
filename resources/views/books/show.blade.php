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

                                    <div style="margin:0 10px 30px;border: solid 1px #227dc7;border-radius: 6px!important;padding:5px; background-color: #227dc7 ;color: #ffffff;margin-bottom: 5px;font-weight: 100;">
                                        <strong><a class="text-white"
                                                   href="/tag/{{$book->genre->name}}">{{$book->genre->name}}</a></strong>
                                    </div>

                            </div>
                            <div style=" display: flex;align-items: center">
                                <div style="flex: 1">
                                    <h3 class="mb-0">
                                        {{$book->title}}
                                    </h3>
                                </div>
                                @if(auth()->check())
                                    <div>
                                        <form method="POST" action="/{{$book->id}}/favorite">
                                            {{csrf_field()}}
                                            @if($book->isFavorited())
                                                <button class="favorite" type="submit"
                                                        style="border: none; background: none" disabled>
                                                    <i style="color:#ED4956;" class="fas fa-2x fa-heart "></i>
                                                </button>
                                            @else
                                                <button class="favorite" type="submit"
                                                        style="border: none; background: none">
                                                    <i style="color:#55595C" class="fas fa-2x fa-heart "></i>
                                                </button>
                                            @endif

                                        </form>
                                    </div>
                                @endif

                            </div>

                            <div class="mb-1 text-muted">publication date: {{$book->publication_date}}</div>
                            <p class="card-text mb-auto">{{$book->description}}.</p>
                            <div class="mb-1 text-muted">Author: {{$book->author_name}}</div>
                            <div class="mb-1 text-muted">Publisher: {{$book->publisher_name}}</div>
                            <strong class="d-inline-block mb-2 text-primary">Price:{{$book->price}}$</strong>
                            {{--{{dd($book->discount->pluck('name'))}}--}}
                            @foreach($book->discount->pluck('value') as $discount )
                                <strong class="d-inline-block mb-2 text-danger">Discount: {{$discount}}%</strong>
                            @endforeach

                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" width="250" height="350"
                                 src="{{ asset("storage/$book->img") }}">
                        </div>
                    </div>
                </div>

            </div><!-- /.blog-main -->
        </div>
        <div class="row">
            <div class="col-md-12 blog-main">
                <div class="card">
                    <div class="card-header">
                        <h3>Reviews</h3>
                    </div>
                    @foreach($book->reviews as $review )
                        <div class="card-body">
                            <h4 class="card-title">By: <a href="#">{{$review->user->name}}</a>
                                said {{$review->created_at->diffForHumans() }}</h4>
                            <p class="card-text">{{$review->review}}.</p>
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
        <br>
        <hr>
        @if(auth()->check())
            <div class="row">
                <div class="col-md-12 blog-main">
                    <div class="card">
                        <div class="card-header">
                            <h5> Add Reviews</h5>
                        </div>
                        <form action="/books/{{$book->id}}/reviews" method="post">
                            {{csrf_field()}}

                            <div class="form-group">
                                <textarea class="form-control" name="review" id="review"> </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('footer')

@endsection