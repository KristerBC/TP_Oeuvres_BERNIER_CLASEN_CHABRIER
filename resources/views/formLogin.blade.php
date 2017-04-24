@extends('admin_template')

@section('content')

{!! Form::open(['url' => 'signIn']) !!}
<div class="col-md-12 well well-md">
    <center><h1>Authentification</h1></center>
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-md-offset-2 col-md-2 control-label">Identifiant : </label>
            <div class="col-md-4">
                <input type="text" name="login" class="form-control" placeholder="Votre identifiant" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-offset-2 col-md-2 control-label">Mot de passe : </label>
            <div class="col-md-4">
                <input type="password" name="pwd" class="form-control" placeholder="Votre mot de passe" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-4 col-md-2 ">
                <button type="submit" class="col-md-4 btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Valider</button>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3">
             @include('error')
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection
@push('scripts')
<script>
 changePage('menuButton_formLogin');
 </script>
 @endpush
