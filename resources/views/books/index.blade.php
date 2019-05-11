@extends('layouts.app')
@section('content')

    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
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
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <div class="nav d-flex justify-content-between">
                                    @foreach($book->genres->pluck('name') as $tag )
                                        <div style="margin:0 10px 30px;border: solid 1px #227dc7;border-radius: 6px!important;padding:5px; background-color: #227dc7 ;color: #ffffff;margin-bottom: 5px;font-weight: 100;">
                                            <strong><a class="text-white" href="/tag/{{$tag}}">{{$tag}}</a></strong>
                                        </div>

                                    @endforeach
                                </div>

                                <h3 class="mb-0"><a class=" text-dark" href="/books/{{$book->id}}">{{$book->title}}</a>
                                </h3>
                                <div class="mb-1 text-muted">{{$book->publication_date}}</div>
                                <p class="card-text mb-auto">{{$book->description}}.</p>
                                <div class="mb-1 text-muted">Author: {{$book->author_name}}</div>
                                <div class="mb-1 text-muted">Publisher: {{$book->publisher_name}}</div>
                                <strong class="d-inline-block mb-2 text-primary">Price:{{$book->price}}$</strong>

                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="200" height="250"
                                     xmlns="http://www.w3.org/2000/svg"
                                     preserveAspectRatio="xMidYMid slice" focusable="false" role="img"
                                     aria-label="Placeholder: Thumbnail"><title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Book Cover</text>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- /.blog-main -->


            @include('layouts.archives')

        </div><!-- /.row -->

    </main><!-- /.container -->

@endsection

