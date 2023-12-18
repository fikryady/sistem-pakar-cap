<!doctype html>
<html lang="en" >
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     {{-- CDNJ --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/style2.css">
    <link rel="stylesheet" href="/css/profile.css">

    <title>Sistem Pakar | {{ $title }}</title>
  </head>
  
  <body style="background-image: linear-gradient(to right, #99feff, #8bf8fc, #7df3f9, #6dedf6, #5ce7f3, #4bdff1, #39d8ef, #20d0ed, #00c5eb, #00b9e7, #00ade3, #0aa1dd);
  ">
    @include('partials.navbar')

    

    
<div class="container mt-4">
    @yield('container')
</div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/js/jquery-3.1.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

  </body>
</html>