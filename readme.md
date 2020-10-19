## Desafio Uplexis
Aplicação que realiza busca via CURL com PHP ao site Quest MultiMarcas e capturar os dados dos veículos retornados na busca.

#### Dependências
* PHP 7.3.11
* Apache Server 2.4 +
* Ver 15.1 Distrib 10.1.37-MariaDB, for Win32 (AMD64)
* Laravel Framework 5.4.36

#### Instalação
A instalação do sistema pode ser feita seguindo os seguintes passos:
> ATENÇAO: Os passos para instalação descritos nesta documentação, assumem que a aplicação rodará em uma estação Windows e que contenha todas as dependências instaladas e configuradas.

* Clonar ou baixar o projeto diretamente no `localhost` da estação.
```bash
C:\xampp\htdocs
```
* Depois que baixar o respositório, instalar as dependências.
```bash
C:\xampp\htdocs\app\ composer install
```

* Criar uma base de dados. Configurar o arquivo `.env` que está na raiz do aplicação, conforme suas credenciais.
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_uplexis
DB_USERNAME=root
DB_PASSWORD=root
```
* Executar o comando a baixo
```
C:\xampp\htdocs\app\ php artisan migrate
```
* Para executar a aplicação, execute o comando:
```bash
C:\xampp\htdocs\app\ php artisan serve
```
### Creditos
Esta aplicação foi desenvolvida por [Caio Dellano Nunes da Silva](mailto:bladellano@gmail.com).
<br>
Site: www.dellanosites.com.br
