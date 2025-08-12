<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Certificado de Filme</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            text-align: center;
            padding: 50px;
            border: 10px solid #b10303;
            background-color: rgb(249, 178, 72);
            
        }
        .certificado {
            border: 5px dashed #b10303;
            padding: 30px;
            background-color: #fdfdfd;
            margin-top: 50%
            
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin: 10px auto;
        }
        .filme {
            font-weight: bold;
            font-size: 22px;
        }
    </style>
</head>
<body>
    <div class="certificado">
        <h1>Certificado de Filme</h1>
        <p>Certificamos que o filme</p>
        <p class="filme">"{{ $filme->nome }}"</p>
        <p>do gênero <strong>{{ $filme->genero }}</strong>, lançado no ano de <strong>{{ $filme->data_publicacao }}</strong>,</p>
        <p>foi oficialmente registrado em nossa plataforma.</p>
        <br><br>
        <p>Data de emissão: {{ date('d/m/Y') }}</p>
    </div>

    <script>
        $("#enviar").click(function () {

        $.ajax({
            url: 'http://127.0.0.1:8000/api/filmes/pdf',
            method: 'GET',
            xhrFields: {
                responseType: 'blob'
            },
            headers: {
                'Accept': 'application/pdf',
               
            },
            success: function (data) {
             
                var url = window.URL.createObjectURL(data);
               
                var a = document.createElement('a');
                a.href = url;
                a.download = 'teste.pdf';
                document.body.appendChild(a);
                a.click();
             
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Erro:', textStatus, errorThrown);
            }
        });
    });
    </script>
</body>
</html>