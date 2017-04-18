@extends('admin_template')

@section('content')

 /* A compléter */

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
              <div class="form-horizontal">
                <div class="form-group">
                    <input type="hidden" name="id_oeuvre" value=" /* A compléter */"/>
                    <label class="col-md-offset-1 col-md-3 control-label">Titre : </label>
                    <div class="col-md-5">
                        <input type="text" name="titre"
                            placeholder="..." value="" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-offset-1 col-md-3 control-label">Proprietaire : </label>
                    <div class="col-md-5">
                        <select class='form-control' name='cbProprietaire' required>
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
                        <input type="text" name="prix" value="" placeholder="..." class="form-control"  required>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                     @include('success')
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
              <button  id="modifyBtn" type="button" class="btn btn-primary pull-left" data-id="" onclick="modifyOeuvre()">Modifier</button>
            </div>

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
              <div class="form-horizontal">
                <div class="form-group">
                    <!--<input type="hidden" name="id_oeuvre" value=" /* A compléter */"/>-->
                    <label class="col-md-offset-1 col-md-3 control-label">Titre : </label>
                    <div class="col-md-5">
                        <select class='form-control' name='id_oeuvre' required>
                            <OPTION VALUE=0>Sélectionner un oeuvre</option>
                              @foreach (DB::table('oeuvre')->select('*')->get() as $oeuvre)
                                <option value="{{ $oeuvre->id_oeuvre }}">{{ $oeuvre->titre }}</option>
                              @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-offset-1 col-md-3 control-label">Date range:</label>

                  <div class="col-md-5 input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="reservation">
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

                <div class="col-md-6 col-md-offset-3">
                    @include('success')
                </div>
            </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default " data-dismiss="modal">Annuler</button>
              <button  id="bookBtn" type="button" class="btn btn-primary pull-left" data-id="" onclick="bookOeuvre()">Réserver</button>
            </div>

          </div>

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->

<div class="container">
  <div class="blanc">
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
      '<span class="glyphicon glyphicon-book" onclick="setSavedOeuvreId(' + data[elm].id_oeuvre + ')" data-toggle="modal" data-target="#modalBookOeuvre" title="Réserver"></span></a>',
      '<span class="glyphicon glyphicon-pencil" onclick="setSavedOeuvreId(' + data[elm].id_oeuvre + ')" data-toggle="modal" data-target="#modalModifyOeuvre" data-placement="top" title="Modifier"></span></a>',
      '<a class="glyphicon glyphicon-trash" onclick="setSavedOeuvreId(' + data[elm].id_oeuvre + ')" data-toggle="modal" data-target="#modalDeleteOeuvre" data-placement="top" title="Supprimer" href="#"></a>'
    ));
  };
  $('#tableOeuvre').DataTable({
    data: arr
  });

  function deleteOeuvre()
  {
    console.log(saved_oeuvreId);
    {{ action('deleteOeuvre') }}
  }

  function setSavedOeuvreId(id){saved_oeuvreId = id;}

  function getSavedOeuvreId(){return saved_oeuvreId};

  </script>
@endpush
