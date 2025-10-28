function gerarToken() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        const r = Math.random() * 16 | 0;
        const v = c === 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}

document.addEventListener("DOMContentLoaded", () => {
    let userToken = Cookies.get('userToken');
    if (!userToken) {
        userToken = gerarToken();
        Cookies.set('userToken', userToken, { expires: 7 });
        console.log("Novo token criado:", userToken);
    } else {
        console.log("Token existente:", userToken);
    }

    const card = document.querySelector(".card");
    const loginbutton = document.querySelector(".loginbutton");
    const cadasbutton = document.querySelector(".cadasbutton");

    loginbutton.onclick = () => {
        card.classList.remove("cadastroActive");
        card.classList.add("LoginActive");
    }

    cadasbutton.onclick = () => {
        card.classList.remove("LoginActive");
        card.classList.add("cadastroActive");
    }

    const params = new URLSearchParams(window.location.search);
    const mode = params.get("mode");

    if (mode === "cadastro") {
        card.classList.remove("LoginActive");
        card.classList.add("cadastroActive");
    } else if (mode === "login") {
        card.classList.remove("cadastroActive");
        card.classList.add("LoginActive");
    }

    $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        const email = $('#loginEmail').val().trim();
        const password = $('#loginPassword').val().trim();
        const data = { email, password, token: userToken };

        $.ajax({
            url: 'http://localhost:8000/api/login',
            method: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(data),
            success: function (response) {
                if (response.usuario && response.usuario.token) {
                    console.log('Token:', response.usuario.token);
                    document.cookie = "usertoken=" + response.usuario.token + "; path=/; max-age=604800";
                    document.cookie = "user_id=" + response.usuario.id + "; path=/; max-age=604800";
                    window.location.href = "/AutoWake";
                }
            },
            error: function (xhr) {
                const msg = xhr.responseJSON?.message || 'Erro desconhecido ao fazer login.';
                $('#loginResult').css('color', 'red').text('Erro: ' + msg);

            }
        });
    });
    
    $('#cadastroForm').on('submit', function (e) {
        e.preventDefault();

        const name = $('#name').val().trim();
        const email = $('#registerEmail').val().trim();
        const password = $('#registerPassword').val().trim();
        const confirmPassword = $('#registerConfirmPassword').val().trim();
        const resultBox = $('#result');

     
        const emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
        const temNumero = /[0-9]/;

        if (name.length < 3) {
            resultBox.css('color', 'red').text('O nome deve ter pelo menos 3 caracteres.');
            return;
        }

        if (!emailRegex.test(email)) {
            resultBox.css('color', 'red').text('O e-mail deve estar em minúsculo, conter "@" e domínio válido.');
            return;
        }

        if (!temNumero.test(email)) {
            resultBox.css('color', 'red').text('O e-mail deve conter pelo menos um número.');
            return;
        }

        if (password.length < 6) {
            resultBox.css('color', 'red').text('A senha deve ter pelo menos 6 caracteres.');
            return;
        }

        if (password !== confirmPassword) {
            resultBox.css('color', 'red').text('As senhas não coincidem.');
            return;
        }

        const data = { name, email, password, token: userToken };

        $.ajax({
            url: '/api/register',
            method: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(data),
            success: function (response) {
                resultBox.css('color', 'green').text('Cadastro realizado com sucesso! Redirecionando para login...');
                Cookies.set('closed', 'true', { expires: 7 });

                setTimeout(() => {
                    window.location.href = "?mode=login";
                }, 1500);
            },
            error: function (xhr) {
                const msg = xhr.responseJSON?.message || 'Erro ao cadastrar.';
                resultBox.css('color', 'red').text(msg);
            }
        });
    });
});
