<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('style.css')}}">
  <title>Login Admin</title>
</head>

<body>
  <main class="form-signin">
    <form action="/Login_store" method="POST">
      @csrf
      <h1 class="h3 mb-3 fw-bold text-center">Login Admin</h1>
      @if(session()->has('Failed'))
      <div class="alert alert-danger" role="alert">
        {{ session('Failed')}}
      </div>
      @endif
      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success')}}
      </div>
      @endif
      <div class="form-floating">
        <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Your Email</label>
      </div>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
      <div class="form-floating">
        <input type="password" name="password" class="form-control " id="floatingPassword" placeholder="Password"
          required>
        <label for="floatingPassword">Your Password</label>
      </div>
      <button class="w-100 mt-4 btn btn-lg btn-primary" type="submit">Login</button>
      <a href="/Register" class=" mt-2">Dont Have An Account?</a>
    </form>
  </main>





  <script src="{{asset('js/bootstrap.min.js')}}"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>