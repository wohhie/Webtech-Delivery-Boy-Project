/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * UPLOAD IMAGE
 * @param {type} event
 * @returns {undefined}
 */
var loadFile = function(event) {
    
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };

    reader.readAsDataURL(event.target.files[0]);
};












function enableSubmit(){
    var submitButton = document.getElementById('submit');
    submitButton.disabled = false;
}

function disableSubmit(){
    var submitButton = document.getElementById('submit');
    submitButton.disabled = true;
}


/*  validation check    */
function emptyCheckValidation(target, status){
    //empty or not check
    var targetVal = document.getElementById(target).value;
    var statusEl = document.getElementById(status);
    
    
    if( targetVal.length <= 0){
        
        statusEl.innerHTML = "Field is required.";
        disableSubmit();
        
        return false;
        
    }else{
        statusEl.innerHTML = " ";
        enableSubmit();
        
        return true;
    }
    
}


//-------MATCH PASSWORD
function matchPassword(password, confirmPassword){
    
    
    var password = document.getElementById(password);
    var confirmPassword = document.getElementById(confirmPassword);
    
    var message = document.getElementById('confirmValidPassword');
    
    var goodColor = "#2C925A";
    var badColor = "#ff6666";
    
    
    if(password.value.length > 0 && confirmPassword.value.length > 0){
        if(password.value === confirmPassword.value){
        
            confirmPassword.style.backgroundColor = goodColor;
            confirmPassword.style.color = "#fff";
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!";
            enableSubmit();

        }else{
            confirmPassword.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!";
            disableSubmit();
        }
    }else{
        message.style.color = badColor;
        message.innerHTML = "Field Required";
        disableSubmit();
    }
    
    
    
}



/**
 * 
 * @param {type} username
 * @returns {Boolean}
 */
function usernameValidation(username){
    //cannot contain any spaces
    var letters = /^[A-Za-z]+$/;
    
    if (username.value.match(letters)) {
        
        enableSubmit();
        return true;
        
    } else {
    
        var errorMessage = document.getElementById('errorMessage');
        errorMessage.innerHTML = "Alphabet characters Only";
        username.focus();
        disableSubmit();
        return false;
    }
}


function emailValidation(email){
    //check regular expression - regex
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    if (email.value.match(mailformat)) {
        
        enableSubmit();
        return true;
        
    } else {
        
        var errorMessage = document.getElementById('errorMessage');
        errorMessage.innerHTML = "Invalid email address!";
        disableSubmit();
        email.focus();
        return false;
    }
}

function passwordValidation(password, minLength, MaxLength){
    
    if(password.value.length < minLength ){
        var errorMessage = document.getElementById('errorMessage');
        errorMessage.innerHTML = "Password length must be greater   " + minLength ;
        disableSubmit();
        password.focus();
        return false;
        
    }else if(password.value.length > MaxLength ){
        
        var errorMessage = document.getElementById('errorMessage');
        errorMessage.innerHTML = "Password Length is greater than " + MaxLength ;
        enableSubmit();
        password.focus();
        return false;
        
    }else{
        
        enableSubmit();
        return true;
        
    }
    
}


function confrimMatchPassword(password, confirmPassword){
    
    if( password.value === confirmPassword.value){
        
        enableSubmit();
        return true;
        
    }else{
        var errorMessage = document.getElementById('errorMessage');
        errorMessage.innerHTML = "Password doesn't matched.";
        
        enableSubmit();
        password.focus();
        confirmPassword.focus();
        
        return false;
    }
}


function signupValidation(){
    alert('fixed');
    
    var username = document.registration.username;
    var email = document.registration.email;
    var password = document.registration.password;
    var confirmPassword = document.registration.confirmpassword;
    
    
    if(usernameValidation(username))  {  
        //IF VALID EMAIL
        if(emailValidation(email)){
            //IF VALID PASSWORD
            if(passwordValidation(password,5 ,8)){
                //MATCH PASSWORD - CONFIRM PASSWORD
                if(confrimMatchPassword(password, confirmPassword)){
                    
                    succesfullyReg();
                }
            }
        }
    }
    
    
    return false;
}



/*===========================
        SUCCESSFULLY REG
 =============================*/
function succesfullyReg(){
    
    var stdInfo = {
		username: $('#username').val(),
		email: $('#email').val(),
		password: $('#password').val(),
		gender: $('#gender').val(),
                success: 'success',
	};
	
	$.ajax({
                type: 'POST',
		url: 'signup.php',
		data: stdInfo,
                
		success: function(result){
                    $('#success').html(result);
                    
                    if( result == 'success'){
                        //mark the input field.
                        $('#success').html("Inserted successfully."); 

                        return false;
                    }else if( result == 'failed'){

                        $('#success').html("Not Inserted.");

                        return false;


                    }
		}
	});
}






function checkEmailOnServer(email){
    
    var emailEl = document.getElementById(email);
    var emailStatus = 'emailStatus';
    console.log(emailEl);
    
    if(emptyCheckValidation(email, emailStatus)){
        
        if(emailValidation(emailEl)){
//            alert('Valid Email');
               
                var emailVal = emailEl.value;
                
                alert(emailVal);
    
                var stdInfo = {
                    email: emailVal,
                    success: 'success',
                };

                $.ajax({
                    type: 'POST',
                    url: 'signin.php',
                    data: stdInfo,


                    success: function(result){
                        $('#success').html(result);

                        if( result === 'invalid'){
                            //mark the input field.
                            $('#success').html("");
                            $('#email').css("border", "1px solid red"); 

                            return false;
                        }else{

                            //mark the input field.
                            $('#success').html("invalid");
                            $('#email').css("border", "1px solid green");

                            return false;

                        }

                    }

                });

        }else{
//            alert('Invalid Email');
        }
    }
    
}