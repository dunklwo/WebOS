

const correctUsername = "admin";
const correctPassword = "123";


document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorElement = document.getElementById('error');


    if (username === correctUsername && password === correctPassword) {
       
        window.location.href = 'home.html';
    } else {
       
        errorElement.textContent = 'Invalid username or password';
    }
});
