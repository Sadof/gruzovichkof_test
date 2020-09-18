<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div id="app">

        <main class="py-3">
            <div class="container w-25 bg-light">
                    <h1 class="text-center">Тестовое задание.</h1>
                    <div>
                        
                        
                        
                    </div>
                    @if (!empty($number))
                        @if ($number->new) 
                            <div class="alert alert-success">
                                ID: {{$number->id}} Number: {{$number->number}}
                            </div>
                        @else
                            <div class="alert alert-success">
                                Number: {{$number->number}}, 
                                Time: {{$number->created_at}}
                            </div>
                        @endif
                    @endif
                    @if (!empty($error))
                        <div class="alert alert-danger">
                              {{$error}}
                        </div>
                    @endif
                
                    <form action='/' method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="justify-center">
                            <p>При нажатие кнопки "New Number" генерируется новое число. Также новое число возможно получить при отправление  <a href="/api/numbers"}}>GET-запроса на API.</a></p>
                            <button type="submit" class="btn btn-primary" name="submit" value="new number">New Number</button>
                            <p>При попытки вывести уже имеющееся число, вводится его ID. При отправке недействительного ID выдается соотвествующая ошибка. Возможна отправка пустого значения, что должно быть запрещено с помощью Js.</p>
                            <p>Значение может быть получено через API с помощью POST-запроса с ключом id по адресу {{(request()->getHost())."/api/numbers"}}, либо <a href="/api/numbers/1"}}>GET-запрос с требуемым id {{(request()->getHost())."/api/numbers/{id}"}}.</a></p>  
                            <div class="form-group w-50">

                      
                                <label for="ID">Number ID</label>
                                <input type="number" class="form-control" id="ID" name="ID" aria-describedby="emailHelp">  
                            </div>
                             <button type="submit" class="btn btn-primary" name="submit" value="search">Submit</button>
                        </div>
                  
                </form>
            
            </div>
        </main>
    </div>
</body>
</html>




