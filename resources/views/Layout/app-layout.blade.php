<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Login</title>
</head>

 <style>
     body {
         background: linear-gradient(to right, #4facfe, #00f2fe);
         height: 100vh;
         display: flex;
         justify-content: center;
         align-items: center;
     }

     .login-container {
         background: white;
         padding: 30px;
         border-radius: 15px;
         box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
         width: 350px;
     }

     .login-container h2 {
         text-align: center;
         margin-bottom: 20px;
         font-weight: bold;
     }

     .form-control {
         border-radius: 10px;
     }

     .btn-login {
         width: 100%;
         border-radius: 10px;
         background: #4facfe;
         border: none;
     }

     .btn-login:hover {
         background: #00f2fe;
     }

     .forgot-password {
         text-align: right;
     }

 </style>

<body>
   
    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    @if(session('sukses'))
    <script>
        Swal.fire({
            title: "Yess"
            , text: "{{ session('sukses') }}"
            , icon: "success"
        });

    </script>
    @endif

    @if(session('field'))
         <script>
             Swal.fire({
                 title: "Opps"
                 , text: "{{ session('field') }}"
                 , icon: "info"
             });

         </script>

    @endif


</body>
</html>
