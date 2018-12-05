// Conexion a ajax por medio de jquery
// Contendra todo el archivo de configuracion por medio de ajax
$(document).ready(function() {
    // Cuando se envie el form de loginForm automaticamente se ejecute el ajax
    $("#loginForm").bind("submit", function () { //.bind captura un evento submit y ejecuta algo
        $.ajax({
            type: $(this).attr("method"),   // Captura el atributo del form, POSt
            url: $(this).attr("action"),    // Obtiene validarCode.php
            data: $(this).serialize(),      // los campos a recuperar
            beforeSend: function () {
                $("#loginForm button[type=submit]").html("Enviando...");
                $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },
            success: function (response) {
                console.log(response);
                if (response.valor === "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Usuario correcto, te estamos redirigiendo...",
                        callback: function () {
                            window.location.href = "admin.php";
                        }
                    });
                } else if (response.valor === "inactivo") {
                    $("body").overhang({
                        type: "warn",
                        message: "Usuario inactivo, contactar a soporte@rrhh.com",
                        duration: 2,
                        overlay: true
                        // closeConfirm: true
                        // upper: true
                    });
                }
                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Usuario o password incorrectos!",
                    overlay: true
                });
                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");

            }
        });
        return false;
    }); // Captura el evento

    // Activa boton si no estan vacios
    $("#loginForm input").keyup(function () {
        var form = $(this).parents("#loginForm");
        var check = checkCampos(form);
        console.log(check);
        if(check) {
            $("#ingresar").prop("disabled", false);
        } else {
            // $("#ingresar").
            $("#ingresar").prop("disabled", true);
        }
    });

    // Funcion a mejorar
    $("#editarRol input").keyup(function () {
        var form = $(this).parents("#editarRol");
        var check = checkCampos(form);
        console.log(check);
        if(check) {
            $("#actualizarRol").prop("disabled", false);
        } else {
            $("#actualizarRol").prop("disabled", true);
        }
    });

    $("#nuevoUsuario input").keyup(function () {
        var form = $(this).parents("#nuevoUsuario");
        var check = checkCampos(form);
        console.log(check);
        if(check) {
            $("#agregar").prop("disabled", false);
        } else {
            // $("#agregar").
            $("#agregar").prop("disabled", true);
        }
    });

    $.extend($.fn.dataTable.defaults, {
        language: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });

    $('#dtDefault').DataTable({
        // "order": [[ 3, "asc" ]] Ordena por la columna 3
    });

    $('#dtRol').DataTable({
        //searching: false,
        //paging: false
        // info: false
    });

    listarDepartamentos();
    listarEmpleados();
    listarAuditoria();
    guardar();
    eliminar();
    agregar();
    var idEmpleado;
    var nombreEmpleado;
    jQuery('[data-toggle="tooltip"]').tooltip();


    $('.cbDepto').change(function () {
        $('.cbEmpleado').empty();
        dpto = $('.cbDepto').val();
        empl = $('.cbEmpleado').val();
        //$("#cardPago").fadeOut(700);
        resetFormPagoDetalle();
        resetearCamposDeduccion();
        $('#idNewDeduccion').removeAttr('disabled');
        listarData(0);
        $.ajax({
            type: 'POST',
            url: 'getEmpleado.php',
            data: 'idDpto='+dpto,
            success: function (response) {
                $('.cbEmpleado').html('<option value="" selected disabled>--Selecciona el empleado--</option>');
                $('.cbEmpleado').append(response);
            }
        });
    });

    $("#listarDeduccion").click(function () {
        $('#cardData').removeAttr('hidden');
    });

    $("#CancelAddDevengo").click(function () {
        resetearCamposDevengo();
        $('#idNewDevengo').removeAttr('disabled');
    });

    $("#CancelAddDeduccion").click(function () {
        resetearCamposDeduccion();
        $('#idNewDeduccion').removeAttr('disabled');
    });

    $('#idDpto').change(function () {
        $('#idEmpleado').removeAttr('disabled');
    });

    $('#idEmpleado').change(function () {
        $('#periodoPago').removeAttr('disabled');
        $('#selectData').removeAttr('disabled');
        $('#idNewDeduccion').removeAttr('disabled');
        $('#idNewDevengo').removeAttr('disabled');
        $('#listarDeduccion').removeAttr('disabled');
        $('#listarDevengo').removeAttr('disabled');
        resetFormPagoDetalle();
        resetearCamposDeduccion();
        listarData(0);
        var selectedOption = this.options[this.selectedIndex];
        idEmpleado = selectedOption.value;
        nombreEmpleado = selectedOption.text;
        //console.log(selectedOption.value + ': ' + selectedOption.text);
        $('#cardData').removeAttr('hidden');
    });

    $('#idNewDeduccion').click(function () {
        //$('#fechaDeduccion').val(hoyFecha());
        $.ajax({
            type: 'POST',
            data: 'opcion='+"getAllDeduccion",
            url: 'getDeduccion.php',
            success: function (response) {
                $('#deduccion').html('<option value="" selected disabled>--Selecciona--</option>');
                $('#deduccion').append(response);
            }
        });
        $('#deduccion').removeAttr('disabled');
        $('#montoDeduccion').removeAttr('disabled');
        $('#fechaDeduccion').removeAttr('disabled').val(hoyFecha());
        $('#obsDeduccion').removeAttr('disabled');
        $('#addDeduccion').removeAttr('disabled');
        $('#listarDeduccion').removeAttr('disabled');
        $('#CancelAddDeduccion').removeAttr('disabled');
        document.getElementById('deduccion').focus();
    });

    $('#idNewDevengo').click(function () {
        //$('#fechaDevengo').val(hoyFecha());
        $.ajax({
            type: 'POST',
            url: 'getDevengo.php',
            // data: 'idEmpl='+empl,
            success: function (response) {
                $('#devengo').html('<option value="" selected disabled>--Selecciona--</option>');
                $('#devengo').append(response);
            }
        });
        $('#devengo').removeAttr('disabled');
        $('#montoDevengo').removeAttr('disabled');
        $('#fechaDevengo').removeAttr('disabled').val(hoyFecha());
        $('#obsDevengo').removeAttr('disabled');
        $('#addDevengo').removeAttr('disabled');
        $('#listarDevengo').removeAttr('disabled');
        $('#CancelAddDevengo').removeAttr('disabled');
        document.getElementById('devengo').focus();
    });

    $("#password_update").bind("submit", function(e) {
        e.preventDefault();
        $.ajax({
            type: $(this).attr("method"),   // Captura el atributo del form, POSt
            url: $(this).attr("action"),    // Obtiene validarCode.php
            data: $(this).serialize(),
            beforeSend: function () {
                $("#password_update button[type=submit]").html("Enviando...");
                $("#password_update button[type=submit]").attr("disabled", "disabled");
            },
            success: function (response) {
                console.log(response);
                if (response.valor === "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Actualizacion satisfactoria, te estamos redirigiendo al index",
                        callback: function () {
                            window.location.href = "cerrar-sesion.php";
                        }
                    });
                } else if (response.valor === "bad") {
                    $("body").overhang({
                       type: "error",
                       message: "Las nuevas contrasenas deben ser iguales"
                       // duration: 2,
                       // overlay: true
                    });
                } else if (response.valor === "false") {
                    $("body").overhang({
                        type: "error",
                        message: "Las credenciales no son correctas",
                        duration: 2,
                        overlay: true,
                        closeConfirm: true
                    });
                }
            }
            // error: function (response) {
            //     if (response.valor === "badPass") {
            //         $("body").overhang({
            //             type: "error",
            //             message: "Las nuevas contrasenas deben ser iguales",
            //             duration: 2,
            //             overlay: true
            //         });
            //     } else if (response.valor === "loginFalse") {
            //         $("body").overhang({
            //             type: "error",
            //             message: "Las credenciales no son correctas",
            //             duration: 2,
            //             overlay: true
            //         });
            //     }
            // }
        });
    });

    $("#agregarDeduccion").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        data = 'idEmpleado='+idEmpleado+'&'+data;
        console.log(data);
        $.ajax({
            method: "POST",
            url: "deduccionRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            if (json_info.respuesta === 'BIEN') {
                resetearCamposDeduccion();
            }
        });
    });

    $("#agregarDevengo").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        data = 'idEmpleado='+idEmpleado+'&'+data;
        console.log(data);
        $.ajax({
            method: "POST",
            url: "devengoRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            if (json_info.respuesta === 'BIEN') {
                resetearCamposDevengo();
            }
        });
    });

    $("#periodoPago").click(function () {
        $('#selectData').removeAttr('disabled');
    });

    $("#actualizarSalario").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method: "GET",
            url: "getSalarioEmpleado.php",
            data: data
        });
        resetFormPagoDetalle();
        listarEmpleados();
    });

    $("#editarContrasena").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            method: "POST",
            url: "passwordUpdate.php",
            data: data,
            success: function (response) {
                console.log(response);
                if (response.valor === "true") {
                    $("body").overhang({
                        type: "success",
                        message: "Contraseña actualizada correctamente",
                        duration: 2,
                        overlay: true
                    });
                }
            }
        });
        $('#editarContrasenaModal').modal('hide');
    });

    // Para calcular automaticamente el monto de ips 9%
    var select = document.getElementById('deduccion');
    var ips;
    if(select) { // Validacion para que no arroje un error con el evento addEventListener
        select.addEventListener('change',
            function(){
                $('#montoDeduccion').val('');
                var selectedOption = this.options[select.selectedIndex];
                ips = selectedOption.text;
                if(ips === 'IPS') {
                    $.ajax({
                        method: "GET",
                        url: "getSalario.php",   // url para la peticion
                        data: "idEmpleado="+idEmpleado
                    }).done(function (info) {
                        var json_info = JSON.parse(info);
                        console.log(json_info);
                        $('#montoDeduccion').val(formatearMoneda((json_info.Salario*9)/100));
                    });
                }
            });
    }


    // DESDE AQUI VAN LOS NUEVOS CAMBIOS PARA LA PRESENTACION DEL PROYECTO DICIEMBRE 2018
    listarData(0);
    $("#idEmpleado").click(function () {
        $('#selectSolicitud').removeAttr('disabled');
    });

    $("#periodoSalario").click(function () {
        $('#liquidar').removeAttr('disabled');
    });


    $("#cabeceraSolicitud").on("submit", function (e) {
        e.preventDefault();
        let id= $("#idEmpleado").val();
        setId(id);
        let data = $(this).serialize();
        console.log(data+'&'+'idEmpleado='+id);

        $('#motivo').removeAttr('disabled');
        $('#fechaDesde').removeAttr('disabled');
        $('#fechaHasta').removeAttr('disabled');
        $('#horaDesde').removeAttr('disabled').val('08:00');
        $('#horaHasta').removeAttr('disabled').val('17:00');
        $('#CancelAddSolicitud').removeAttr('disabled');
        $('#agregar').removeAttr('disabled');

        listarData(id);
    });

    $("#cabeceraLiquidarSalario").on("submit", function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        console.log(data);
        $.ajax({
            method: "POST",
            url: "liquidar_salario_request.php",
            data: data
        }).done(function (info) {
            let json_info = JSON.parse(info);
            console.log(json_info);
            //resetSolicitudDetalle();
            //listarData(id);
        });
    });

    $("#formSolicitudDetalle").on("submit", function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        let motivo     = $("#motivo").val();
        let fechaDesde = $("#fechaDesde").val();
        let fechaHasta = $("#fechaHasta").val();
        let horaDesde  = $("#horaDesde").val();
        let horaHasta  = $("#horaHasta").val();
        let id = getId();
        let datos = 'txtMotivo='+motivo+'&txtFechaDesde='+fechaDesde+'&txtFechaHasta='+fechaHasta+'&txtHoraDesde='+horaDesde+'&txtHoraHasta='+horaHasta+'&idEmpleado='+getId();
        console.log(datos);
        console.log(data+'&idEmpleado='+getId()); // No uso, porque la hora esta con un formato raro
        $.ajax({
            method: "POST",
            url: "solicitudAusencia.php",
            data: datos
        }).done(function (info) {
            let json_info = JSON.parse(info);
            console.log(json_info);
            resetSolicitudDetalle();
            listarData(id);
        });
    });

    $("#fechaDevengo").bootstrapMaterialDatePicker({ weekStart : 1, time: false, lang: 'es' }); //format : 'DD-MM-YYYY'
    $("#fechaDeduccion").bootstrapMaterialDatePicker({ weekStart : 1, time: false, lang: 'es' }); //format : 'DD-MM-YYYY'
    $("#fechaPago").bootstrapMaterialDatePicker({ weekStart : 1, time: false, lang: 'es' }); //format : 'DD-MM-YYYY'
    $("#periodoPago").bootstrapMaterialDatePicker({ weekStart : 1, time: false, lang: 'es' }); //format : 'DD-MM-YYYY'
    $("#periodoSalario").bootstrapMaterialDatePicker({ weekStart : 1, time: false, lang: 'es' }); //format : 'DD-MM-YYYY'
    $("#fechaDesde").bootstrapMaterialDatePicker({ weekStart : 1, time: false, lang: 'es' }); //format : 'DD-MM-YYYY'
    $("#fechaHasta").bootstrapMaterialDatePicker({ weekStart : 1, time: false, lang: 'es' });
    $("#horaDesde").bootstrapMaterialDatePicker({ date: false, shortTime: false, format: 'HH:mm' });
    $("#horaHasta").bootstrapMaterialDatePicker({ date: false, shortTime: false, format: 'HH:mm' });

    function resetSolicitudDetalle() {
        let motivo = $('#motivo').attr('disabled', 'disabled');
        let fechaDesde = $('#fechaDesde').attr('disabled', 'disabled');
        let fechaHasta = $('#fechaHasta').attr('disabled', 'disabled');
        let horaDesde  = $('#horaDesde').attr('disabled', 'disabled');
        let horaHasta  = $('#horaHasta').attr('disabled', 'disabled');
        let cancel     = $('#CancelAddSolicitud').attr('disabled', 'disabled');
        let agg        = $('#agregar').attr('disabled', 'disabled');
        motivo.html('<option value="" selected disabled>Selecciona el motivo</option>');
        fechaDesde.val('');
        fechaHasta.val('');
        horaDesde.val('');
        horaHasta.val('');
    }

    $("#CancelAddSolicitud").click(function () {
        resetSolicitudDetalle();
        $('#selectSolicitud').attr('disabled', 'disabled');
    });

});

var idEmpGlobal;

function checkCampos(obj) {
    var camposRellenados = true;
    obj.find("input").each(function () {
        var $this = $(this);
        if($this.val().length <= 0) {
            camposRellenados = false;
            return false;
        }
    });
    if(camposRellenados === false) {
        return false;
    } else {
        return true;
    }
}

var guardar = function () {
    $("#editarDepartamento").on("submit", function (e) {
        e.preventDefault(); // evita recarga de la page
        var data = $(this).serialize();  // Serializamos los campos del frm
        $.ajax({
            method: "POST",
            url: "departamentoRequest.php",   // url para la peticion
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            if (json_info.respuesta === 'EXISTE') {
                mensajes(json_info);
            } else {
                listarDepartamentos();
                $('#editarDepartamentoModal2').modal('hide');
            }
        });
    });

    $("#editarEmpleado").on("submit", function (e) {
        e.preventDefault(); // evita recarga de la page
        var data = $(this).serialize();  // Serializamos los campos del frm
        $.ajax({
            method: "POST",
            url: "empleadoRequest.php",   // url para la peticion
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            listarEmpleados();
            $('#editarEmpleadoModal2').modal('hide');
        });
    });
};

var agregar = function () {
    $("#agregarEmpleado").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            method: "POST",
            url: "empleadoRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            if (json_info.respuesta === 'EXISTE') {
                mensajes(json_info);
            } else {
                $('#dtEmpleado').DataTable().ajax.reload();
                $('#agregarEmpleado').trigger("reset");
                $('#agregarEmpleadoModal').modal('hide');
                //$('#nombreDepartamento').val("");
            }
            mensajes(json_info);
        });
    });

    $("#nuevoDepartamento").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: "departamentoRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            if (json_info.respuesta === 'EXISTE') {
                mensajes(json_info);
            } else {
                $('#dtDepartamento').DataTable().ajax.reload();
                $('#agregarDepartamentoModal').modal('hide');
                $('#nombreDepartamento').val("");
            }
            mensajes(json_info);
        });
    });

    $("#nuevoDeduccion").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: "deduccionRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            $('#agregarDeduccionModal').modal('hide');
            /*if (json_info.respuesta === 'EXISTE') {
                mensajes(json_info);
            } else {
                $('#dtDepartamento').DataTable().ajax.reload();

                $('#nombreDepartamento').val("");
            }*/
            mensajes(json_info);
        });
    });

    $("#nuevoDevengo").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: "devengoRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            if (json_info.respuesta === 'EXISTE') {
                mensajes(json_info);
            } else {
                $('#agregarDevengoModal').modal('hide');
                $('#nombreDevengo').val("");
            }
            mensajes(json_info);
        });
    });


    $("#cabecera").on("submit", function (e) {
        $("#cardPago").fadeIn(1000);
        e.preventDefault();
        $("#fechaPago").val(hoyFecha());
        var data = $(this).serialize();
        var id;
        console.log(data);
        $.ajax({
            method: "POST",
            url: "getSalario.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            console.log(json_info);
            id = json_info.idEmpleado;

            // Con moneda con formato
            var salario = formatearMoneda(json_info.Salario);
            var totalDeduccion = formatearMoneda(json_info.Deduccion);
            var totalDevengo = formatearMoneda(json_info.Devengo);
            var TotalPercibido = formatearMoneda(json_info.TotalPercibido);
            $("#salario").val(salario);
            $("#totalDeduccion").val(totalDeduccion);
            $("#totalDevengo").val(totalDevengo);
            $("#totalPagar").val(TotalPercibido);

            /*
            // Moneda sin formato
            $("#salario").val(json_info.Salario);
            $("#totalDeduccion").val(json_info.Deduccion);
            $("#totalDevengo").val(json_info.Devengo);
            $("#totalPagar").val(json_info.TotalPercibido);
            */
            var dia = $("#periodoPago").val();
            var year = dia.substring(0,4);
            var mes = dia.substring(5,7);
            var event = new Date(Date.UTC(year,mes));
            var options = { year: 'numeric', month: 'long'};
            $("#mesPago").html(event.toLocaleDateString('es-MX', options).toUpperCase());
            listarData(id);
        });
    });

    $("#formPagoDetalle").on("submit", function (e) {
       e.preventDefault();
       var id = getId();
       var periodo = $("#periodoPago").val();
       var disabled = $(this).find(':input:disabled').removeAttr('disabled');
       var data = $(this).serialize();
       disabled.attr('disabled','disabled');
        data = 'periodo='+periodo+'&'+'idEmpleado='+id+'&'+data;
        console.log(data);
        $.ajax({
           method: "POST",
           url: "pagoSalarioRequest.php",
           data: data
       }).done(function (info) {
           var json_info = JSON.parse(info);
           console.log(json_info);
           resetFormPagoDetalle();
           listarData(id);
       });
    });
};

var eliminar = function () {
    $("#eliminarDepartamento").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method: "POST",
            url: "departamentoRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            listarDepartamentos();
            $('#eliminarDepartamentoModal2').modal('hide');
        });
    });
    $("#eliminarEmpleado").on("submit", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            method: "POST",
            url: "empleadoRequest.php",
            data: data
        }).done(function (info) {
            var json_info = JSON.parse(info);
            listarEmpleados();
            $('#eliminarEmpleadoModal').modal('hide');
        });
    });
};

var listarDepartamentos = function () {
    var table = $('#dtDepartamento').DataTable({
        "destroy": true,
        // pagingType: "first_last_numbers",
        // pageLength: 9,
        // lengthMenu: [ 9, 15, 25, 100 ],
        // sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
        // sDom: "<'row'<'col-sm-12'f>>" +
        // "<'row'<'col-sm-12'tr>>" +
        // "<'row'<'col-sm-6'l><'col-sm-6'p>><'row'<'col-sm-12'i>>"
        // "<'col-sm-12'p<br/>><'row'<'col-sm-12'i>>"
        "ajax": {
            "method": "POST",
            "url": "getdepartamento.php"
        },
        // Columnas con la que vamos a trabajar
        "columns": [
            {"data":"idDepartamento"},
            {"data":"nombreDepartamento"},
            {"sDefaultContent": "<td>\n" +
                "<a class=\"editarDpto\" href=\"#\" data-toggle=\"modal\" data-target=\"#editarDepartamentoModal2\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Editar\" style=\"color: #FFC107;\">edit</i></a>\n" +
                "<a class=\"eliminarDpto\" href=\"#\" data-toggle=\"modal\" data-target=\"#eliminarDepartamentoModal2\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Eliminar\" style=\"color: #F44336;\">delete</i></a>                                    \n" +
                "</td>",
                "className": "text-center"
            }
        ]
    });
    accion_departamento("#dtDepartamento tbody", table);
};

var listarAuditoria = function() {
    var tableAuditoria = $('#dtAuditoria').DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "getAuditoria.php"
        },
        // Columnas con la que vamos a trabajar
        "columns": [
            {"data":"fechaHora"},
            {"data":"usuarioAuditoria"},
            {"data":"accion"},
            {"data":"tabla"},
            {"data":"nombreColumna"},
            {"data":"registroNro"},
            {"data":"nuevaDescripcion"},
            {"data":"antiguaDescripcion"}
        ]
    });
};

var listarEmpleados = function() {
    var tableEmpleado = $('#dtEmpleado').DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "getEmpleado.php"
        },
        "columns": [
            //{data: "ci"},
            {"render":
                    function ( data, type, row ) {
                        var ci = row['ci'];
                        return formatearMoneda(ci);
                    }
            },
            {"render":
                    function ( data, type, row ) {
                        return (row['nombre']+' '+row['apellido']);
                    }
            },
            {data:"nombreDepartamento"},
            {data:"nombreCargo"},
            {data:"estado",
                render: function ( data, type, row) {
                    if(row['estado'] === '1') {
                        return '<td id="empleadoActivo"><span class="badge badge-success">Activo</span></td>'
                    } else {
                        return '<td id="empleadoInactivo"><span class="badge badge-secondary">Inactivo</span></td>'
                    }
                },
                "className": "text-center"
            },
            {sDefaultContent: "<td class=\"text-center\">\n" +
                "<a class=\"editarEmpleado\" href=\"#\" data-toggle=\"modal\" data-target=\"#editarEmpleadoModal2\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Editar\" style=\"color: #FFC107;\">edit</i></a>\n" +
                "<a id=\"desactivarEmpleado\" class=\"eliminarEmpleado\" href=\"#\" data-toggle=\"modal\" data-target=\"#eliminarEmpleadoModal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Eliminar\" style=\"color: #F44336;\">delete</i></a>                                    \n" +
                "</td>",
                "className": "text-center"}
        ]
    });
    var tableSalario = $('#dtSalario').DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "getSalarioEmpleado.php"
        },
        "columns": [
            {data: "ci"},
            {"render":
                    function ( data, type, row ) {
                        return (row['nombre']+' '+row['apellido']);
                    }
            },
            //{data:"salarioFijo"},
            {"render":
                    function ( data, type, row ) {
                        var salary = row['salarioFijo'];
                        var salario = formatearMoneda(salary);
                        return (salario);
                    }
            },
            {sDefaultContent: "<td class=\"text-center\">\n" +
                "<a class=\"editarSalario\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Editar\" style=\"color: #FFC107;\">edit</i></a>\n" +
                "</td>",
                "className": "text-center"}
        ]
    });
    accion_empleado("#dtEmpleado tbody", tableEmpleado);
    accion_salario("#dtSalario tbody", tableSalario);
    /*
        $('#dtEmpleado tbody').on('click', 'tr', function () {
            var data = tableEmpleado.row( this ).data();
            alert( 'Ha clickeado sobre la fila ['+data['idEmpleado']+'] NOMBRES: '+data['nombre']+' '+data['apellido'] );
        } );
    */
};

var listarData = function (id) {
    //console.log('el id es: '+id);
    setId(id);
    var parametros = {'idEmpleado' : id};
    var tableNomina = $('#dtHistoricoPago').DataTable({
        // paging: false,
        //searching: false,
        // info: false,
        "destroy": true,
        "ajax": {
            "method": "POST",
            "data": parametros,
            "url": "getHistoricoPago.php",
            "dataSrc": function(data){
                if(data === "no data"){
                    return [];
                }
                else {
                    return data.data;
                }
            }
        },
        "columns": [
            //{"data": "fechaPago"},
            {"render":
                    function ( data, type, row ) {
                        var periodo;
                        var dia = row['periodoPago'];
                        var year = dia.substring(0,4);
                        var mes = dia.substring(5,7);
                        var event = new Date(Date.UTC(year,mes));
                        var options = { year: 'numeric', month: 'long'};
                        periodo = event.toLocaleDateString('es-MX', options);
                        return (periodo);
                    }
            },
            {"data": "fechaPago"},
            // {"data": "Salario"},
            {"render":
                    function ( data, type, row ) {
                        var salary = row['Salario'];
                        var salario = formatearMoneda(salary);
                        return (salario);
                    }
            },
            // {"data": "totalDeduccion"},
            {"render":
                    function ( data, type, row ) {
                        var deduccion = row['totalDeduccion'];
                        return formatearMoneda(deduccion);
                    }
            },
            // {"data": "totalDevengo"},
            {"render":
                    function ( data, type, row ) {
                        var devengo = row['totalDevengo'];
                        return formatearMoneda(devengo);
                    }
            },
            // {"data": "totalPercibido"}
            {"render":
                    function ( data, type, row ) {
                        var totalPercibido = row['totalPercibido'];
                        return formatearMoneda(totalPercibido);
                    }
            },
            {sDefaultContent: "<td class=\"text-center\">\n" +
                "<a class=\"verDetallePago\" href=\"#\" data-target=\"#verDetallePago\"><i id=\"assignment\" class=\"material-icons\" data-toggle=\"tooltip\" title=\"Ver detalles\">assignment</i></a>\n" +
                "</td>",
                "className": "text-center"}
        ]
    });
    var tableSolictitud = $('#dtHistoricoSolicitudes').DataTable({
        "destroy": true,
        "ajax": {
            "method": "POST",
            "data": parametros,
            "url": "getHistoricoSolicitudes.php",
            "dataSrc": function(data){
                if(data === "no data"){
                    return [];
                }
                else {
                    return data.data;
                }
            }
        },
        "columns": [
            {"data": "motivo"},
            {"data": "fechaDesde"},
            /*{"render":
                    function ( data, type, row ) {
                        let periodo;
                        let dia = row['fechaDesde'];
                        let year = dia.substring(0,4);
                        let mes = dia.substring(5,7);
                        let day = dia.substring(8, 10);
                        let event = new Date(Date.UTC(year,mes,day));
                        let options = { year: 'numeric', month: 'long', day: 'numeric'};
                        periodo = event.toLocaleDateString('es-MX', options);
                        return (periodo);
                    }
            },*/
            {"data": "fechaHasta"},
            /*{"render":
                    function ( data, type, row ) {
                        let periodo;
                        let dia = row['fechaHasta'];
                        let year = dia.substring(0,4);
                        let mes = dia.substring(5,7);
                        let day = dia.substring(8, 10);
                        let event = new Date(Date.UTC(year,mes, day));
                        let options = { year: 'numeric', month: 'long', day: 'numeric'};
                        periodo = event.toLocaleDateString('es-MX', options);
                        return (periodo);
                    }
            },*/
            {"data": "horaDesde"},
            {"data": "horaHasta"}
        ]
    });
    let tableLiquidarSalario = $('#dtLiquidarSalario').DataTable({});

};

var accion_departamento = function (tbody, table) {
    // Cuando se haga click en el boton editar
    $(tbody).on("click", "a.editarDpto", function () {
        // Obtenemos la data de cada fila seleccionada
        var data = table.row($(this).parents("tr")).data();
        // Seteamos las cajas de texto del modal
        var idDpto = $("#edit_id").val(data.idDepartamento),
            nombre = $("#edit_name").val(data.nombreDepartamento);
    });
    // Cuando se haga click en el boton eliminar
    $(tbody).on("click", "a.eliminarDpto", function () {
        var data = table.row($(this).parents("tr")).data();
        var idDpto = $("#id").val(data.idDepartamento),
            nombre = $("#name").val(data.nombreDepartamento);
        var nameDepartamento = $(this).parents("tr").find("td").eq(1).text();
        var dMsg = document.getElementById("d-msg");
        dMsg.innerHTML = nameDepartamento;
    });
};

var accion_empleado = function (tbody, table) {
    $(tbody).on("click", "a.editarEmpleado", function () {
        var data = table.row($(this).parents("tr")).data();
        var idEmpleado = $("#edit_id").val(data.idEmpleado);
        var nombreEmpleado = $("#edit_name").val(data.nombre);
        var apellidoEmpleado = $("#edit_ape").val(data.apellido);
        var ci = $("#edit_ci").val(data.ci);
        var sexo = $("#edit_sexo").val(data.sexo);
        var fechaNacimiento = $("#edit_fecha").val(data.fechaNacimiento);
        var telefono = $("#edit_telefono").val(data.telefono);
        var direccion = $("#edit_direccion").val(data.direccion);
        var email = $("#edit_email").val(data.email);
        var edit_cta = $("#edit_cta").val(data.numCuenta);
        var nacionalidad = $("#edit_nacionalidad").val(data.nacionalidad);
        var estado = $("#edit_estado").val(data.estado);
        var horario = $("#idHorario").val(data.Horario_idHorario);
        var estadoCivil = $("#idEstadoCivil").val(data.EstadoCivil_idEstadoCivil);
        var contrato = $("#idContrato").val(data.Contrato_idContrato);
        var fechaIn = $("#edit_ingreso").val(data.fechaAsume);
        var salario = $("#edit_salario").val(formatearMoneda(data.salarioFijo));
        var cargo = $("#idCargo").val(data.idCargo);
        var depto = $("#idDepartamento").val(data.idDepartamento);

        $('#agregarEmpleado').trigger("reset");
    });
    // Cuando se haga click en el boton eliminar
    $(tbody).on("click", "a.eliminarEmpleado", function () {
        var data = table.row($(this).parents("tr")).data();
        var idEmplea = $("#id").val(data.idEmpleado);
        var nombreEmpleado = $(this).parents("tr").find("td").eq(1).text();
        //var id = $(this).parents("tr").find("td").eq(4).text();

        var dMsg = document.getElementById("d-msg");
        dMsg.innerHTML = nombreEmpleado;
    });
};

var accion_salario = function (tbody, table) {
    $(tbody).on("click", "a.editarSalario", function () {
        var data = table.row($(this).parents("tr")).data();
        var idEmpleado = $("#edit_id").val(data.idEmpleado);
        var nombre = $("#edit_name").val(data.nombre+' '+data.apellido);
        var salario = $("#edit_salario").val(formatearMoneda(data.salarioFijo));
    });
};

var mensajes = function (informacion) {
    var texto = "", color = "";
    if (informacion.respuesta === "EXISTE") {
        texto = "Ya existe un registro con ese nombre, intente de nuevo.";
        color = "#dc3545";
    }
    $('.msgExiste').html(texto).css({"color": color});
    $('#nombreDevengo').css({"border-color": color});
};

function resetearCamposDeduccion() {
    //$('#idNewDeduccion').attr('disabled', 'disabled');
    $('#addDeduccion').attr('disabled', 'disabled');
    $('#deduccion').attr('disabled', 'disabled');
    $('#deduccion').html('<option value="" selected disabled>--Selecciona--</option>');
    $('#montoDeduccion').attr('disabled', 'disabled');
    $('#fechaDeduccion').attr('disabled', 'disabled');
    $('#obsDeduccion').attr('disabled', 'disabled');
    $('#CancelAddDeduccion').attr('disabled', 'disabled');
    $('#montoDeduccion').val('');
    $('#obsDeduccion').val('');
    $('#fechaDeduccion').val('');
}

function resetearCamposDevengo() {
    //$('#idNewDevengo').attr('disabled', 'disabled');
    $('#addDevengo').attr('disabled', 'disabled');
    $('#devengo').attr('disabled', 'disabled');
    $('#devengo').html('<option value="" selected disabled>--Selecciona--</option>');
    $('#montoDevengo').attr('disabled', 'disabled');
    $('#fechaDevengo').attr('disabled', 'disabled');
    $('#obsDevengo').attr('disabled', 'disabled');
    $('#CancelAddDevengo').attr('disabled', 'disabled');
    $('#montoDevengo').val('');
    $('#obsDevengo').val('');
    $('#fechaDevengo').val('');
}

function resetFormPagoDetalle() {
    $('#salario').val('');
    $('#totalDeduccion').val('');
    $('#totalDevengo').val('');
    $('#totalPagar').val('');
    $('#edit_name').val('');
    $('#edit_salario').val('');
}

function setId(id) {
    idEmpGlobal = id;
}

function getId() {
    return idEmpGlobal;
}

function hoyFecha() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    return now.getFullYear()+"-"+(month)+"-"+(day) ;
}

function formatearMoneda(monto) {
    return Intl.NumberFormat('es-PY').format(monto);
    // return Intl.NumberFormat('es-PY',{style:'currency',currency:'PYG'}).format(monto);
}
//
// jQuery(document).ready(function () {
//     jQuery('[data-toggle="tooltip"]').tooltip();
// });


