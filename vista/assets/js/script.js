$('#modalLogin').on('shown.bs.modal', function () {
    $('#usuario:text').focus();
});

$('#agregarUsuarioModal').on('shown.bs.modal', function () {
    $('#usuario:text').focus();
});

$('#editarUsuarioModal').on('shown.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal

    var nombreUsuario = button.data('name');
    $('#edit_name').val(nombreUsuario);
    //alert(nombreDepartamento);

    var fecha = button.data('fecha');
    $('#edit_fecha').val(fecha);

    var estado = button.data('estado');
    $('#edit_estado').val(estado);

    var rol = button.data('rol');
    $('#edit_rol').val(rol);

    var id = button.data('id');
    $('#edit_id').val(id);
    //alert('El rol es: '+rol);

    $('#edit_name:text').focus();
});

$('#eliminarUsuarioModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal

    var nombreUsuario = button.data('name');
    $('#name').val(nombreUsuario);

    var id = button.data('id');
    $('#id').val(id);
});

$('#editarDepartamentoModal').on('shown.bs.modal', function (event) {
    $('#edit_name:text').focus();
    var button = $(event.relatedTarget); // Button that triggered the modal

    var nombreDepartamento = button.data('name');
    $('#edit_name').val(nombreDepartamento);
    //alert(nombreDepartamento);

    var id = button.data('id');
    $('#edit_id').val(id);
    //alert('El ID es: '+id);
});

$('#agregarDepartamentoModal').on('shown.bs.modal', function (event) {
    $('#nombreDepartamento:text').focus();
});

$('#editarDepartamentoModal2').on('shown.bs.modal', function (event) {
    $('#edit_name:text').focus();
    $(this).draggable({ handle: ".modal-header" });
});

$('#eliminarDepartamentoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    var nombreDepartamento = button.data('name');
    $('#name').val(nombreDepartamento);

    var id = button.data('id');
    $('#id').val(id);
});

$('#eliminarDepartamentoModal2').on('shown.bs.modal', function (event) {
    $(this).draggable({ handle: ".modal-header" });
});

$('#agregarCargoModal').on('shown.bs.modal', function () {
    $('#nombreCargo:text').focus();
});

$('#editarRolModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal

  var nombreRol = button.data('name');
  $('#edit_name').val(nombreRol);
    //alert(nombreDepartamento);

  var descripcion = button.data('desc');
  $('#edit_desc').val(descripcion);

  var id = button.data('id');
  $('#edit_id').val(id)
  //alert('El ID es: '+id);
});

$('#editarCargoModal').on('shown.bs.modal', function (event) {
    $('#edit_name:text').focus();

    var button = $(event.relatedTarget); // Button that triggered the modal
    var nombreCargo = button.data('name');
    $('#edit_name').val(nombreCargo);

    //alert(nombreCargo);
    var id = button.data('id');
    $('#edit_id').val(id);

    //alert('El ID es: '+id);
    $(this).draggable({ handle: ".modal-header" });
});

$('#eliminarCargoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal

    var nombreCargo = button.data('name');
    $('#name').val(nombreCargo);

    var id = button.data('id');
    $('#id').val(id);
});

// $('#editarEmpleadoModal').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget); // Button that triggered the modal
//
//     var nombreEmpleado = button.data('name');
//     $('#edit_name').val(nombreEmpleado);
//     //alert(nombreDepartamento);
//
//     var apellidoEmpleado = button.data('ape');
//     $('#edit_ape').val(apellidoEmpleado);
//     //alert(nombreDepartamento);
//
//     var ci = button.data('ci');
//     $('#edit_ci').val(ci);
//     //alert(nombreDepartamento);
//
//     var sexo = button.data('sexo');
//     $('#edit_sexo').val(sexo);
//
//     var fecha = button.data('fecha');
//     $('#edit_fecha').val(fecha);
//
//     var telefono = button.data('telefono');
//     $('#edit_telefono').val(telefono);
//
//     var direccion = button.data('direccion');
//     $('#edit_direccion').val(direccion);
//
//     var email = button.data('email');
//     $('#edit_email').val(email);
//
//     var cta = button.data('cta');
//     $('#edit_cta').val(cta);
//
//     var nacionalidad = button.data('nacionalidad');
//     $('#edit_nacionalidad').val(nacionalidad);
//
//     var id = button.data('id');
//     $('#edit_id').val(id);
//     //alert('El id del empleado es: '+id);
// });

$('#editarEmpleadoModal2').on('shown.bs.modal', function (event) {
    // $('#edit_name:text').focus();
    $(this).draggable({ handle: ".modal-header" });
    var button = $(event.relatedTarget);

    var nombreDepartamento = button.val();
    $('#edit_depto').val(nombreDepartamento);
});

// Validaciones

$('#nuevoUsuario').validate({
    rules: {
        txtUsuario: 'required',
        txtPassword: 'required',
        txtRol: 'required'
    },

    messages: {
        'txtUsuario': '<span class="text-danger">Falta completar el nombre del usuario \n<span>',
        'txtPassword': '<span class="text-danger">Falta completar la contrasena del usuario \n<span>',
        'txtRol': '<span class="text-danger">Falta completar el rol para el usuario \n<span>'
    }
});//end validate

$('#nuevoCargo').validate({
    rules: {
        'txtNombreCargo': 'required'
    },
    messages: {
       'txtNombreCargo': '<span class="text-danger">Falta completar el nombre del cargo \n<span>'
    }
});

