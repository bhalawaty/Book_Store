@extends('layouts.app')
@section('header')

@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="/books/create">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="title" required>
                </div>
                <div class="form-group">
                    <input type="text" name="author_name" class="form-control" placeholder="author_name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="publisher_name" class="form-control" placeholder="publisher_name" required>
                </div>

                <div class="form-group">
                    <input type="date" name="publication_date" class="form-control" placeholder="publication_date"
                           required>
                </div>
                <div class="form-group">
                    <input type="text" name="edition" class="form-control" placeholder="edition" required>
                </div>
                <div class="form-group">
                    <input type="number" name="available_quantity" class="form-control" placeholder="available_quantity"
                           required>
                </div>
                <div class="form-group">
                    <input type="number" name="price" class="form-control" placeholder="price" required>
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control" placeholder="description" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

@endsection
@section('footer')

@endsection