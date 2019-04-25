<!DOCTYPE html>

<html lang="pt-br">
    <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta name="csrf-token" content="{{csrf_token() }}">
       @hasSection('custom_head') 
          @yield('custom_head')
       @endif


       <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />
       <link rel="stylesheet" href="{{ asset('/css/FontAwesome/all.css') }}"/>
       <link rel="stylesheet" href="{{ asset('/css/default.css') }}" />
       @hasSection('custom_css')
          @yield('custom_css')
       @endif
    </head>
    <body>
        <div class="container">
           <main role="main">
              @hasSection('content')
                 @yield('content')
              @endif
           </main>
        </div>

        
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/FontAwesome/all.js') }}"></script>
        @hasSection('custom-js')
          @yield('custom_js')
        @endif

    </body>
</html>

