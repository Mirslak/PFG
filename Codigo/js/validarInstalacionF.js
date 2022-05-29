document.querySelector('#user').addEventListener('keyup', validarUsuario);
document.querySelector('#password').addEventListener('keyup', validarPassword);
document.querySelector('#db').addEventListener('keyup', validarNombre);
document.querySelector('#email').addEventListener('keyup', validarEmail);
//------------------------------------------------------------------------------------------------------------------------------------------//

function validarUsuario() {
    const user = document.querySelector('#user');
    const expresion = /^[a-zA-Z0-9]{6,20}$/;
  
    if (expresion.test(user.value)) {
      user.classList.remove('is-invalid');
      user.classList.add('is-valid');
      return true;
    } else {
      user.classList.add('is-invalid');
      user.classList.remove('is-valid');
      return false;
    }
  }

  function validarPassword() {
    const password = document.querySelector('#password');
    const expresion = /^(?=.{5,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
    if (expresion.test(password.value)) {
      password.classList.remove('is-invalid');
      password.classList.add('is-valid');
      return true;
    } else {
      password.classList.add('is-invalid');
      password.classList.remove('is-valid');
      return false;
    }
  }

  function validarNombre() {
    const db = document.querySelector('#db');
    const expresion = /^[a-zA-Z á é í ó ú ÿ\u00f1\u00d1']{3,20}$/;
    if (expresion.test(db.value)) {
      db.classList.remove('is-invalid');
      db.classList.add('is-valid');
      return true;
    } else {
      db.classList.add('is-invalid');
      db.classList.remove('is-valid');
      return false;
    }
  }

  function validarEmail() {
    const email = document.querySelector('#email');
    const expresion = /^[A-Za-z_0-9.]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}$/;
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

  

  /********************************** Impedimos que se mande el formulario si no hemos validado los campos del formulario **************************************/
(function () {
  const forms = document.querySelectorAll('.needs-validationC');

  for (let form of forms) {
    form.addEventListener(
      'submit',
      function (event) {
        if (
          !form.checkValidity() ||
          !validarUsuario() ||
          !validarNombre() ||
          !validarPassword() ||
          !validarEmail() 
        ) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          form.classList.add('was-validated');
        }
      },
      false
    );
  }
})();