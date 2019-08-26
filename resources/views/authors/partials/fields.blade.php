<div class='form-group'>
    <label for='first_name'>First name</label>
    {!! Form::text('first_name', Input::get('first_name'), array('default', 'class' => 'form-control', 'required')) !!}
</div>
<div class='form-group'>
    <label for='last_name'>Last name</label>
    {!! Form::text('last_name', Input::get('last_name'), array('default', 'class' => 'form-control', 'required')) !!}
</div>
<div class='form-group'>
    <label for='date_of_birth'>Date of birth</label>
    {!! Form::date('date_of_birth', Input::get('date_of_birth'), array('default', 'class' => 'form-control', 'required')) !!}
</div>
<div class='form-group'>
    <label for='address'>Address</label>
    {!! Form::text('address', Input::get('address'), array('default', 'class' => 'form-control', 'required')) !!}
</div>