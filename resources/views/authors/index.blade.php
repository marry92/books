@extends('layouts.app')




@section('content')


<div class='row'>
    <div class='col-12'>

        <br/>
         <a href='/books' target='' class='btn btn-info btn-sm' role='button'>Browse books</a>
        <a href='/authors/show-data' target='' class='btn btn-warning btn-sm float-right' role='button'>Show data</a>
        <br/><br/>
        <table class='table table-bordered' id='datatables_authors'>
            <thead>
                <tr>
                    <th>Author</th><th>Age</th><th>Address</th><th>Books</th><th>Actions</th>
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
    
            $('#datatables_authors').DataTable({
            pageLength: 10,
            serverSide: true,
            processing: true,
            autoWidth: false,
            searching: false,
            ordering: false,
            dom: '<"toolbar">frtip',
            ajax: {
                url: '/authors/datatables',
                dataSrc: function (json) {

                    return json.results;
                },
                method: 'post',
            },
            columns: [
                {data: 'name'},
                {data: 'age'},
                {data: 'address'},
                {data: 'books'},
                {data: 'actions'},
            ],
        });
    
</script>

@endsection



@section('head')

<style>


</style>

@endsection