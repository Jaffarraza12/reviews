<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

      <!-- Styles -->
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <style>
    @media only screen and (max-width: 720px)  {

      .card{
        margin-bottom: 20px;
      }

      .table{
        display: block;
        overflow: hidden;
        overflow-x: scroll;;
      }

    }
    .switch {
  position: relative;
  display: inline-block;
  width: 55px;
  height: 30px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.btn-primary{margin: auto;text-align: center;width: 100px;display: block;}


    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div class="modal fade" id="viewReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

        <!-- Scripts -->
        <script src="{{ asset(mix('js/app.js')) }}" defer></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
    $(function(){
      setTimeout(function(){
        $('.OpenPop').click(function(){
            type = $(this).data('type')
            id = $(this).data('id')
            elem = $(this)
            ViewPop(type,id,elem)
        })

        $('.checker').click(function(){
            type = $(this).data('type')
            id = $(this).data('id')
            elem = $(this)
            ChangeStatus(type,id,elem)
        })
      },1400)

    })
    function ChangeStatus(type,id,elem){
      sta= 0
      path = ''
      if($(elem).is(':checked')){sta =1} else {sta =0}
      if(type=='review'){
        path = "/public/api/review/"+id
      } else if(type=='question'){
        path = "/public/api/question/"+id
      }
      $.ajax({
      url:path,
      method: "POST",
      data: { 'status': sta,'id':id,'_method':'PUT' }
    }).done(function() {
      $( this ).addClass( "done" );
    });


    }

    function ViewPop(type,id,elem){
      path = ''
      if(type=='review'){
        path = "/public/review/html/"+id
      } else if(type=='question'){
        path = "/public/question/html/"+id
      } else if(type=='complain'){
        path = "/public/complain/html/"+id
      } else if(type=='contact'){
        path = "/public/contact/html/"+id
      } else if(type=='warranty'){
        path = "/public/warranty/html/"+id
      } else if(type=='retailer'){
        path = "/public/retailer/html/"+id
      } else if(type=='Product Register'){
        path = "/public/product-register/html/"+id
      }

       $.ajax({
       url: path,
       method: "GET",
       data: { 'id':id,'_method':'GET' }
     }).done(function(resp) {
       rep = $.parseJSON(resp)
       $('.modal-body').html(rep.html)
       $('#exampleModalLabel').html(type.toUpperCase())
       $('#viewReview').modal('show')

     })


    }

    </script>

</body>
</html>
