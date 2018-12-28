<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Consecutive Prime') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Consecutive Prime</div>

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">                                      
                                            @foreach ($errors->all() as $error)
                                               {{ $error }}
                                            @endforeach
                                    </div>
                                @endif

                                <form class="form-inline" method="GET" action="{{ route('bigprime') }}">
                                    <div class="form-group mb-2">
                                        <label for="staticEmail2" class="">Enter Consecutive Prime Limit</label>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" class="form-control" value="{{ (!empty($limit)) ? $limit : ''  }}" name="limit" id="limit" placeholder="Limit">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </form>
                                <hr />
                                <div class="row">
                                    <div class="col-4">
                                        <b>Big Consecutive Prime</b>
                                    </div>
                                    <div class="col">
                                    <b> {{ (!empty($maxSum)) ? $maxSum . ' = ' : 0 }} </b> {{ (!empty($consecutiveSum)) ? implode(" + ", $consecutiveSum) : '' }}
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-4">
                                        <b>Round</b>
                                    </div>
                                    <div class="col">
                                    <b> {{ (!empty($maxRun)) ? $maxRun : 0 }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
