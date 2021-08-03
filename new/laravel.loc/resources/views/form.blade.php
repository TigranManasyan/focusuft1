@extends('layouts.layout')

@section('title, Form')

@section('content')
    <div class="form row text-center">
        <div class="col-6 offset-3">
            <form class="form-signin" id="new_book" action="/new-book" method="POST">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">New Book</h1>
                <label for="author" class="sr-only">Author Name</label>
                <input name="author" type="text" id="author" class="form-control" placeholder="Author Name" required autofocus>
                <label for="book" class="sr-only">Book Name</label>
                <input name="book" type="text" id="book" class="form-control" placeholder="Book Nmae" required>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Add New Book</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
            </form>
        </div>
    </div>
@endsection
