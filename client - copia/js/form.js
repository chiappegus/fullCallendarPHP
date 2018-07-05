$(function() {
    function gustavo() {
        document.write('<select class="js-example-basic-single" name="state"><option value="AL">Alabama</option> <option value="WY">Wyoming</option> </select>');
    }
    $('#formulario').submit(function(event) {
        event.preventDefault();
        checkContrasena();
    })
})

function checkContrasena() {
    var contrasena = $('#contrasena').val();
    var repContrasena = $('#contrasenaRepetida').val();
    if (contrasena === repContrasena) {
        alert('Las contraseñas  coinciden');
        getDatos();
    } else {
        alert('Las contraseñas no coinciden')
    }
}

function getDatos() {
    var form_data = new FormData();
    form_data.append('nombre', $('#nombre').val());
    console.log(form_data.get('nombre'));
    form_data.append('email', $('#email').val());
    form_data.append('contrasena', $('#contrasena').val());
    sendForm(form_data);
}

function sendForm(formData) {
    console.log('Con JSON.stringify: ' + formData.get('nombre') + " " + formData.get('email') + " " + formData.get('contrasena'));
    $.ajax({
        url: '../server/create_user.php',
        dataType: "json",
        cache: false,
        processData: false,
        contentType: false,
        data: formData,
        type: 'POST',
        success: function(php_response) {
            if (php_response.msg == "exito en la inserción") {
                window.location.href = 'main.php';
            } else {
                alert(php_response.msg);
            }
        },
        error: function() {
            alert("error en la comunicación con el servidor");
        }
    })
}