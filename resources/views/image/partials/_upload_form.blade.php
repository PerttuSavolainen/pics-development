<h2>Lähetä kuva</h2>

<div class="form-group">
    {!! Form::label('upload-file', 'Tiedosto', ['class' => 'sr-only']) !!}
    {!! Form::file('upload-file', ['class' => 'form-control button-pics']) !!}
</div>
<div class="form-group">
    {!! Form::label('alt-text', 'Lyhyt seliteteksti', ['class' => 'sr-only']) !!}
    {!! Form::text('alt-text', null, ['class' => 'form-control button-pics', 'placeholder' => 'Lyhyt seliteteksti']) !!}
</div>
<div class="form-group">
    {!! Form::label('category', 'Kategoria', ['class' => 'sr-only']) !!}
    {!! Form::text('category', null, ['class' => 'form-control button-pics', 'placeholder' => 'Kategoria']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Lähetä', ['class' => 'btn btn-default button-pics']) !!}
</div>