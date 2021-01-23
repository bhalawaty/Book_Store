@extends('layouts.app')
@section('content')

    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">add GitHub hook trigger for GITScm polling Title of a longer featured blog
                post </h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="row mb-2">

    </div>


    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    From the Firehose
                </h3>


                @foreach($books as $book)

                    <div class="blog-post">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-354 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <div class="nav d-flex justify-content-between">
                                    <div style="margin:0 10px 30px;border: solid 1px #227dc7;border-radius: 6px!important;padding:5px; background-color: #227dc7 ;color: #ffffff;margin-bottom: 5px;font-weight: 100;">
                                        <strong><a class="text-white"
                                                   href="/tag/{{$book->genre->name}}">{{$book->genre->name}}</a></strong>
                                    </div>


                                </div>
                                <div style=" display: flex;align-items: center">
                                    <div style="flex: 1">
                                        <h3 class="mb-0">
                                            <a class=" text-dark" href="/books/{{$book->id}}">{{$book->title}}</a>
                                        </h3>
                                    </div>
                                    @if(auth()->check())
                                        <div>
                                            <form method="POST" action="/books/{{$book->id}}/favorite">
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

                                <div class="mb-1 text-muted">{{$book->publication_date}}</div>
                                <div class="mb-1 text-muted">Created By: <a
                                            href="/profile/{{{$book->user->name}}}">{{$book->user->name}}</a></div>
                                <p class="card-text mb-auto">{{$book->description}}.</p>
                                <div class="mb-1 text-muted">Author: {{$book->author_name}}</div>
                                <div class="mb-1 text-muted">Publisher: {{$book->publisher_name}}</div>
                                <div style=" display: flex;align-items: center">
                                    <div style="flex: 1">
                                        <strong class="d-inline-block mb-2 text-primary">Price:{{$book->price}}
                                            $</strong>
                                    </div>
                                    <div>
                                        <strong class="d-inline-block mb-2 text-primary">{{$book->reviews_count}} {{str_plural('review',$book->reviews_count)}}</strong>

                                    </div>
                                </div>


                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <div class="col-auto d-none d-lg-block">
                                    <?php
                                    $img = $book->img;
                                    $img = str_replace('\\', '/', $img);
                                    $img = str_replace('public/storage', '', $img);
                                    ?>
                                    <img class="bd-placeholder-img" width="250" height="350"
                                         src="{{ asset("storage/$img") }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$books->links()}}
            </div><!-- /.blog-main -->


            @include('layouts.archives')

        </div><!-- /.row -->

    </main><!-- /.container -->

@endsection

