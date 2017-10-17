@if (count($errors) > 0)
    <div class="alert alert-danger">
        <span class="glyphicon glyphicon-exclamation-sign"></span>
        <b>Jūsu ievadītajos datos bija nepilnības</b>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif