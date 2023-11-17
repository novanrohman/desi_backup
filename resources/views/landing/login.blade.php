<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style_signup.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="logo-container">
        <img src="images/Logo_biru.png" width="30%" />
        <p>Kami Siap Mendukungmu Dalam Curhatmu, Ayo Bersama Hadapi</p>
        
      </div>

      <form action="{{ route('proses-login') }}" method="post">
        @csrf
        <div class="content-login">
          <div class="input-box-login">
            <label for="email">email</label>
            <input type="email" placeholder="masukkan email" name="email" id="email" autofocus required />
          </div>
          <div class="input-box-login">
            <label for="password">Password</label>
            <input type="password" placeholder="masukkan password" name="password" id="password" autofocus required />
          </div>
        </div>
        <div class="button-container">
          {{-- <button><a href="../penyintas_dashboard/index.blade.php"></a>Selanjutnya</button> --}}
          <button type="submit">Selanjutnya</button>
        </div>
        <div class="note">
          <p>apakah anda belum punya akun? <a href="register">Sign Up</a></p>
        </div>
      </form>
    </div>
  </body>
</html>
