@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-6 offset-2">
        <h1 class="pull-left">Create new author</h1>
    </div>
</div>


{!! Form::open(['route' => 'authors.store']) !!}
<div class="row">

    <div class='col-6 offset-2'>
        @include('partials.errors')
        @include('authors.partials.fields')
    </div>


</div>
<div class='row'>
    <div class='col-6 offset-2 text-center'>
        <button class='btn btn-primary btn-sm' type='submit'>Save author</button>
    </div>
</div>
{!! Form::close() !!}
@endsection


