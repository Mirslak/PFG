document.querySelector('#email').addEventListener('keyup', validarEmail);

function validarEmail() {
  const email = document.querySelector('#email');
  const expresion = /^[A-Za-z_0-9]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}$/;
  if (expresion.test(email.value)) {
    email.classList.remove('is-invalid');
    email.classList.add('is-valid');
    return true;

  } else {
    email.classList.add('is-invalid');
    email.classList.remove('is-valid');
    return false;
  }
}