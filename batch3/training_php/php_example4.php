<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <h2>Basic Information</h2>

    <label>First Name</label>
    <input type="text" id="first_name" name="first_name"> <br><br>

    <label>Last Name</label>
    <input type="text" id="last_name" name="last_name"> <br><br>

    <label>Email Address</label>
    <input type="text" id="email" name="email"> <br><br>

    <label>Organization</label>
    <input type="text" id="organization" name="organization"> <br><br>

    <label>Destination</label>
    <input type="text" id="designation" name="designation"> <br><br>

    <button id="submit_button">Submit</button>

  
    <script>

        $('#submit_button').click(function(){
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var email = $("#email").val();
            var organization = $("#organization").val();
            var designation = $("#designation").val();
          
            $.ajax({
                url: 'upload_data.php',
                type: 'POST',
                data: {
                    first_name:first_name, 
                    last_name:last_name, 
                    email:email,
                    organization:organization, 
                    designation:designation,
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log("ERROR" +error);
                }
            });
        });

    </script>

</body>
</html>