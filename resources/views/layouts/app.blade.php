<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
  <head>
      <title>People Verwaltung</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
       @yield('content')
       <!-- JavaScripts -->
       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

<script>
            // Filter Aktive Inaktive
         $(document).ready(function(){

             $(document).on('click', '.relative', function(event){

                 let status = $('#status').children("option:selected").val();

                 if(status === undefined){
                     status = "";
                 }

                 event.preventDefault();
                 let page = $(this).attr('href').split('page=')[1];
                 history.pushState(null,null,'?page=' + page + '&status=' + status );
                 fetch_data(page);
             });

             function fetch_data(page)
             {
                 let _token = $("input[name=_token]").val();
                 let status = $('#status').children("option:selected").val();

                 if(status === undefined){
                     status = "";
                 }

                 $.ajax({
                     url:"/?page=" + page + '&status=' + status,
                     method:"GET",
                     data:{_token:_token, page:page},
                     success:function(data){
                         $('.data').html(data);
                     }
                 });
             }

             $(document).on('change','#status',function(){
                 let status = $(this).val();
                 let page = 1;
                 history.pushState(null,null,'?page=' + page + '&status=' + status );
                 $.ajax({
                     url:"/?page=" + page + '&status=' + status,
                     method:"GET",
                     data:{status:status},
                     success:function(data){
                         $('.data').html(data);
                     }
                 });
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
  </body>
</html>
