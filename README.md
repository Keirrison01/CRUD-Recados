📌 Mural – Sistema em PHP com MySQL

Bem-vindo ao Mural , um sistema desenvolvido em PHP processual com MySQL , criado para permitir que os usuários publiquem mensagens, imagens e visualizem um mural atualizado em tempo real.
Com uma interface simples, limpa e funcional, o Mural foi pensado para ser leve, rápido e fácil de usar.

🎯 Recursos principais
🧑‍💻 Área do Usuário

Cadastro e login simples.

Senhas protegidas (criptografadas).

Sistema básico de autenticação.

🖼️ Publicação no Mural

Cada usuário pode fazer publicações.

Upload de imagens (armazenadas na pasta uploads/ ).

Publicações organizadas por data e hora.

Exibição automática no mural.

👤 Perfil do Usuário

Nome do usuário exibido no cabeçalho.

Foto de perfil compartilhada a partir de pasta uploads.

Opção de editar informações.

📊 Organização e Estrutura

Massas separadas ( templates/, uploads/, etc.).

Sistema leve e de fácil manutenção.

🛠️ Tecnologias Utilizadas

PHP procedural.

MySQL.

HTML, CSS, JavaScript.

Apache (via XAMPP/WAMP/MAMP)

📚 Como instalar no servidor local
1️⃣ Clonar o protetor
git clone https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git


Ou baixe como ZIP e extraia.

2️⃣ Configurar o ambiente local

Você precisa ter um servidor local, como:

XAMPP.

WAMP.

MAMP.

Que inclui: Apache, PHP e MySQL

Coloque os arquivos do projeto dentro da pasta:

XAMPP: C:\xampp\htdocs\

WAMP: C:\wamp64\www\

3️⃣ Configurar o banco de dados

Iniciar o MySQL pelo painel do XAMPP/WAMP

:

http://localhost/phpmyadmin


Crie um banco de dados (exemplo):

mural


Importe o arquivo .sql do projeto (se houver):

Vá em Importar

Escolha o arquivomural.sql

4️⃣ Atualizar a conexão com o banco

No seu arquivo conexao.php (ou equivalente):

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mural";


Modifique se necessário.

5️⃣ Rodar o projeto

Abra o navegador e acesse:

http://localhost/nome-da-pasta

🎨 Interface

O sistema utiliza um layout simples, limpo e organizado.
Caso utilize algum tema (como AdminLTE), você pode personalizar facilmente para ficar ainda mais moderno.

📄 Licença

Este projeto utiliza a licença MIT .

Resumo sobre a Licença MIT

Permite o uso livre, modificação e redistribuição

Deve manter o aviso de direitos autorais

O software é fornecido "como está", sem garantias

🚀 Pronto para usar?

Comece agora mesmo a testar seu Mural e personalize da maneira que quiser!
