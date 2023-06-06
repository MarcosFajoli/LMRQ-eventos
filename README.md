# LMRQ-eventos

## Instalação e uso
- Deve ser instalados os componentes necessários para execução do Laravel, que pode ser verificados [neste link.](https://laravel.com/docs/10.x/installation)

- Faça o download do [Composer](https://getcomposer.org/download/), sistema de gerenciamento de dependências utilizado nesse projeto.

- Esse projeto utiliza o banco de dados MySQL para persistência. Faça o download do [XAMPP](https://www.apachefriends.org/pt_br/download.html) e inicie o serviço do MySQL, ou então baixe diretamente o MySQL do [site oficial](https://dev.mysql.com/downloads/installer/).

- Copie o arquivo _.env.example_ e renomeie-o para _.env_, alterando as variáveis de banco de dados de acordo com sua instalação.
Padrão:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lmrqeventos
DB_USERNAME=root
DB_PASSWORD=
```

- Crie o banco de dados da aplicação no MySQL, no terminal na pasta da sua aplicação execute o comando _composer install_ para que sejam instaladas as dependencias padrão.

- Após feito isso, execute o comando _php artisan migrate_ para que sejam criadas as tabelas e valores padrão ao banco de dados.

- Utilize o comando _php artisan serve_ para rodar a aplicação.
