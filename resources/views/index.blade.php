<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LinkShorter</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
<div class="row">
    <div class="col-12 text-center mt-4 mb-3">
        <h3>Сервис по сокращению ссылок</h3>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="{{route('store')}}"
              method="post">
            @csrf
            @method('post')
            <div class="form-group container-fluid">
                <label for="full_link">Ваша ссылка</label>
                <input class="form-control" type="text" id="full_link" name="full_link">
                @error('full_link')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group container-fluid">
                <button type="submit" class="btn btn-outline-warning mt-3">Сократить ссылку</button>
            </div>
        </form>
    </div>

</div>
@isset($shortedLinks)

<div class="row">
    <div class="col-12">
        <table class="table table-hover text-wrap container-fluid mt-3">
            <thead>
            <th>Номер записи</th>
            <th>Ссылка</th>
            <th>Сокращенная ссылка</th>
            </thead>
            <tbody>
            @foreach($shortedLinks as $links)
                <tr>
                    <td>{{$links->id}}</td>
                    <td class="text-wrap">{{$links->full_link}}</td>
                    <td>{{$links->short_link}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endisset
</div>

</body>

</html>
