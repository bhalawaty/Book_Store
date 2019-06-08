@extends('layouts.app')
@section('header')

@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="/books/create" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="tag_id" class="input-group-text">Options</label>
                        </div>
                        <select name="tag_id" class="custom-select" id="tag_id">
                            <option selected>Choose...</option>
                            @foreach($tags as $tag)
                                <option value={{$tag->id}}>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
                <div class="form-group">
                    <input type="file" name="img" class="form-control" required/>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

@endsection
@section('footer')

@endsection