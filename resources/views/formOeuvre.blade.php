@extends('admin_template')

@section('content')
{!! Form::open(['url' => 'addOeuvre']) !!}
<div class="col-md-12 well well-sm">
    <center><h1>{{$titreVue or ''}}</h1></center>
    <div class="form-horizontal">
        <div class="form-group">
            <input type="hidden" name="id_oeuvre" value=" /* A compléter */"/>
            <label class="col-md-3 control-label">Titre : </label>
            <div class="col-md-3">
                <input type="text" name="titre"
                    placeholder="..." value="" class="form-control" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Proprietaire : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbProprietaire' required>
                    <option VALUE=0>Sélectionner un proprietaire</option>
                    @foreach (DB::table('proprietaire')->select('*')->get() as $proprietaire)
                      <option value="{{ $proprietaire->id_proprietaire }}">{{ $proprietaire->nom_proprietaire }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Prix : </label>
            <div class="col-md-3">
                <input type="text" name="prix" value="" placeholder="..." class="form-control"  required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary"
                    onclick="javascript: window.location = ' /* A compléter */';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler
                </button>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
             @include('success')
        </div>
    </div>
</div>
{!! Form::close() !!}
 @endsection
