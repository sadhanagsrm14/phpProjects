<!DOCTYPE html>
<html>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;}
      *{box-sizing:border-box}input[type=password],input[type=text]{width:100%;padding:15px;margin:5px 0 22px 0;display:inline-block;border:none;background:#f1f1f1}input[type=password]:focus,input[type=text]:focus{background-color:#ddd;outline:0}hr{border:1px solid #f1f1f1;margin-bottom:25px}button{background-color:#4caf50;color:#fff;padding:14px 20px;margin:8px 0;border:none;cursor:pointer;width:100%;opacity:.9}button:hover{opacity:1}.cancelbtn{padding:14px 20px;background-color:#f44336}.cancelbtn,.signupbtn{float:left;width:50%}.container{padding:16px}.clearfix::after{content:"";clear:both;display:table}

      /* Change styles for cancel button and signup button on extra small screens */
      @media screen and (max-width: 300px) {
        .cancelbtn, .signupbtn {
           width: 100%;
        }
    }
  </style>
    <script src="./js/jquery.min.js"></script>
<script src="./js/jquery.form.js"></script>

<body>

<form action="" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" id="email" name="email">
    <span style="display: none;color: red;" id="emailError">Email Field is required</span>
    <span style="display: none;color: red;" id="availability"></span>
    
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" name="psw">
    <span id="passwordError" style="display: none;color: red;">Password Field is required</span>
    
    <input type="button" name="showPassword" id="showPassword" value="Show Password">
    <br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" id="pswrepeat" name="psw-repeat">
    <span id="rPasswordError" style="display: none;color: red;">Repeat Password Field is required</span>
    
    <span id="rPasswordsameError" style="display: none;color: red;">Repeat Password & Password Field must be same.</span>
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
  <script>
      $(function () {
        
        //Check email is already present into data base or not
        $('#email').on('blur', function (e) {
          var email = $(this).val();
          $.ajax({
            type: 'post',
            url: 'model/check.php',
            data: {email:email},
            success: function (result) {
              $('#availability').css('display','block')
              $('#availability').html(result);
            }
          });
        });

        // Show Hide Password on registration
        $('#showPassword').on('click', function () {
          var getPassword = $('#psw').attr('type');
          if(getPassword == "password"){
            $('#psw').attr('type','text');
            $(this).val('Hide Password');
          }else{
            $('#psw').attr('type','password');
            $(this).val('Show Password');
            
          }
        });
        
        // Save data into login tabel 
        $('form').on('submit', function (e) {
          e.preventDefault();
          var email = $('#email').val();
          var psw = $('#psw').val();
          var pswrepeat = $('#pswrepeat').val();
          if(email == '' && psw == '' && pswrepeat == ''){
            alert('All fields are required.');
          }
          else if(email == ''){
            $('#emailError').css('display','block');
            $('#passwordError').css('display','none');
            $('#rPasswordError').css('display','none');
            $('#rPasswordsameError').css('display','none');
            //alert('Email empty');
            
          }
          else if(psw == ''){
            //alert('psw empty');
            $('#passwordError').css('display','block');
            $('#emailError').css('display','none');
            $('#rPasswordError').css('display','none');
            $('#rPasswordsameError').css('display','none');

          }else if(pswrepeat == ''){
            //alert('repeat password required.');            
            $('#rPasswordError').css('display','block');
            $('#emailError').css('display','none');
            $('#rPasswordsameError').css('display','none');
            $('#passwordError').css('display','none');
          }
          else if(psw != pswrepeat){
            //alert('psw and psw-repeat are not same.');
            $('#rPasswordsameError').css('display','block');
            $('#rPasswordError').css('display','none');
            $('#emailError').css('display','none');
            $('#rPasswordError').css('display','none');
          }
          else{
          $.ajax({
            type: 'post',
            url: 'model/saveRegistration.php',
            data: $('form').serialize(),
            success: function (result) {
              alert(result);
              $('#email').val('');
              $('#psw').val('');
              $('#pswrepeat').val('');
              window.location.href = 'login.php';
            }
          }); 
          }

        });
      });
    </script>
</body>
</html>
