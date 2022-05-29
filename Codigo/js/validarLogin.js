document.querySelector('#usuario').addEventListener('keyup', validarUsuario);
document.querySelector('#password').addEventListener('keyup', validarPassword);


//------------------------------------------------------------------------------------------------------------------------------------------//

function validarUsuario() {
    const usuario = document.querySelector('#usuario');
    const expresion = /^[a-zA-Z0-9]{6,20}$/;
  
    if (expresion.test(usuario.value)) {
      usuario.classList.remove('is-invalid');
      usuario.classList.add('is-valid');
      return true;
    } else {
      usuario.classList.add('is-invalid');
      usuario.classList.remove('is-valid');
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
          !validarPassword() 
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