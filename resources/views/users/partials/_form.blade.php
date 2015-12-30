<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email') !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::text('password') !!}
</div>

<div class="form-group">
    {!! Form::label('role', 'Role:') !!}
    {!! Form::text('role') !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>