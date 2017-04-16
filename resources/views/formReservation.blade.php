@extends('admin_template')

@section('content')

{!! Form::open(['url' => 'addReservation']) !!}
 /* A compléter */
<div class="col-md-12 well well-sm">
    <center><h1>{{$titreVue or ''}}</h1></center>
    <div class="form-horizontal">
        <div class="form-group">
            <!--<input type="hidden" name="id_oeuvre" value=" /* A compléter */"/>-->
            <label class="col-md-3 control-label">Titre : </label>
            <div class="col-md-3">
                <select class='form-control' name='id_oeuvre' required>
                    <OPTION VALUE=0>Sélectionner un oeuvre</option>
                      @foreach (DB::table('oeuvre')->select('*')->get() as $oeuvre)
                        <option value="{{ $oeuvre->id_oeuvre }}">{{ $oeuvre->titre }}</option>
                      @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Date : </label>
          <div class="input-group date col-md-3" id="datepicker">
              <input type="text" class="form-control" name="date_reservation">
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Adhérent : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbAdherent' required>
                    <OPTION VALUE=0>Sélectionner un adhérent</option>
                      @foreach (DB::table('adherent')->select('*')->get() as $adherent)
                        <option value="{{ $adherent->id_adherent }}">{{ strtoupper($adherent->nom_adherent) . ' ' . $adherent->prenom_adherent}}</option>
                      @endforeach
                </select>
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
             /* A compléter */
        </div>
    </div>
</div>
 /* A compléter */
 /* A compléter */
  @endsection

@push('scripts')
  <script>
    $('#datepicker').datepicker({
      autoclose: true,
      todayHighlight: true
    });
  </script>
@endpush
