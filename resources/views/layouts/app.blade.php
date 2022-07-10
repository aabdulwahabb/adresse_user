<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
  <head>
      <title>People Verwaltung</title>
       <meta name="csrf-token" content="{{ csrf_token() }}">

       <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
       <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    </head>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
      <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<!-- Deutsche Sprache-->
      <script>
          $(document).ready(function() {
              $('#dtBasicExample').DataTable( {
                  "language": {
                      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
                  }
              } );
          } );
      </script>
<script>

        // set time success message
        setTimeout(function () {
            $("#flashmessage").hide();
        }, 7000);

        // Basic example
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
</script>

<script>
        //password ein-ausblenden
            function myFunction() {
                var x = document.getElementById("password");
                var d = document.getElementById("repassword");
                if (x.type === "password" && d.type === "password") {
                    x.type = "text";
                    d.type = "text";
                } else {
                    x.type = "password";
                    d.type = "password";
                }
            }
</script>

<!-- Suche Field-->
<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/status') }}",
                data: function (d) {
                    d.activ = $('#activ').val(),
                        d.search = $('input[type="search"]').val()
                }
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
            ]
        });

        $('#activ').change(function () {
            table.draw();
        });
    });
</script>

       <style>
           .field-icon {
               float: right;
               margin-left: -25px;
               margin-top: -25px;
               position: relative;
               z-index: 2;
           }
           .pagination{
               float: right;
               margin-right: 20px;
               margin-top: 5px;
               margin-bottom: 30px;
           }

       </style>
     </head>
     <body>
          @yield('content')
  </body>
</html>
