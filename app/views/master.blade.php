<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
     {{ HTML::style('css/bootstrap.css'); }}
  </head>
  <body>
        <section>
        	@yield('content')
        </section>
        
        <section>
        	@yield('sidebar')
        </section>
    <script src="http://code.jquery.com/jquery.js"></script>
     {{ HTML::script('js/bootstrap.min.min.js'); }}
  </body>
</html>