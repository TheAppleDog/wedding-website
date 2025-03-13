<html>
<head>
<link href="https://fonts.googleapis.com/css?family=PT+Sans|Ubuntu:400,500" rel="stylesheet">
<script src="https://kit.fontawesome.com/741424920c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/login_signup.css">
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="login_signup.js"></script>
</head>
<body>
  <div class="wrapper">
    <div class="background">
      <div class="left">
        <h2 class="back-header">Dont have an account yet?</h2>
        <p class="back-p">Well, you should sign up today!</p>
        <button class="back-btn signup-but">SIGN UP</button>
      </div>
      <div class="right">
        <h2 class="back-header">Do you already have an account?</h2>
        <p class="back-p">Well, let's get you logged in!</p>
        <button class="back-btn login-but">LOGIN</button>
      </div>
    </div>
   <div class="form-container">
            <div class="sign-up">
                <h2 class="form-header">SIGN UP</h2>
                <form method="post" action="validate_signup.php" onsubmit="validateSignUp(event)" autocomplete="off"> 
                   <div class="input-field">
            <input type="text" name="user" placeholder="Full name" required><i class="fa-solid fa-user"></i> 
<span id="username-error" style="color: red; font-size: 12px; display: block;"></span>
          </div>  
             <div class="input-field">
            <input type="email" name="email" placeholder="Email Address" class="email"><i class="fa-solid fa-envelope"></i>
<span id="email-error" style="color: red; font-size: 12px; display: block;"></span>
</div>    
  <div class="input-field">
            <input type="phone" name="phone" placeholder="Phone number" class="phone"><i class="fa-solid fa-phone"></i>
<span id="phone-error" style="color: red; font-size: 12px; display: block;"></span>
</div>
          <div class="input-field">
  <input type="password" name="password" placeholder="Password" class="password"><i class="fas fa-eye password-toggle-btn" onclick="togglePassword('password')" style="vertical-align: middle;"></i>
  <span id="password-error" style="color: red; font-size: 12px; display: block;"></span>
</div> <div class="input-field button">
          <button class="form-btn" name="signup" type="submit">SIGN UP</button><button style="margin-left:170px; background-color:#FC7D5F;width: 150px; height:35px; font-size: 18px; font-family: 'PT Sans'; border: 0; color:white; border-radius: 3px; margin-top:-35px;" class="button" onclick="window.location.href='admin/login.php'">ADMIN LOGIN</button>

        </form>
      </div>
</div>
            <div class="login hide">
                <h2 class="form-header">LOGIN</h2>
                <form method="post" action="" onsubmit="return validateLogin()" autocomplete="off">
                      <input type="text" name="User" placeholder="Full name"><i class="fa-solid fa-user"></i>
                    <div style="position: relative;">  
<input type="password" name="passw" placeholder="Password" required><i class="fas fa-eye" onclick="togglePassword('passw')"></i>
                    </div>
                    <button class="form-btn" name="login" type="submit">LOGIN</button> 
                </form>
            </div>
        </div>
    </div>
 <script>
       function togglePassword(inputId) {
      var passwordInput = document.querySelector(`[name="${inputId}"]`);
      var icon = document.querySelector(`[name="${inputId}"] + i`);

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  function validateSignUp(event) {
        event.preventDefault(); // Prevent the default form submission

        var username = document.querySelector('[name="user"]').value;
        var email = document.querySelector('[name="email"]').value;
        var phone = document.querySelector('[name="phone"]').value;
        var password = document.querySelector('[name="password"]').value;

        // Clear previous error messages
        document.getElementById('username-error').innerText = "";
        document.getElementById('email-error').innerText = "";
        document.getElementById('phone-error').innerText = "";
        document.getElementById('password-error').innerText = "";

        // Perform server-side validation using AJAX
        $.ajax({
            type: "POST",
            url: "validate_signup.php",
            data: { user: username, email: email, phone: phone, password: password },
            success: function (response) {
                if (response === "success") {
                    //$_SESSION['user_name'] = $username; // Storing the username in session
                    // Signup successful
                   window.location.href = "home.php";
                } else {
                    // Display error messages
                    var errors = JSON.parse(response);
                    if (errors.username) {
                        document.getElementById('username-error').innerText = errors.username;
                    }
                    if (errors.email) {
                        document.getElementById('email-error').innerText = errors.email;
                    }
                    if (errors.phone) {
                        document.getElementById('phone-error').innerText = errors.phone;
                    }
                    if (errors.password) {
                        document.getElementById('password-error').innerText = errors.password;
                    }
                }
            }
        });
    }
           function validateLogin() {
    var username = document.querySelector('[name="User"]').value; // Changed variable name to 'username'
    var password = document.querySelector('[name="passw"]').value;

    // Perform server-side validation using AJAX
    $.ajax({
        type: "POST",
        url: "validate_login.php",
        data: { User: username, passw: password }, // Now passing 'username' instead of 'email'
        success: function(response) {
            if (response === "success") {
                //$_SESSION['user_name'] = $username; // Storing the username in session
                // Login successful
                window.location.href = "home.php";
            } else {
                // Login failed
                alert(response); // Display error message
            }
        }
    });

    return false; // Prevent form submission
}
    </script>
    </div>
  </div>
</body>
</html>