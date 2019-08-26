<div class='form-group'>
    <label for='name'>Name</label>
    {!! Form::text('name', Input::get('name'), array('default', 'class' => 'form-control', 'required')) !!}
</div>
<div class='form-group'>
    <label for='release_date'>Release date</label>
    {!! Form::date('release_date', Input::get('release_date'), array('default', 'class' => 'form-control', 'required')) !!}
</div>
<div class='form-group'>
    <label for='author_id'>Author</label>
    {!! Form::select('author_id', ['' => ''] + $authors->pluck('name', 'id')->toArray(), Input::get('author_id'), array('default', 'class' => 'form-control', 'required')) !!}
</div>