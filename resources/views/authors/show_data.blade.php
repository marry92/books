@extends('layouts.app')




@section('content')


<ul>
    @foreach($authors as $author)
    <li>{{$author->name}}</li>
    @if($author->books->count())
    <ul>
        @foreach($author->books->sortBy('name') as $book)
        <li>{{$book->name}}</li>
        @endforeach
    </ul>
    @endif
    @endforeach
</ul>




@endsection






@section('script')

<script>



</script>

@endsection



@section('head')

<style>


</style>

@endsection