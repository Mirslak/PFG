$(function(){
    console.log("Jquery esta funcionando.");
    fetchTasks();

    function fetchTasks(){
        $.ajax({
            url: 'ajax/ajaxNoticias.php',
            type: 'GET',
            success: function(response){
                let noticias = JSON.parse(response);
                let template = '';
                noticias.forEach(noticia =>{
                    template += `
                    <img src='../Imagenes/noticias/${noticia.foto}' class='card-img-top' alt='...' style='height:305px;'>
                    <div class='card-body'>
                        <div class=" border border-2 border-danger rounded">
                            <div class="bg-danger text-center " style="height:2rem;">
                                <h5 class='card-title text-white'>${noticia.titulo}</h5>
                            </div>
                            <p class='card-text m-2' style='height:4rem;'>Melilla, ${noticia.fecha}<br>${noticia.descripcion}</p>
                        </div>
                    </div>
                    `
                });
        
                    $('#noticias').html(template);
                }
        });
    }


    //Eliminado momentaneamente
    /*$('#formularioRegistro').submit(function(e){
        const posData ={
            user: $('#user').val(),
            password: $('#password').val(),
            nombre: $('#nombre').val(),
            apellido1: $('#apellido1').val(),
            apellido2: $('#apellido2').val(),
            email: $('#email').val(),
            dni: $('#dni').val(),
            direccion: $('#direccion').val()
            
        };

        $.post('ajaxRegistro.php', posData, function(response){
            console.log(response);
            fetchTasks();

            $('#formularioRegistro').trigger('reset');
        })
        e.preventDefault();
    });*/


});
