/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function emptyCheckValidation(target, status){
    
    var targetVal = document.getElementById(target).value;
    var statusEl = document.getElementById(status);
    
    /**
     * check targetValue Length
     * --------------------------
     */
    if( targetVal.length <= 0){
        
        statusEl.innerHTML = "Empty " + target + ".";
    }else{
        statusEl.innerHTML = " ";
    }
    
}



function formValidation() {
    
    var username = document.registration.username;
    var email = document.registration.email;
    var password = document.registration.password;
    var confirmPassword = document.registration.confirmpassword;
    
    
    if(checkUsername(username))  {  
        //IF VALID EMAIL
        if(ValidateEmail(email)){
            //IF VALID PASSWORD
            if(validCheckPassword(password,5 ,8)){
                //MATCH PASSWORD - CONFIRM PASSWORD
                if(confrimMatchPassword(password, confirmPassword)){
                    
                    succesfullyReg();
                }
            }
        }
    }
    
    return false;
}

/**
 * CHECK USERNAME
 * @param {type} uname
 * @returns {Boolean}
 */
function checkUsername(uname) {
    var letters = /^[A-Za-z]+$/;
    
    if (uname.value.match(letters)) {
        
        return true;
        
    } else {
        
        var usernameStatus = document.getElementById('usernameStatus');
        usernameStatus.innerHTML = "Username must have alphabet characters only";
        uname.focus();
        return false;
    }
}

/**
 * CHECK VALIDATION
 * @param {type} emailAddress
 * @returns {Boolean}
 */
function ValidateEmail(emailAddress) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    if (emailAddress.value.match(mailformat)) {
        
        return true;
        
    } else {
        
        var emailStatus = document.getElementById('emailStatus');
        emailStatus.innerHTML = "You have entered an invalid email address!";
        
        emailStatus.focus();
        return false;
    }
}

/**
 * VALID CHECK PASSWORD
 * @param {string} password
 * @param {int} minLength
 * @param {int} MaxLength
 * @returns {Boolean}
 */
function validCheckPassword(password, minLength, MaxLength){
    
    if(password.value.length < minLength ){
        var passwordStatus = document.getElementById('passwordStatus');
        passwordStatus.innerHTML = "Password length must be greater   " + minLength ;
        
        passwordStatus.focus();
        return false;
        
    }else if(password.value.length > MaxLength ){
        
        var passwordStatus = document.getElementById('passwordStatus');
        passwordStatus.innerHTML = "Password Length is greater than " + MaxLength ;
        
        passwordStatus.focus();
        return false;
        
    }else{
        
        return true;
        
    }
    
}


/**
 * 
 * @param {type} password
 * @param {type} confirmPassword
 * @returns {Boolean}
 */
function confrimMatchPassword(password, confirmPassword){
    
    if( password.value === confirmPassword.value){
        return true;
        
    }else{
        var ConfirmPasswordStatus = document.getElementById('ConfirmPasswordStatus');
        ConfirmPasswordStatus.innerHTML = "Password doesn't matched.";
        
        ConfirmPasswordStatus.focus();
        return false;
    }
}


/**
 * AFTET SUCCESSFULLY REGISTER
 * @returns {undefined}
 */
function emptyFields(){
    
    $('#username').val('');
    $('#email').val('');
    $('#password').val('');
}

/**
 * SUCCESFFULLY REG
 * ----------------------------
 * @returns {undefined}
 */
function succesfullyReg() {
	alert('hello');
	var stdInfo = {
		username: $('#username').val(),
		email: $('#email').val(),
		password: $('#password').val(),
		gender: $('#gender').val(),
                success: 'success',
	};
	
	$.ajax({
		url: 'signup.php',
		data: stdInfo,
                
		success: function(result){
			$('#success').html(result);
			emptyFields();
		}
	});
}



/**========================================
 * CHECK LOGIN WITH EMAIL
 *=========================================
 */

/**
 * CHECK USER EMAIL
 * -----------------------------
 * @param {type} email
 * @param {type} emailStatus
 * @returns {Boolean}
 */
function checkUserEmail(email, emailStatus){
    
    var emailStatus = document.getElementById(emailStatus);
    var emailEl = document.login.email;
    
    if( emailEl.value.length <= 0 ){
        
        emailStatus.innerHTML = "Empty Email Address.";
        emailStatus.focus();
        
    }else{
        
        emailStatus.innerHTML = "";
        emailStatus.focus();
        
        if( checkEmailExists(emailEl)){
                emailStatus.innerHTML = "Email Exist.";
                emailStatus.focus();
            }else{
                emailStatus.innerHTML = "";
                emailStatus.focus();
            }
        
    }
    
    
    
    
}



/**
 * CHECK EMAIL EXIST OR NOT
 * -----------------------------
 * @param {type} userEmail
 * @returns {undefined}
 */
function checkEmailExists(userEmail){
    
    var email = userEmail.value;
//    alert(email);
        
    var stdInfo = {
    	email: email,
        success: 'check',
    };
	
    $.ajax({
        type: 'post',
        url: 'login.php',
	data: stdInfo,
                
                
        success: function(result){
            $('#success').html(result);
                      
            if( result === 'Invalid Email Address'){
                //mark the input field.
                $('#success').html("");
                $('#email').css("border", "1px solid red"); 
                          
                return false;
            }else{
                        
                //mark the input field.
                $('#success').html("Email Exist");
                $('#email').css("border", "1px solid green");
                
                return false;
                
            }
                        
        }
        
    });
}



function successfullyLogin(){
    
    var email = document.login.email.value;
    var password = document.login.password.value;
    
    var errorList = document.getElementById('errorList');
    
    var stdInfo = {
    	email: email,
    	password: password,
        success: 'check',
    };
	
    $.ajax({
        type: 'post',
        url: 'login.php',
	data: stdInfo,
                
                
        success: function(result){
            $('#success').html(result);
             
                        
        }
        
    });
}







//
//function checkPasswordMatch(password, confrimPassword){
//    
//    var passwordVal = document.getElementById(password).value;
//    var confirmPasswordVal = document.getElementById(confrimPassword).value;
//    var validPassword = document.getElementById('validPassword');
//    var passwordStatus = document.getElementById('passwordStatus');
//    
//    
//    if( passwordVal.length > 0 ){
//        
//        validPassword.innerHTML = "";
//        if(passwordVal !== confirmPasswordVal){
//            validPassword.innherHTML = "MisMatch";
//            
//        }else{
//            
//            validPassword.innherHTML = "Matched";
//        }
//    }else{
//        //console.log('invalid');
//        passwordStatus.innerHTML = "Please type password first.";
//        
//    }
//    
//    console.log(confirmPasswordVal);
//    
//    
//}


/***************************************************
            STORE CREATE VALIDATION
        ----------------------------------
****************************************************/






function createStoreValidation(){
    
    var storeName = document.createStore.store_name,
        storeLocation = document.createStore.location,
        username = document.createStore.name,
        email = document.createStore.email,
        password = document.createStore.owner_password,
        confirmPassword = document.createStore.confirm_owner_password;
        
        
        alert('first');
    
        
       if(ValidateEmail(email)){
           
           //IF VALID PASSWORD
            if(validCheckPassword(password,5 ,8)){
                //MATCH PASSWORD - CONFIRM PASSWORD
                if(confrimMatchPassword(password, confirmPassword)){
                    alert(' Valid');
                    succesful();
                }
            }
       }
            
            
    return false;
    
    
}


function succesful(){
    alert('success');
    var storename = document.createStore.store_name.value,
        location = document.createStore.location.value,
        username = document.createStore.name.value,
        email = document.createStore.email.value,
        password = document.createStore.owner_password.value;
//    var errorList = document.getElementById('errorList');
    
    var stdInfo = {
        storename: storename,
        location: location,
        username: username,
        email: email,
    	password: password,
        success: 'check'
    };
	
    $.ajax({
        type: 'post',
        url: 'create_store.php',
	data: stdInfo,
                
               
        
        
        success: function(result){
            $('#success').html(result);
                      
            if( result === "inserted"){
                //mark the input field.
                $('#success').html("Inserted successfully."); 
                
                return false;
            }else{
                        
                $('#success').html("Not Inserted.");
                
                return false;
             
                        
            }
        }
        
    });
}


function checkStoreName(storeName, storeNameStatus){
    //    console.log(storeName);

    var storeNameStatus = document.getElementById(storeNameStatus);
    var storeEl = document.createStore.store_name;
    
    if( storeEl.value.length <= 0 ){
        
        storeNameStatus.innerHTML = "Empty store name.";
        storeNameStatus.focus();
        
    }else{
        
        storeNameStatus.innerHTML = " ";
        storeNameStatus.focus();
        
        if( checkStoreExists(storeEl)){
                storeNameStatus.innerHTML = "Store name exist.";
                storeNameStatus.focus();
            }else{
                storeNameStatus.innerHTML = "";
                storeNameStatus.focus();
            }
        
    }
        
}


function checkStoreExists(storeName){
    var storeNameStatus = document.getElementById('storeNameStatus');
    var right = document.getElementById('str-name-right');
    var wrong = document.getElementById('str-name-wrong');
    
    var storename = storeName.value;
//    alert(storename);
        
    var stdInfo = {
    	store_name: storename,
        success: 'check',
    };
	
    $.ajax({
        type: 'post',
        url: 'create_store.php',
	data: stdInfo,
                
                
        success: function(result){
//            $('#success').html(result);
                      
            if( result === 'store exist'){
                
                //mark the input field.
                $(right).css('display','none');
                $(wrong).css('display','block');
                $('#store_name').css("border", "1px solid red"); 
                
                
//                return false;
            }else{
                      
                //mark the input field.
                $(wrong).css('display','none');
                $(right).css('display','block');
                $('#store_name').css("border", "1px solid green");
                          
//                return false;
                
            }
                        
        }
        
    });
}

