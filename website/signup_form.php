<?php include_once 'header.php' ?>

 

<body>
    <div class="signup">
        <h1>Sign up</h1>

        <?php

if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "<p style='color:red;'> Fill in all fields! </p>";
    }
    else if($_GET["error"] == "invalidemail"){
        echo "<p> no Email! </p>";
    }
    else if($_GET["error"] == "passwordsnotmatch"){
        echo "<p> no password! </p>";
    }
    else if($_GET["error"] == "usernametaken"){
        echo "<p> username taken! </p>";
    }
    else if($_GET["error"] == "stmtfailed"){
        echo "<p> sometghin went wrong </p>";
    }else if($_GET["error"] == "none"){
        echo "<p> you have sign up! </p>";
    }
}?>
    
        <form id="form" action="config/signup.php" method="POST">
            <div class="inputbox">
                <label for="Username"></label>
                <input type="text" id="Username" name="username" placeholder="Username" >  
             </div>
            <div class="inputbox">
                <label for="fullname"></label>
                <input type="text" id="fullname" name="full_name" placeholder="Name">
            </div>
            <div class="inputbox">
                <label for="Email"></label>
                <input type="text" id="Email" name="email" placeholder="Email" onkeyup="validateEmail()">
                <span id="emailError"></span>
            </div>
            <div class="inputbox">
                <label for="Password"></label>
                <input type="password" id="Password" name="password" placeholder="Password" onkeyup="passwordStrength()">
            </div>
            <div class="inputbox">
                <label for="password2"></label>
                <input type="password" id="password2" name="password_confirmation" placeholder="Confirm password"
                    onkeyup="validatePassword()">
                <span id="message"></span>
            </div>

           <button type="submit" class="signup-btn" name = "submit">Sign up</button> 

            <div class="no" id="pswConfirmation">
                <p id="char">At least 8 characters</p>
                <p id="uppercase"> At least one uppercase letter</p>
                <p id="lowercase"> At least one lowercase letter</p>
                <p id="number"> At least one number</p>
                <p id="specialChar">At least one special character</p>
            </div>
        </form>
        
    
    </div>
    
    <script>

        var psw = document.getElementById("Password");
        var char = document.getElementById("char");
        var upperC = document.getElementById("uppercase");
        var lowerC = document.getElementById("lowercase");
        var number = document.getElementById("number");
        var specialC = document.getElementById("specialChar");

        psw.onfocus = function () {
            document.getElementById("pswConfirmation").style.display = "block";
        }
        psw.onblur = function () {
            document.getElementById("pswConfirmation").style.display = "none";
        }

        function passwordStrength() {

            var upperCase = /[A-Z]/g;
            var lowerCase = /[a-z]/g
            var num = /[0-9]/g;
            var specialChar = /[\W]/g;

            if ((psw.value.length >= 8)) {
                char.classList.add("valid");
                char.style.color = "green"
            }
            else {
                char.classList.remove("valid");
                char.style.color = "red"
            }

            if (psw.value.match(upperCase)) {
                upperC.classList.add("valid");
                upperC.style.color = "green"
            }
            else {
                upperC.classList.remove("valid");
                upperC.style.color = "red"
            }

            if (psw.value.match(lowerCase)) {
                lowerC.classList.add("valid");
                lowerC.style.color = "green"
            }
            else {
                lowerC.classList.remove("valid");
                lowerC.style.color = "red"
            }

            if (psw.value.match(num)) {
                number.classList.add("valid");
                number.style.color = "green"
            }
            else {
                number.classList.remove("valid");
                number.style.color = "red"
            }

            if (psw.value.match(specialChar)) {
                specialC.classList.add("valid");
                specialC.style.color = "green"
            }
            else {
                specialC.classList.remove("valid");
                specialC.style.color = "red"
            }
        }

        function validatePassword() {

            var psw2 = document.getElementById("password2").value;
            var span = document.getElementById("message");
            if (psw2.length == ""){
                span.innerHTML = "Confirmation password is required";
                span.style.color = "red";
            }
            else if(psw.value == psw2){
                span.innerHTML = "password matches";
                span.style.color = "green";
            }
            else {
                span.innerHTML = "password does not match";
                span.style.color = "red";
                return false;
            }
        }

        function validateEmail() {

            var email = document.getElementById("Email").value;
            var expression = /^[A-Za-z\._\-0-9]*@[A-Za-z]*\.[a-z]/;
            var span = document.getElementById("emailError");

            if(email.length == "" ){
                span.innerHTML = "Email is required";
                span.style.color = "red";
              }else if (!email.match(expression)){
                span.innerHTML = "Email is invalid";
                span.style.color = "red";
            }else{
                span.innerHTML = "Email is valid";
                span.style.color = "green" ;
            }
        } 












    </script>
</body>

 