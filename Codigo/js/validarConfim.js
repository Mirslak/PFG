document.querySelector('#token').addEventListener('keyup', validarToken);

function validarToken() {
    const usuario = document.querySelector('#token');
    const expresion = /^[0-9]{5}$/;
  
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