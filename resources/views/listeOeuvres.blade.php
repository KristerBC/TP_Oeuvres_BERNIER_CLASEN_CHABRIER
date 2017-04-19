

@extends('admin_template')

@section('content')
    <!-- modal-deleteOeuvre -->

      <div class="modal" id="modalDeleteOeuvre" role="dialog">
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
              <button  id="deleteBtn" type="button" class="btn btn-danger pull-left" data-id="" onclick="deleteOeuvre()">Supprimer</button>
            </div>

          </div>

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->


    <!-- modal-modifyOeuvre -->

      <div class="modal" id="modalModifyOeuvre" role="dialog">
        <div class="modal-dialog" >

          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modifier l'oeuvre ?</h4>
            </div>

            <div clas="modal-body">
              {!! Form::open(['url' => 'modifyOeuvre']) !!}
                <div class="form-horizontal">
                  <div class="form-group">
                      <input type="hidden" id="modify_idOeuvre" name="id_oeuvre" value=""/>
                      <label class="col-md-offset-1 col-md-3 control-label">Titre : </label>
                      <div class="col-md-5">
                          <input type="text" id="modify_titre" name="titre"
                              placeholder="..." value="" class="form-control" required autofocus>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-offset-1 col-md-3 control-label">Proprietaire : </label>
                      <div class="col-md-5">
                          <select class='form-control' id="modify_idProprietaire" name='cbProprietaire' required>
                              <option VALUE=0>Sélectionner un proprietaire</option>
                              @foreach (DB::table('proprietaire')->select('*')->get() as $proprietaire)
                                <option value="{{ $proprietaire->id_proprietaire }}">{{ $proprietaire->nom_proprietaire }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-offset-1 col-md-3 control-label">Prix : </label>
                      <div class="col-md-5">
                          <input type="text" id="modify_prix" name="prix" value="" placeholder="..." class="form-control"  required>
                      </div>
                  </div>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary pull-left" data-id="">Modifier</button>
            </div>
              {!! Form::close() !!}
          </div>

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->


      <!-- modal-modifyOeuvre -->

      <div class="modal" id="modalBookOeuvre" role="dialog">
        <div class="modal-dialog" >

          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Réserver l'oeuvre ?</h4>
            </div>

            <div clas="modal-body">
              {!! Form::open(['url' => 'addReservation']) !!}
              <div class="form-horizontal">
                <div class="form-group">
                    <input type="hidden" id="book_idOeuvre" name="id_oeuvre" value=""/>
                    <label class="col-md-offset-1 col-md-3 control-label">Titre :</label>
                    <div class="col-md-5 input-group">
                      <div class="input-group-addon">
                        <span id="book_titre"></span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-offset-1 col-md-3 control-label">Date range:</label>

                  <div class="col-md-5 input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="date_reservation" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label class="col-md-offset-1 col-md-3 control-label">Adhérent : </label>
                    <div class="col-md-5">
                        <select class='form-control' name='cbAdherent' required>
                            <OPTION VALUE=0>Sélectionner un adhérent</option>
                              @foreach (DB::table('adherent')->select('*')->get() as $adherent)
                                <option value="{{ $adherent->id_adherent }}">{{ strtoupper($adherent->nom_adherent) . ' ' . $adherent->prenom_adherent}}</option>
                              @endforeach
                        </select>
                    </div>
                </div>
            </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
              <button  id="bookBtn" type="submit" class="btn btn-primary pull-left" data-id="" onclick="bookOeuvre()">Réserver</button>
            </div>
            {!! Form::close() !!}
          </div>

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->
<div class="container">
  <div class="blanc">
    @include('success')
      <h1>Liste des oeuvres</h1>
  </div>
  <div class="box box-primary">
    <div class="box-header"><h3 class="box-title">Liste des oeuvres</h3></div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="tableOeuvre">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Prénom propriétaire</th>
                    <th>Nom propriétaire</th>
                    <th>Prix</th>
                    <th>Réserver</th>
                    <th>Modifier</th>
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
$('#reservation').datepicker();
  var saved_oeuvreId;
  var data = {!! json_encode(DB::table('oeuvre')->join('proprietaire', 'oeuvre.id_proprietaire', '=', 'proprietaire.id_proprietaire')->select('*')->get()) !!};
  var arr = new Array();
  for(elm in data)
  {
    arr.push(new Array(
      data[elm].titre,
      data[elm].prenom_proprietaire,
      data[elm].nom_proprietaire,
      data[elm].prix,
      '<span class="glyphicon glyphicon-book" onclick="openOeuvreBooker(\'' + data[elm].id_oeuvre + '\', \'' + data[elm].id_proprietaire + '\', \'' + data[elm].titre + '\', \'' + data[elm].prix + '\')" data-toggle="modal" data-target="#modalBookOeuvre" title="Réserver"></span></a>',
      '<span class="glyphicon glyphicon-pencil" onclick="openOeuvreModifier(\'' + data[elm].id_oeuvre + '\', \'' + data[elm].id_proprietaire + '\', \'' + data[elm].titre + '\', \'' + data[elm].prix + '\')" data-toggle="modal" data-target="#modalModifyOeuvre" data-placement="top" title="Modifier"></span></a>',
      '<a class="glyphicon glyphicon-trash" onclick="setSavedOeuvreId(' + data[elm].id_oeuvre + ')" data-toggle="modal" data-target="#modalDeleteOeuvre" data-placement="top" title="Supprimer" href="#"></a>'
    ));
  };
  $('#tableOeuvre').DataTable({
    data: arr
  });

  function openOeuvreModifier(id_oeuvre, id_proprietaire, titre, prix)
  {
    setSavedOeuvreId(id_oeuvre);
    console.log(titre);
    document.getElementById("modify_idOeuvre").value = saved_oeuvreId;
    document.getElementById("modify_titre").value = titre;
    document.getElementById("modify_prix").value = prix;
    var select = document.getElementById("modify_idProprietaire");
    select.value = id_proprietaire;
  }

  function openOeuvreBooker(id_oeuvre, id_proprietaire, titre, prix)
  {
    setSavedOeuvreId(id_oeuvre);
    console.log(titre);
    document.getElementById("book_idOeuvre").value = saved_oeuvreId;
    document.getElementById("book_titre").innerHTML = titre;
    var select = document.getElementById("modify_idProprietaire");
    select.value = id_proprietaire;
  }

  function deleteOeuvre()
  {
    window.location = "deleteOeuvre?id_oeuvre=" + saved_oeuvreId;
  }

  function setSavedOeuvreId(id){saved_oeuvreId = id;}

  function getSavedOeuvreId(){return saved_oeuvreId};

  </script>
@endpush
