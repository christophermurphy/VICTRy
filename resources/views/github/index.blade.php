<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VICTRy Is Mine</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width: 100%;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="{{ asset('js/app.js') }}"></script>

    </head>
    <body>
    <div class="container">
            <div class="content">
                <div class="title">
                    Repos
                </div>
                <div class="links mb-5">
                    <a href="{{ route('fetch') }}">Reload Repos</a>
                </div>
                <div class="container">
                    <div class="accordion" id="accordion">
                    @foreach($repos as $repo)
                        <div class="card">
                            <div class="card-header text-left" id="heading{{ $loop->iteration }}">
                                {{ $repo->name }}
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                                        Details
                                    </button>
                            </div>
                            <div id="collapse{{ $loop->iteration }}" class="collapse" aria-labelledby="heading{{ $loop->iteration }}" data-parent="#accordion">
                                <div class="card-body text-left">
                                    <dl class="row">
                                        <dt class="col-sm-3">ID</dt>
                                        <dd class="col-sm-9">{{ $repo->repo_id }}</dd>
                                        <dt class="col-sm-3">Description</dt>
                                        <dd class="col-sm-9">{{ $repo->description }}</dd>
                                        <dt class="col-sm-3">Created Date</dt>
                                        <dd class="col-sm-9">{{ $repo->created_date }}</dd>
                                        <dt class="col-sm-3">Last Pushed</dt>
                                        <dd class="col-sm-9">{{ $repo->last_push_date }}</dd>
                                        <dt class="col-sm-3">Stars</dt>
                                        <dd class="col-sm-9">{{ $repo->stargazers_count }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
