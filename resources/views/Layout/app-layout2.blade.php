<!doctype html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>App antrian</title>
</head>
<body style="background-color: rgb(211, 207, 207)">
<nav class="navbar navbar-success bg-success">
    <div class="container">
        {{-- <span class="navbar-brand mb-0 h1 text-white fw-bold">RSU PUTRI BIDADARI</span> --}}
    
    <img src="img/logo2.png" class="img-fluid" alt="..." style="height:50px">


    </div>
  </nav>

   

    @yield('content')
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      function addantrian(id){
       Swal.fire({
       title: "Oops",
       text: "Apakah anda ingin mengantri dipoli ini?",
       icon: "info",
       showCancelButton: true,
       confirmButtonColor: "#3085d6",
       cancelButtonColor: "#d33",
       confirmButtonText: "Yes"
       }).then((result) => {
       if (result.isConfirmed) {
        prosesaddantrian(id)
       }
       });

      }

      function prosesaddantrian(id) {
         $.ajax({
         url : '/addantrian',
         type : 'POST',
         data : {
         id : id,
         id_loket : '{{ session('id_loket') }}',
         _token: '{{ csrf_token() }}'

         },
         success : function (response){
         Swal.fire({
         title: "Yess"
         , text: "Antrian berhasil dibuat"
         , icon: "success"
         });
         }
         });

      }
    </script>
</body>
</html>
