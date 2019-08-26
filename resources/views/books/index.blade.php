@extends('layouts.app')




@section('content')

<div class='row'>
    <div class='col-12'>
        <br/>
        <a href='/authors' class='btn btn-info btn-sm' role='button'>Browse authors</a>
        <a href='/books/create' class='btn btn-warning btn-sm float-right' role='button'>Add new book</a>
        <br/><br/>
    </div>
</div>
<div class='row'>
    <div class='col-12'>

        <table class='table table-bordered' id='datatables_books'>
            <thead>
                <tr>
                    <th>Name</th><th>Release date</th><th>Author</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
</div>





@endsection






@section('script')

<script>

    $('#datatables_books').DataTable({
        pageLength: 10,
        serverSide: true,
        processing: true,
        autoWidth: false,
        searching: false,
        ordering: false,
        dom: '<"toolbar">frtip',
        ajax: {
            url: '/books/datatables',
            dataSrc: function (json) {

                return json.results;
            },
            method: 'post',
        },
        columns: [
            {data: 'name'},
            {data: 'release_date'},
            {data: 'author'},
        ],
    });

</script>

@endsection



@section('head')

<style>


</style>

@endsection