document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("registerForm")) {
        document.getElementById("registerForm").addEventListener("submit", function (e) {
            e.preventDefault();
            let email = document.getElementById("registerEmail").value;
            let password = document.getElementById("registerPassword").value;
            registerUser(email, password);
        })
    }

    if (document.getElementById("loginForm")) {
        document.getElementById("loginForm").addEventListener("submit", function (e) {
            e.preventDefault();
            let email = document.getElementById("loginEmail").value;
            let password = document.getElementById("loginPassword").value;
            loginUser(email, password);
        })
    }

    if (document.getElementById("usersTableBody")) {
        console.log("Deveria mostrar a tabela");        
        displayUsers();
    }

})

function registerUser(email, password) {
    let users = JSON.parse(localStorage.getItem("users")) || [];

    if (users.some(user => user.email === email)) {
        alert("Este email já está cadastrado");
        return;
    }
    
    users.push({ email, password });
    localStorage.setItem("users", JSON.stringify(users));
    window.location.href = "login.html";
}

function loginUser(email, password) {
    let users = JSON.parse(localStorage.getItem("users")) || [];
    let validUser = users.find(user => user.email === email && user.password === password);

    if (validUser) {
        alert("Login realizado com sucesso")
        window.location.href = "access.html"
    } else {
        alert("Email ou senha incorretos")
    }

}

function displayUsers() {
    let users = JSON.parse(localStorage.getItem("users")) || [];
    let usersTableBody = document.getElementById("usersTableBody");

    usersTableBody.innerHTML = ""

    users.forEach((user, index) => {
        let row = `<tr>
        <td>${user.email}</td>
        <td><button class='btn btn-danger' onclick='deletarUser(${index})'>Excluir</button></td>
        </tr>
        `
        usersTableBody.innerHTML += row
    });
}

function deletarUser(index) {
    let users = JSON.parse(localStorage.getItem("users")) || [];
    users.splice(index, 1)
    localStorage.setItem("users", JSON.stringify(users));
    displayUsers();
}

function clearAllUsers() {
    localStorage.removeItem("users")
    displayUsers();
}

function logout() {
    window.location.href = "./login.html"
}