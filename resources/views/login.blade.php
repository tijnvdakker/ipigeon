<!DOCTYPE html >
<html>
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
</head>
<body>   
<div class="form-card">
  <form method="post" action="/login">
    @csrf
    <h1>Welcome to ipigeon!</h1>
    <i class="fas fa-dove"></i><br>
    <label for="username">Username</label><br>
    <input type="text" name="username"><br>
    <label for="username">Password</label><br>
    <input type="password" name="password">
    <button type="submit" value="login"><i class="fas fa-sign-in-alt"></i></button>
    <div class="error">
      <?php   
        if (Session::get('error')) { 

          echo "<span class='las la-exclamation-triangle'></span>" . Session::get('error');
        }
      ?>
      @error('username')
        <?php echo "<span class='las la-exclamation-triangle'></span>" . $message; ?>     
      @enderror
      @error('password')
        <?php echo "<span class='las la-exclamation-triangle'></span>" . $message; ?>
      @enderror
    </div>
  </form> 
</div>  
</body>    
</html> 