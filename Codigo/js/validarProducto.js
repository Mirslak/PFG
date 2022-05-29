document.querySelector('#nombre').addEventListener('keyup', validarNombre);
document.querySelector('#precio').addEventListener('keyup', validarPrecio);
document.querySelector('#marca').addEventListener('keyup', validarMarca);
document.querySelector('#descripcion').addEventListener('keyup', validarDescripcion);
//------------------------------------------------------------------------------------------------------------------------------------------//

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
  function validarDescripcion() {
    const descripcion = document.querySelector('#descripcion');
    const expresion = /^[a-zA-Z á é í ó ú ÿ\u00f1\u00d1']{3,50}$/;
    if (expresion.test(descripcion.value)) {
      descripcion.classList.remove('is-invalid');
      descripcion.classList.add('is-valid');
      return true;
    } else {
      descripcion.classList.add('is-invalid');
      descripcion.classList.remove('is-valid');
      return false;
    }
  }

  function validarPrecio() {
    const precio = document.querySelector('#precio');
    const expresion = /^[0-9]{1,4}$/;
    if (expresion.test(precio.value)) {
      precio.classList.remove('is-invalid');
      precio.classList.add('is-valid');
      return true;
    } else {
      precio.classList.add('is-invalid');
      precio.classList.remove('is-valid');
      return false;
    }
  }

  function validarMarca(){
    const marca = document.querySelector('#marca');
    const expresion = /^[a-zA-Z á é í ó ú ÿ\u00f1\u00d1']{3,255}$/;
    if(expresion.test(marca.value)) {
      marca.classList.remove('is-invalid');
      marca.classList.add('is-valid');
      return true;
    } else {
      marca.classList.add('is-invalid');
      marca.classList.remove('is-valid');
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
          !validarNombre() ||
          !validarPrecio() ||
          !validarMarca() ||
          !validarDescripcion() 
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