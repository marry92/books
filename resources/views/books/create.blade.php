@extends('layouts.app')


@section('content')

<div class='row'>
    <div class='col-12'>
        <a href='/books' class='float-right'>Back to books</a>
        <br/>
    </div>
</div>

<div class="row">
    <div class="col-6 offset-2">
        <h1 class="pull-left">Create new book</h1>
    </div>
</div>


{!! Form::open(['route' => 'books.store']) !!}
<div class="row">

    <div class='col-6 offset-2'>
        @include('partials.errors')
        @include('books.partials.fields')
    </div>


</div>
<div class='row'>
    <div class='col-6 offset-2 text-center'>
        <button class='btn btn-primary btn-sm' type='submit'>Save book</button>
    </div>
</div>
{!! Form::close() !!}
@endsection