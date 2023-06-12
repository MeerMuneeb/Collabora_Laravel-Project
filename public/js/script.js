function hideBtn(){
    alert("Dasdasd")
    var signupBtn = document.querySelector('#signupBtn');
    if (signupBtn) {
        signupBtn.style.display = 'none';
    }

    // Change the label of #loginBtn to "User" and disable it
    var loginBtn = document.querySelector('#loginBtn');
    if (loginBtn) {
        loginBtn.innerHTML = '<span class="glyphicon glyphicon-log-in"></span> User';
        loginBtn.setAttribute('disabled', 'disabled');
    }
}
    