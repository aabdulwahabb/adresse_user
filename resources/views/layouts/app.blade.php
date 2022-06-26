<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
  <head>
      <title>People Verwaltung</title>
       <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
       <!-- JavaScripts -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
       <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>

        // set time success message
        setTimeout(function () {
            $("#flashmessage").hide();
        }, 5000);

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
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function Function() {
                var x = document.getElementById("repassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
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
