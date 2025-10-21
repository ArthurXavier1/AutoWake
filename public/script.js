document.addEventListener("DOMContentLoaded", () => {
    let card = document.querySelector(".card");
    let loginbutton = document.querySelector(".loginbutton");
    let cadasbutton = document.querySelector(".cadasbutton");

    loginbutton.onclick = () => {
        card.classList.remove("cadastroActive");
        card.classList.add("LoginActive");
    }

    cadasbutton.onclick = () => {
        card.classList.remove("LoginActive");
        card.classList.add("cadastroActive");
    }
});

$('#loginForm').on('submit', function(e) {
            e.preventDefault();

            const email = $('#email').val();
            const password = $('#password').val();

            $.ajax({
                url: '/api/login', // certifique-se de que este endpoint está correto
                method: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify({ email, password }),
                success: function(response) {
                    if (response.access_token) {
                        console.log('Token:', response.access_token); // Token exibido no console
                        $('#result').css('color', 'green').text('Login realizado com sucesso!');
                    } else {
                        $('#result').text('Token não encontrado na resposta.');
                    }
                },
                error: function(xhr) {
                    const msg = xhr.responseJSON?.message || 'Erro desconhecido ao fazer login.';
                    $('#result').css('color', 'red').text('Erro: ' + msg);
                }
            });
        });

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    $('#cadastroForm').on('submit', function(e) {
        e.preventDefault();

        // Captura os dados
        let name = $('#name').val().trim();
        let email = $('#email').val().trim();
        let password = $('#password').val();
        let password_confirmation = $('#password_confirmation').val();

        // Limpa mensagens anteriores
        $('#result').html('');

        // Envia a requisição AJAX
        $.ajax({
            url: '/api/register',
            method: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify({ name, email, password, password_confirmation }),
            success: function(response) {
                $('#result').css('color', 'green').text('Cadastro realizado com sucesso! Verifique seu e-mail.');
                $('#cadastroForm')[0].reset(); // limpa o formulário
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    // Erros de validação
                    const errors = xhr.responseJSON.errors;
                    let messages = '<ul>';
                    for (let field in errors) {
                        errors[field].forEach(msg => {
                            messages += `<li>${msg}</li>`;
                        });
                    }
                    messages += '</ul>';
                    $('#result').css('color', 'red').html(messages);
                } else {
                    // Outro erro (500, 401 etc)
                    let msg = xhr.responseJSON?.message || 'Erro ao cadastrar.';
                    $('#result').css('color', 'red').text(msg);
                }
            }
        });
    });
