$(document).ready(function () {

    $("#imagem").change();

    $("#tipo_tamanho").click(function () {
        $("#modaltipotamanho").modal("show");
    });

    $("#pizza").click(function () {
        $("#modalpizza").modal("show"); 
    });


    let tabelaTamanho = new DataTable('#tabela_tamanho', {
        processing: true,
        serverSide: false,
        responsive: false,
        paging: true,
        pageLength: 5,
        lengthChange: false,
        searching: false,
        ordering: true,
        language: {
            info: '',
            url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json&quot"
        },
        ajax: {
            url: '../../api/cadastro/retorna_tamanhos_produto',
            type: 'GET',
            data: function (d) {

                d.user_id = $("#user_id").val();
                d.token = $("#token").val();
                d.id_item = $("#produto_id").val();
                d.id_tipo = $("#tipos_select").val();
            },
            dataSrc: 'data'
        },
        columns: [
            { data: 'nome_option', title: 'Nome', width: '300' },
            { data: "valor_formatado", title: "Preço Padrao" },
            {
                data: 'ativo',
                title: 'Ativo',
                width: "60px",
                render: function (data, type, row) {
                    return `  <div class="form-check form-switch"> <input class="form-check-input  mx-auto ativa_tamanho" data-id="${row.id_option}" ${data} type="checkbox"role="switch"
                                    id="check_disponivel_${row.id_option}"> </div>`;
                }
            },
        ]
    });



    let tabelaSabores = new DataTable('#tabela_sabores', {
        processing: true,
        serverSide: false,
        responsive: true,
        paging: true,
        pageLength: 5,
        lengthChange: false,
        searching: false,
        order: [[3, 'desc']],
        ordering: true,
        language: {
            info: '',
            url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json&quot"
        },
        ajax: {
            url: '../../api/cadastro/retorna_meioameio_produto',
            type: 'GET',
            data: function (d) {

                d.user_id = $("#user_id").val();
                d.token = $("#token").val();
                d.id_item = $("#produto_id").val();
            },
            dataSrc: 'data'
        },
        columns: [
            { data: 'nome', title: 'Nome' },
            { data: "descricao", title: "Descrição" },
            { data: "valor_formatado", title: "Valor" },
            { data: "ordem", title: "Posição" },
            {
                data: 'ativo_check',
                title: 'Ativo',
                width: "60px",
                render: function (data, type, row) {
                    return `  <div class="form-check form-switch"> <input class="form-check-input  mx-auto ativa_tamanho" data-id="${row.id}" ${data} type="checkbox"role="switch"
                                    id="check_disponivel_${row.id}"> </div>`;
                }
            },

            {
                data: 'id',
                title: 'Ações',
                width: "70px",
                render: function (data, type, row) {
                    return `
                    <div class="row d-flex justify-content-center">
                        <div class=" col-5">
                            <button class="btn btn-warning btn-sm alterar_sabor" data-id="${data}"><svg xmlns="http://www.w3.org/2000/svg&quot; width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></button>
                        </div>
                        <div class="col-5">
                            <button class="btn btn-danger btn-sm deletar_sabor" data-id="${data}"><svg xmlns="http://www.w3.org/2000/svg&quot; width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></button>
                        </div>

                    </div>`;
                }
            }
        ]
    });


    $.ajax({
        url: '../../api/cadastro/retorna_produto',
        type: 'POST',
        data: {
            user_id: $("#user_id").val(),
            token: $("#token").val(),
            id_prod: $("#produto_id").val(),

        },
        success: function (response) {

            if (response['erro'] == 'n') {
                let dias_semana = response.data.dia_semana;


                $(".check_dia").prop("checked", false);

                if (dias_semana.includes("Domingo")) $("#confirm_domingo").prop("checked", true);
                if (dias_semana.includes("Segunda")) $("#confirm_segunda").prop("checked", true);
                if (dias_semana.includes("Terça")) $("#confirm_terca").prop("checked", true);
                if (dias_semana.includes("Quarta")) $("#confirm_quarta").prop("checked", true);
                if (dias_semana.includes("Quinta")) $("#confirm_quinta").prop("checked", true);
                if (dias_semana.includes("Sexta")) $("#confirm_sexta").prop("checked", true);
                if (dias_semana.includes("Sabado")) $("#confirm_sabado").prop("checked", true);

                if (response.data.img_item && response.data.img_item !== "") {
                    $('.image-upload-wrap').hide();
                    $('.file-upload-image').attr('src', response.data.img_item);

                    $('.file-upload-content').show();
                    $('.image-title').html();
                }


            } else {
                Swal.fire("Erro!", response['msg'], "error");
            }
        },
        error: function (volta) {

            Swal.fire("Erro!", "Falha ao carregar o produto.", "error");
        }
    });


    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });



    $("#check_estoque").change(function () {
        if ($(this).is(':checked')) {
            $('#estoque').prop('disabled', false);
            $("#estoque").attr('type', 'number');
            $("#estoque").val(0);
        } else {
            $('#estoque').prop('disabled', true);
            $("#estoque").attr('type', 'text');
            $("#estoque").val('∞');

        }

    });


    $("#check_posicao").change(function () {
        if ($(this).is(':checked')) {
            $('#posicao').prop('disabled', false);
            $("#posicao").attr('type', 'number');
            $("#posicao").val(0);
        } else {
            $('#posicao').prop('disabled', true);
            $("#posicao").attr('type', 'text');
            $("#posicao").val('∞');

        }

    });


    $("#check_number_adicional").change(function () {
        if ($(this).is(':checked')) {
            $('#number_adicional').prop('disabled', false);
            $("#number_adicional").attr('type', 'number');
            $("#number_adicional").val(0);
        } else {
            $('#number_adicional').prop('disabled', true);
            $("#number_adicional").attr('type', 'text');
            $("#number_adicional").val('∞');

        }

    });


    $("#check_number_adicional_pago").change(function () {
        if ($(this).is(':checked')) {
            $('#number_adicional_pago').prop('disabled', false);
            $("#number_adicional_pago").attr('type', 'number');
            $("#number_adicional_pago").val(0);
        } else {
            $('#number_adicional_pago').prop('disabled', true);
            $("#number_adicional_pago").attr('type', 'text');
            $("#number_adicional_pago").val('∞');

        }

    });

    $("#tipos_select").change(function () {

        tabelaTamanho.ajax.reload();

    });

    $("#altera_item").click(function () {

        let dias_semana = ''

        if ($("#confirm_domingo").is(':checked')) {
            dias_semana = dias_semana + 'Domingo';
        }
        if ($("#confirm_segunda").is(':checked')) {
            if (dias_semana == '') {
                dias_semana = dias_semana + 'Segunda'
            } else {
                dias_semana = dias_semana + ',Segunda';
            }
        }
        if ($("#confirm_terca").is(':checked')) {
            if (dias_semana == '') {
                dias_semana = dias_semana + 'Terça'
            } else {
                dias_semana = dias_semana + ',Terça';
            }

        }
        if ($("#confirm_quarta").is(':checked')) {
            if (dias_semana == '') {
                dias_semana = dias_semana + 'Quarta'
            } else {
                dias_semana = dias_semana + ',Quarta';
            }

        }
        if ($("#confirm_quinta").is(':checked')) {
            if (dias_semana == '') {
                dias_semana = dias_semana + 'Quinta'
            } else {
                dias_semana = dias_semana + ',Quinta';
            }

        }
        if ($("#confirm_sexta").is(':checked')) {
            if (dias_semana == '') {
                dias_semana = dias_semana + 'Sexta'
            } else {
                dias_semana = dias_semana + ',Sexta';
            }

        }
        if ($("#confirm_sabado").is(':checked')) {
            if (dias_semana == '') {
                dias_semana = dias_semana + 'Sabado'
            } else {
                dias_semana = dias_semana + ',Sabado';
            }

        }

        let estoque = 0

        if ($("#check_estoque").is(':checked')) {

            if ($("#estoque").val != "∞") {

                if ($("#estoque").val() == '' && !$("#estoque").isNumeric()) {
                    Swal.fire("Erro!", "Estoque nao pode ser Vazio ou não numerico!", "error");
                    $(this).val(0);
                    return;
                } else {

                    estoque = $("#estoque").val();
                }

            } else {

                estoque = -1;
            }

        }



        let posicao = 0

        if ($("#check_posicao").is(':checked')) {

            if ($("#posicao").val != "∞") {

                if ($("#posicao").val() == '' && !$("#posicao").isNumeric()) {
                    Swal.fire("Erro!", "Posição nao pode ser Vazio ou não numerico!", "error");
                    $("#posicao").val(0);
                    return;
                } else {

                    posicao = $("#posicao").val();
                }

            } else {

                posicao = -1;
            }

        }


        let number_adicional = 0

        if ($("#check_number_adicional").is(':checked')) {

            if ($("#number_adicional").val != "∞") {

                if ($("#number_adicional").val() == '' && !$("#number_adicional").isNumeric()) {
                    Swal.fire("Erro!", "Qtd Adicional não pode ser Vazio ou não numerico!", "error");
                    $("#number_adicional").val(0);
                    return;
                } else {

                    number_adicional = $("#number_adicional").val();
                }

            } else {

                number_adicional = -1;
            }

        }



        let number_adicional_pago = 0

        if ($("#check_number_adicional_pago").is(':checked')) {

            if ($("#number_adicional_pago").val != "∞") {

                if ($("#number_adicional_pago").val() == '' && !$("#number_adicional_pago").isNumeric()) {
                    Swal.fire("Erro!", "Qtd Adicional não pode ser Vazio ou não numerico!", "error");
                    $("#number_adicional_pago").val(0);
                    return;
                } else {

                    number_adicional_pago = $("#number_adicional_pago").val();
                }

            } else {

                number_adicional_pago = -1;
            }

        }

        if ($("#nome_item").val() === "") {
            Swal.fire({
                icon: "warning",
                title: "Campo obrigatório",
                text: "O nome do Produto não pode estar vazio."
            });
            return;
        }

        if ($("#preco_item").val() === "") {
            Swal.fire({
                icon: "warning",
                title: "Campo obrigatório",
                text: "Informe um preço válido para o Produto."
            });
            return;
        }

        let file = $("#imagem")[0].files[0];

        let formData = new FormData();
        formData.append("imagem", file);
        formData.append("user_id", $("#user_id").val());
        formData.append("token", $("#token").val());
        formData.append("nome_item", $("#nome_item").val());
        formData.append("preco_item", $("#preco_item").val());
        formData.append("bot_on", $("#bot_on").val());
        formData.append("id_cat", $("#id_cat").val());
        formData.append("descricao_item", $("#descricao_item").val());
        formData.append("dia_semana", dias_semana);
        formData.append("estoque", estoque);
        formData.append("posicao", posicao);
        formData.append("number_adicional_pago", number_adicional_pago);
        formData.append("number_adicional", number_adicional);
        formData.append("produto_id", $("#produto_id").val());

        $.ajax({
            url: '../../api/cadastro/alterar_produto',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                if (response['erro'] == 'n') {

                    Swal.fire({
                        title: "Produto  Cadastrado com Sucesso!",
                        icon: "success",
                        draggable: true
                    });

                    window.location = '../meus_produtos';
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response.msg.errorInfo,

                    });
                }
            },
            error: function (xhr) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: xhr.responseText,

                });
            }
        });

    });


 

    $(document).on('click', '.ativa_tamanho', function () {

        let id = $(this).data('id');
        let ativo = 0;
        if ($(this).is(':checked')) {
            ativo = 1;
        }

        $.ajax({
            url: '../../api/cadastro/ativa_tamanho_produto',
            type: 'POST',
            data: {
                user_id: $("#user_id").val(),
                token: $("#token").val(),
                id_tamanho: id,
                id_item: $("#produto_id").val(),
                id_tipo: $("#tipos_select").val(),
                ativo: ativo,
            },
            success: function (response) {

                if (response['erro'] == 'n') {
                    Swal.fire("Atualizado!", "Vinculo Produto/Tamanho e Opção Atualizado com Sucesso!", "success");
                    tabelaSabores.ajax.reload();
                } else {
                    Swal.fire("Erro!", response['msg'].errorInfo[2], "error");
                    console.log(response);
                }

            },
            error: function (response) {
                Swal.fire("Erro!", response['msg'].errorInfo[2], "error");

            }
        });


    });

    $("#altera_pizza").click(function () {

        $.ajax({
            url: '../../api/cadastro/altera_config_pizza',
            type: 'PUT',
            data: {
                user_id: $("#user_id").val(),
                token: $("#token").val(),
                meioameio_nome: $("#meioameio_nome").val(),
                produto_id: $("#produto_id").val(),
                meioameio_max: $("#meioameio_max").val(),
                meioameio_ativo: $("#meioameio_ativo_select").val(),
                meioameio_calculo: $("#meioameio_calculo_select").val()

            },
            success: function (response) {

                if (response['erro'] == 'n') {
                    Swal.fire("Atualizado!", "Configurações de Pizza  Atualizadas com Sucesso!", "success");
                } else {
                    Swal.fire("Erro!", response['msg'].errorInfo[2], "error");
                    console.log(response);
                }

            },
            error: function (response) {
                Swal.fire("Erro!", response['msg'].errorInfo[2], "error");

            }
        });

    });

    $("#add_sabor_pizza").click(function () {

        $.ajax({
            url: '../../api/cadastro/add_meioameio',
            type: 'POST',
            data: {
                user_id: $("#user_id").val(),
                token: $("#token").val(),
                produto_id: $("#produto_id").val(),
                nome: $("#nome").val(),
                descricao: $("#descricao").val(),
                valor: $("#valor").val(),
                ativo: $("#ativo_select").val(),
                posicao: $("#posicao_sabor").val(),


            },
            success: function (response) {

                if (response['erro'] == 'n') {
                    tabelaSabores.ajax.reload();
                    Swal.fire("Sucesso!", "Sabor Adicionado com sucesso!", "success");
                } else {
                    Swal.fire("Erro!", response['msg'].errorInfo[2], "error");
                    console.log(response);
                }

            },
            error: function (response) {
                Swal.fire("Erro!", response['msg'].errorInfo[2], "error");

            }
        });

    });


    $(document).on('click', '.ativa_sabor', function () {

        let id = $(this).data('id');
        let ativo = 0;
        if ($(this).is(':checked')) {
            ativo = 1;
        }

        $.ajax({
            url: '../../api/cadastro/ativa_sabor_produto',
            type: 'PUT',
            data: {
                user_id: $("#user_id").val(),
                token: $("#token").val(),
                id_meioameio: id,
                id_item: $("#produto_id").val(),
                ativo: ativo,
            },
            success: function (response) {

                if (response['erro'] == 'n') {
                    Swal.fire("Atualizado!", "Vinculo Produto/Tamanho e Opção Atualizado com Sucesso!", "success");
                } else {
                    Swal.fire("Erro!", response['msg'].errorInfo[2], "error");
                    console.log(response);
                }

            },
            error: function (response) {
                Swal.fire("Erro!", response['msg'].errorInfo[2], "error");

            }
        });


    });


    $(document).on('click', '.deletar_sabor', function () {

        let id = $(this).data('id');


        Swal.fire({
            title: "Tem certeza?",
            text: "Esse Sabor foi Removido com Sucesso",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#8205ff",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../../api/cadastro/deletar_sabor',
                    type: 'DELETE',
                    data: {
                        user_id: $("#user_id").val(),
                        token: $("#token").val(),
                        id_meioameio: id,
                        id_item: $("#produto_id").val()
                    },
                    success: function () {


                        Swal.fire("Excluído!", "Registro removido.", "success");
                        tabelaSabores.ajax.reload();


                    },
                    error: function () {
                        Swal.fire("Erro!", "Não foi possível excluir.", "error");
                    }
                });
            }
        });
    });



});

function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
}

window.readURL = readURL;
window.removeUpload = removeUpload;

function moeda(a, e, r, t) {
    let j = 0;
    let tamanho2 = 0;
    let ajd2 = "";
    let n = "",
        h = j = 0,
        u = 0,
        l = "",
        o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
        -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
        h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++);
    for (l = ""; h < u; h++) - 1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n, 0 == (u = l.length) && (a.value = ""), 1 == u && (a.value = "0" + r + "0" + l), 2 == u && (a.value = "0" + r + l), u > 2) {
        for (ajd2 = "",
            j = 0,
            h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
                j = 0),
                ajd2 += l.charAt(h),
                j++;
        for (a.value = "",
            tamanho2 = ajd2.length,
            h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}

window.moeda = moeda;