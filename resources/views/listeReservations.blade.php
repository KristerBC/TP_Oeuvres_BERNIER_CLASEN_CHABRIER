@extends('admin_template')

@section('content')
<!-- modal-deleteReservation -->
<div class="modal" id="modalDeleteReservation" role="dialog">
  <div class="modal-dialog" >

    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Supprimer l'oeuvre ?</h4>
      </div>

      <span class="replaceWithBody"></span>

      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
        <button  id="deleteBtn" type="button" class="btn btn-danger pull-left" data-id="" onclick="deleteReservation()">Supprimer</button>
      </div>

    </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<div class="container">
    <div class="blanc">
      @include('success')
        <h1>Liste des réservations</h1>
    </div>
    <div class="box box-primary">
      <div class="box-header"><h3 class="box-title">Liste des oeuvres</h3></div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="tableReservations">
              <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Prénom adhérent</th>
                    <th>Nom adhérent</th>
                    <th>Confirmer</th>
                    <th>Supprimer</th>
                  </tr>
              </thead>

          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-md-offset-3">
         /* A compléter */
    </div>
</div>
 /* A compléter */

@endsection
@push('scripts')
  <script>
  var saved_oeuvreId;
  var data = {!! json_encode(DB::table('reservation')
    ->join('adherent', 'reservation.id_adherent', '=', 'adherent.id_adherent')
    ->join("oeuvre", "oeuvre.id_oeuvre", "=", "reservation.id_oeuvre")->select('*')->get()) !!};
  var arr = new Array();
  for(elm in data)
  {
    var res = data[elm].date_reservation.split("-");
    arr.push(new Array(
      data[elm].titre,
      res[2].substr(0,2)+"/"+res[1]+"/"+res[0],
      data[elm].statut,
      data[elm].prenom_adherent,
      data[elm].nom_adherent,
      '<a href="confirmReservation?id_oeuvre='+data[elm].id_oeuvre+'&date_reservation='+data[elm].date_reservation+'"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Confirmer"></span></a>',
      '<a class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#" data-toggle="modal" data-target="#modalDeleteReservation" data-placement="top" onclick="setSavedReservationId(' + data[elm].id_oeuvre + ')"></a>'
    ));
  };

  $('#tableReservations').DataTable({
    data: arr
  });
  var saved_reservationId;
  function setSavedReservationId(id){saved_reservationId = id;}
  function deleteReservation()
  {
    window.location = "deleteOeuvre?id_reservation=" + saved_reservationId;
  }
  </script>
  @endpush
