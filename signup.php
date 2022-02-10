<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New  Account</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    
<div class="signup-form">
    <form action="" method="post">
        <div class="form-header">
            <h2>Sign Up</h2>
            <p>Fillout this form and start chatting with your friendst</p>
        </div>
    
       <div class="form-group">
           <label for="username">user Name</label>
           <input type="text" class="form-control" name="user_name" placeholder="Example: nethmi"  required>
       </div>

       <div class="form-group">
           <label for="password">Password</label>
           <input type="password" class="form-control" name="user_pass" placeholder="password" autocomplete="off" required>
       </div>

       <div class="form-group">
           <label for="email">Email Address</label>
           <input type="email" class="form-control" name="user_email" placeholder="someone@site.com" required>
       </div>

       <div class="form-group">
           <label for="country">Country</label>
         <select name="user_country" class="form-control" required>
             <option disabled="">Select your country</option>
             <option >Pakistan</option>
             <option >USA</option>
             <option >India</option>
             <option>UK</option>
             <option >Bangladesh</option>
             <option >Fance</option>
         </select>
       </div>

       <div class="form-group">
           <label for="gender">Gender</label>
         <select name="user_gender" class="form-control" required>
             <option disabled="">Select your Gender</option>
             <option >Male</option>
             <option >Female</option>
            
         </select>
       </div>

       <div class="form-group">
           <label for="" class="checkbox-inline"><input type="checkbox" required>
            I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy policy</a>
             </label>

       </div>

       <div class="form-group">
           <button type="submit" class="btn btn-success  btn-lg submit w-100" name="sign_up">Sign Up</button>
       </div>

       <?php include("signup_user.php");?>
    </form>

    <div class="text-center small" style="color:#67428B;">Already  have an account?  <a href="signin.php">Sign  In</a></div>
</div>
</body>
</html>