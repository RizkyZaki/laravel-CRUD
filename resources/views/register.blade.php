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
    <title>Register Admin</title>
</head>

<body>
    <main class="form-signin">
        <form action="{{url('Register')}}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-bold text-center">Please Register</h1>
            <div class="form-floating">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="floatingInput" placeholder="name@example.com" value="{{ old ('email')}}">
                <label for="floatingInput">example@gmail.com</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                    id="floatingInput" placeholder="name@example.com" value="{{ old ('nama_lengkap')}}">
                <label for="floatingInput">Nama Lengkap</label>
                @error('nama_lengkap')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="alamat_lengkap"
                    class="form-control @error('alamat_lengkap') is-invalid @enderror" id="floatingPassword"
                    placeholder="Alamat Lengkap" value="{{ old ('alamat_lengkap')}}">
                <label for="floatingInput">Alamat Lengkap</label>
                @error('alamat_lengkap')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input maxlength="12" type="number" name="no_hp"
                    class="form-control @error('no_hp') is-invalid @enderror" id="floatingPassword"
                    placeholder="Nomor Handphone" value="{{ old ('no_hp')}}">
                <label for="floatingInput">No. HP</label>
                @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="floatingPassword" placeholder="Password" value="{{ old ('password')}}">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="w-100 mt-4 btn btn-lg btn-primary" type="submit">Sign Up</button>
            <a href="/Login" class=" mt-2">Have Account?</a>
        </form>
    </main>





    <script src="{{asset('js/bootstrap.min.js')}}"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>