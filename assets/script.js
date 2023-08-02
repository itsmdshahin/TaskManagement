

document.querySelector('form').addEventListener('submit', function (event) {
    var emailInput = document.getElementById('iemail').value;
    var userInput = document.getElementById('iusername').value;
    var password = document.getElementById('ipassword').value;
    var repassword = document.getElementById('irpassword').value;
    var gettheerror = document.getElementById('gettheerrorr');

    // // Regex partten 
    // $user_partten = "/[a-zA-Z _.]{3,20}/";
    // $phone_partten = "/(\+880)?-?01[3-9]\d{8}/";
    // $email_partten = "/^[^\s@]+@ [^\s@]+\.[^\s@]+$/";
    // $pass_pattern = "/((?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$&^%*_+<>])).{6,20}/";

    if (emailInput === '' || userInput === '' || password ==='' || repassword === '') {
        gettheerror.style.display = 'block';
        gettheerror.style.color = 'red';
        gettheerror.textContent = "Please write your email Or User Or Pass!";
        event.preventDefault(); // Prevent form submission
    }
    


});

