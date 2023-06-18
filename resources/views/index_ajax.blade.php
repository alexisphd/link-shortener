<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LinkShorter</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<div class="row">
    <div class="col-12 text-center mt-4 mb-3 form-group container-fluid">
        <h3>Сервис по сокращению ссылок</h3>
    </div>
</div>

<div class="row">
    <div class="col-12">
            <div class="form-group container-fluid">
                <label for="full_link">Ваша ссылка</label>
                <input class="form-control" type="text" id="full_link" name="full_link">
                @error('full_link')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group container-fluid">
                <button class="btn btn-outline-warning mt-3" id="shorting_button">Сократить ссылку</button>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group container-fluid table-responsive">
        <table class="table mt-3 table-striped" id="links_table">
            <thead class="text-center">
            <tr>
            <th>Номер</th>
            <th>Ссылка</th>
            <th>Сокращенная ссылка</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    </div>
</div>

@include('scripts.load')
@include('scripts.get_table')
@include('scripts.add_link')

</body>
</html>
