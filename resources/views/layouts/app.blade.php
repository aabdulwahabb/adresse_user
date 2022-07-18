<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
  <head>
      <title>People Verwaltung</title>
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

<!--toastr-->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
       <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
       <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

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

<!-- toastr benachrichtigungen -->
<script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>
      <!--error toastr -->
            <script>
                @foreach ($errors->all() as $error)
                toastr.error("{{$error}}")
                @endforeach
          </script>

      <!-- Xentraluser Status ändern -->
      <script>
      $(document).ready(function(){
      $('.toggle-class').change(function () {
      let status = $(this).prop('checked') === true ? 1 : 0;
      let userId = $(this).data('id');
      $.ajax({
      type: "GET",
      dataType: "json",
      url: "{{ url('/users/setting/status') }}",
      data: {'status': status, 'user_id': userId},
      success: function (data) {
          console.log(data.message);
      }
      });
      });
      });
      </script>

      <!-- Password && Repassword Ein und ausblenden -->
      <script>
      //Javascript function definition
      function eyeEnableOrDisable()
      {
      //getting type of the password field element by jQuery
      var x = $('#password').prop("type");
      var y = $('#repassword').prop("type");
      if (x === "password" && y === "password")
      {
        //changing input type text
        $('#password').prop("type", "text");
        $('#repassword').prop("type", "text");
        //removing fa-eye class
        $('#eyeChangeId').removeClass('fa-eye');
        //adding fa-eye-slash class
        $('#eyeChangeId').addClass('fa-eye-slash');
      }
      else
      {
        //changing type passord
        $('#password').prop("type", "password");
        $('#repassword').prop("type", "password");
        //removinf fa-eye-slash class
        $('#eyeChangeId').removeClass('fa-eye-slash');
        //adding fa-eye class
        $('#eyeChangeId').addClass('fa-eye');
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
               position: relative;
               bottom: 0px;
               width: 100%;
           }

       </style>
     </head>
     <body>
          @yield('content')
  </body>
</html>
