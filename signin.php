<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your Account</title>
    <link rel="stylesheet" href="css/signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    
<div class="signin-form">
    <form action="" method="post">
        <div class="form-header">
            <h2>Sign in</h2>
            <p>Login to MyChat</p>
        </div>
    
       <div class="form-group">
           <label for="email">Email</label>
           <input type="email" class="form-control" name="email" placeholder="someone@site.com"  required>
       </div>

       <div class="form-group">
           <label for="password">Password</label>
           <input type="password" class="form-control" name="password" placeholder="password" autocomplete="off" required>
       </div>

       <div class="small text-dark">Forgot password ? <a href="forgot_password.php">Click here</a></div>

       <div class="form-group">
           <button type="submit" class="btn btn-success  btn-lg submit" name="sign_in">Sign in</button>
       </div>

       <?php include("signin_user.php");?>
    </form>

    <div class="text-center small" style="color:#67428B;">Don't have an account?  <a href="signup.php">Create One</a></div>
</div>
</body>
</html>