let inputs = document.getElementsByClassName("validate")
for(let i=0; i < inputs.length; i++) {
    inputs[i].addEventListener("invalid", check)
    inputs[i].addEventListener("input", reset)
}


    document.getElementById("regform").addEventListener("submit", checkPassword)


function check(e) {
    this.classList.add("error")
    document.getElementById("error").innerText = "Поля обязательны к заполнению"
    document.getElementById("error").style.display = "block"
    e.preventDefault()
}

function reset() {
    this.classList.remove("error")
}

function checkPassword(e) {
    document.getElementById("error").style.display = "none"
    let password = document.getElementById("password").value
    let confirm = document.getElementById("confirm").value
    if(password != confirm) {
        document.getElementById("error").innerText = "Пароли не совпадают"
        document.getElementById("error").style.display = "block"
        e.preventDefault()
    }

    let flag = document.getElementById("pd").checked
    if(!flag){
        document.getElementById("error").innerText = "Примите согласие на обработку ПД"
        document.getElementById("error").style.display = "block"
    e.preventDefault()
    }
    e.preventDefault()
    checkLogin()
}

async function checkLogin() {
    let data = new FormData()
    let login = document.getElementById("login").value
    data.append('login', login)
    let response = await fetch('checklogin.php',{
        method: "POST",
        body: data
    })
    let result = await response.json()
    if(result.status == "error"){
        document.getElementById("error").innerText = result.message
        document.getElementById("error").style.display = "block"
    } else {
        document.getElementById("regform").submit()
    }
}