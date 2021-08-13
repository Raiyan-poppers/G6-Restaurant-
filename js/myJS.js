function validateForm() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  if (username == "") {
    document.getElementById("mytext").innerHTML = "Please enter username";
    return false;
  }
  if (password.length < 5) {
    document.getElementById("mytext").innerHTML = "Please enter password";
    return false;
  }

  if (document.getElementById("red").checked == false && document.getElementById("blue").checked == false) {
    document.getElementById("mytext").innerHTML = "Please select any radio button";
    return false;
  }
}

function validateUsername(value) {
  var log = document.getElementById('username_validation');
  if (value.match(/\s/)) {
    log.innerText = "Username must not contain spaces";
  }
}

function validatePassword(value) {
  var log = document.getElementById('password_validation');
  if (value.match(/\d/) && value.match(/[^\d]/) && value.match(/[^A-Za-z0-9]/)) log.innerText ="";
  else log.innerText = "Pasword must contain at least one character, one digit and one special character";
}

function validatePasswordConfirmation() {
  var password = document.getElementById("password").value;
  var confirmpassword = document.getElementById("confirmpassword").value;

  var log = document.getElementById('password_stat');

  if(password != confirmpassword) log.innerText = "Doesn't Match";
  else log.innerText = "Matched";
}