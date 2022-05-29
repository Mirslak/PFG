document.querySelector('#usuario').addEventListener('keyup', validarUsuario);
document.querySelector('#password').addEventListener('keyup', validarPassword);
document.querySelector('#password2').addEventListener('keyup', validarPassword2);
document.querySelector('#nombre').addEventListener('keyup', validarNombre);
document.querySelector('#apellido1').addEventListener('keyup', validarApellido1);
document.querySelector('#apellido2').addEventListener('keyup', validarApellido2);
document.querySelector('#email').addEventListener('keyup', validarEmail);
document.querySelector('#dni').addEventListener('keyup', validarDni);
document.querySelector('#telefono').addEventListener('keyup', validarTelefono);
document.querySelector('#codigoP').addEventListener('keyup', validarCpostal);
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

  function validarPassword2() {
    password1 = document.querySelector('#password');
    password2 = document.querySelector('#password2');
    if (password2.value == password1.value) {
      password2.classList.remove('is-invalid');
      password2.classList.add('is-valid');
      return true;
    } else {
      password2.classList.add('is-invalid');
      password2.classList.remove('is-valid');
      return false;
    }
  }

  function validarNombre() {
    const nombre = document.querySelector('#nombre');
    const expresion = /^[a-zA-Z á é í ó ú ÿ\u00f1\u00d1']{3,20}$/;
    if (expresion.test(nombre.value)) {
      nombre.classList.remove('is-invalid');
      nombre.classList.add('is-valid');
      return true;
    } else {
      nombre.classList.add('is-invalid');
      nombre.classList.remove('is-valid');
      return false;
    }
  }

  function validarApellido1() {
    const apellido = document.querySelector('#apellido1');
    const expresion = /^[a-zA-Z á é í ó ú ÿ\u00f1\u00d1']{4,20}$/;
    if (expresion.test(apellido.value)) {
      apellido.classList.remove('is-invalid');
      apellido.classList.add('is-valid');
      return true;
    } else {
      apellido.classList.add('is-invalid');
      apellido.classList.remove('is-valid');
      return false;
    }
  }

  function validarApellido2() {
    const apellido2 = document.querySelector('#apellido2');
    const expresion = /^[a-zA-Z á é í ó ú ÿ\u00f1\u00d1']{4,20}$/;
    if (expresion.test(apellido2.value)) {
      apellido2.classList.remove('is-invalid');
      apellido2.classList.add('is-valid');
      return true;
    } else {
      apellido2.classList.add('is-invalid');
      apellido2.classList.remove('is-valid');
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

  function validarDni(){
    const dni = document.querySelector('#dni');
    const nif = dni.value.substring(0,8);
      const letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E','T'];
      indice = nif%23;
      if(letras[indice] == dni.value.substring(8,)){
          dni.classList.remove('is-invalid');
      dni.classList.add('is-valid');
      return true;
      } else{
          dni.classList.add('is-invalid');
      dni.classList.remove('is-valid');
      return false;
      }
  }
  

  function validarTelefono() {
    const telefono = document.querySelector('#telefono');
    const expresion = /^[0-9]{9}$/;
    if (expresion.test(telefono.value)) {
      telefono.classList.remove('is-invalid');
      telefono.classList.add('is-valid');
      return true;
    } else {
      telefono.classList.add('is-invalid');
      telefono.classList.remove('is-valid');
      return false;
    }
  }
   function validarCpostal() {
     const codigoP = document.querySelector('#codigoP');
     const expresion = /^[0-9]{5}$/;
     if (expresion.test(codigoP.value)) {
       codigoP.classList.remove('is-invalid');
       codigoP.classList.add('is-valid');
       return true;
     } else {
       codigoP.classList.add('is-invalid');
       codigoP.classList.remove('is-valid');
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
          !validarPassword2() ||
          !validarApellido1() ||
          !validarApellido2() ||
          !validarEmail() ||
          !validarTelefono() ||
          !validarDni() ||
          !validarCpostal()
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