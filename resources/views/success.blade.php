@if (isset($success) and $success != "")
<p>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> {{$success or ''}}
    </div>
</p>
@endif
