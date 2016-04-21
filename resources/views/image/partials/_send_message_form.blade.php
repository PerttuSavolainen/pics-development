<h4>Lähetä viesti</h4>

<div class="form-group">
    {!! Form::label('content', 'Viesti', ['class' => 'sr-only']) !!}
    {!! Form::text('content', null, ['class' => 'form-control button-pics', 'placeholder' => 'Viesti...']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Lähetä', ['class' => 'btn btn-default button-pics']) !!}
</div>