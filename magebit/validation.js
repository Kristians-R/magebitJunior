const email = document.getElementById("email");
const error = document.getElementById("error");
const tosError = document.getElementById("tosError");
const tos = document.getElementById("check");
const form = document.getElementById("form");
const btn = document.getElementById("send");
let pattern = /^[^ ]+@[^ ]+\.[a-z]{3,3}$/;
let emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

btn.addEventListener("mouseup", (e) => {
  e.preventDefault();
  validation();
});

function validation() {
  const emailValue = email.value.trim();

  if (emailValue === "") {
    error.innerHTML = "Email address is required";
  } else if (!isEmail(emailValue)) {
    error.innerHTML = "Please provide a valid e-mail address";
  } else {
    window.location.href = "add.php";
  }

  if (tos.checked === false) {
    tosError.innerHTML = "You must accept the terms and conditions";
  } else if (tos.checked === true) {
    tosError.innerHTML = " ";
  }
}

function isEmail(email) {
  return /^[^ ]+@[^ ]+\.[a-z]{3,3}$/.test(email);
}

// https://codepen.io/FlorinPop17/pen/OJJKQeK
