## Objetivo
Prova realizada com o objetivo de passar na entrevista de trabalho da empresa Uplexis.

#### Dependências Necessárias
* PHP 7.2.19 ou +
* Apache Server 2.4.35 ou +
* MySQL 5.7.24 ou +
* Laravel Framework 5.4.36
* Laragon

#### Instalação do sistema
Para conseguir rodar o sistema localmente, é preciso seguir os seguintes passos:
> OBS: Para rodar o sistema, utilizei o Laragon Full versão 4.0.16.

* Clone o repositório dentro da pasta  `C:\laragon\www`.

* Depois abra o projeto no Visual Studio Code.

* Entre no Laragon -> Banco de Dados -> Abrir: e crie um banco de dados com o nome  `prova` em seguida, entre no projeto e crie um arquivo chamado `.env` em seguida, copie tudo do arquivo `._env` para o arquivo criado.

* Em seguida, altere os dados de conexão com o banco de dados no arquivo `.env`, informando o host, usuario, senha e nome do banco. Segue exemplo do meu:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=prova
DB_USERNAME=root
DB_PASSWORD=
```

* Em seguida, abra o terminal do visual studio code e rode o comando abaixo para criar as tabelas no banco.
```
php artisan migrate
```
* Em seguida, rode o comando abaixo para criar o usuario admin/admin.
```
php artisan db:seed
```
* Em seguida, rode o comando abaixo para gerar uma key para aplicação.
```
php artisan key:generate
```

* OBS: a seguindo todos os passos acima, basta acessar o sistema pela url: `http://app-up.test/`