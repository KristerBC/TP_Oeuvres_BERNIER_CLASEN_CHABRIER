@if (isset($erreur) and $erreur != "")
<p>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> {{$erreur or ''}}
    </div>
</p>
unset($erreur)
@endif
