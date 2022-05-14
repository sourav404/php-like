<?php
session_start();
if ($_SESSION['user'] == false) {
    header('Location: login.php');
}

include('conn.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div class=" container m-5">

        <div id="show"></div>

    </div>

    <script>
        $(document).ready(function() {
            function showdata() {
                $('#show').load('show.php');
            }
            showdata();

            $(document).on('click', '#like', function() {
                var id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "like.php",
                    data: {
                        pid: id,
                    },
                    success: function(response) {
                        showdata();
                    }
                });
            });


        });
    </script>


</body>

</html>