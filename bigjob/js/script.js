let username = document.querySelector("#username");
let email = document.querySelector("#email");
let password = document.querySelector("#password");
let cpassword = document.querySelector("#cpassword");
let formSignUp = document.querySelector("#signup");
let message = document.querySelector("#message");
// laplateforme.io 15 carac

function isSignUp() {
  if (username.value == "") {
    document.getElementById("message").innerText = "Champ username Vide";
    return false;
  } else if (username.value.length < 4) {
    document.getElementById("message").innerText = "username trop court";
    return false;
  } else if (email.value == "") {
    document.getElementById("message").innerText = "Champ Email Vide";
    return false;
  } else if (!email.value.endsWith("@laplateforme.io")) {
    document.getElementById("message").innerText = "Mauvais nom de domaine";
    return false;
  } else if (password.value == "") {
    document.getElementById("message").innerText = "Champ Password Vide";
    return false;
  } else if (cpassword.value == "") {
    document.getElementById("message").innerText =
      "Champ Confirme Password Vide";
    return false;
  } else if (password.value !== cpassword.value) {
    document.getElementById("message").innerText = "Mot de passe different";
    return false;
  } else {
    return true;
  }
}

formSignUp.addEventListener("submit", (e) => {
  if (isSignUp() == false) {
    e.preventDefault();
  }
});
