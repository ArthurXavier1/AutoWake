import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
import json

# Configurações SMTP do Mailtrap
smtp_host = 'sandbox.smtp.mailtrap.io'  # Host do Mailtrap
smtp_port = 2525                        # Porta que você escolheu (25, 465, 587 ou 2525)
smtp_user = '55c67dfa7da51e'           # Seu Username do Mailtrap
smtp_pass = '****51d5'                  # Sua Password do Mailtrap (coloque a senha completa)

# Email remetente (pode ser qualquer um para testes)
email_remetente = 'teste@exemplo.com'

# Email destinatário (qualquer um para teste)
email_destino = 'destino@exemplo.com'

# Dados para enviar
dados = {
    "message": "Cadastro realizado com sucesso",
    "user": {
        "email": "aqadaeqeaja@gmail.com",
        "name": "teste",
        "codigo": 396870,
        "updated_at": "2025-06-05T13:59:21.000000Z",
        "created_at": "2025-06-05T13:59:21.000000Z",
        "id": 8
    }
}

texto_email = json.dumps(dados, indent=4, ensure_ascii=False)

mensagem = MIMEMultipart()
mensagem['From'] = email_remetente
mensagem['To'] = email_destino
mensagem['Subject'] = 'Dados do Cadastro'
mensagem.attach(MIMEText(texto_email, 'plain'))

try:
    server = smtplib.SMTP(smtp_host, smtp_port)
    server.starttls()  # ativa segurança TLS
    server.login(smtp_user, smtp_pass)  # autentica no Mailtrap
    server.sendmail(email_remetente, email_destino, mensagem.as_string())
    server.quit()
    print('Email enviado com sucesso!')
except Exception as e:
    print('Falha ao enviar email:', e)
