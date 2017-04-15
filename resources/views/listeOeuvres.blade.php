@extends('admin_template')

@section('content')

 /* A compléter */
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
                    <th>Réserver</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
             /* A compléter */
            <tr>
                <!--<td>  /* A compléter */ </td>
                <td>  /* A compléter */ </td>
                <td>  /* A compléter */ </td>-->
                <td style="text-align:center;"><a href=" /* A compléter */">
                    <span class="glyphicon glyphicon-book" data-toggle="tooltip" data-placement="top" title="Réserver"></span></a>
                </td>
                <td style="text-align:center;"><a href=" /* A compléter */">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a>
                </td>
                <td style="text-align:center;">
                    <a class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#"
                        onclick="javascript:if (confirm('Suppression confirmée ?'))
                            { window.location=' /* A compléter */';}">
                    </a>
                </td>
            </tr>
             /* A compléter */
            <BR> <BR>
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
  var data = {!! json_encode(DB::table('oeuvre')->select('*')->get()) !!};
  var arr = new Array();
  for(elm in data)
  {
    arr.push(new Array(
      data[elm].id_proprietaire,
      data[elm].prix,
      data[elm].titre,
      '<span class="glyphicon glyphicon-book" data-toggle="tooltip" data-placement="top" title="Réserver"></span></a>',
      '<span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a>',
      '<a class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#" onclick="javascript:if (confirm(\'Suppression confirmée ?\')) { window.location=\'google.dk\';}"></a>'
    ));
    {
      console.log("hej");
    }
  };
  $('#tableOeuvre').DataTable({
    data: arr
  });
  </script>
@endpush
