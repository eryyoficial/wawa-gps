# WAWA GPS


## Tecnologias Utilizadas

Este projeto foi desenvolvido utilizando as seguintes tecnologias:

### **Backend**

* **PHP 8.2**
* **Laravel 12.x**
* **MySQL**

### **Frontend**

* **HTML & JavaScript**
* **Tailwind CSS**

### **Gerenciador de Pacotes**

* **Composer**
* **npm**

---

## Pré-requisitos


* **Git**: Para clonar o repositório do projeto.
* **PHP 8.2 ou superior**:

  * Recomendação: [XAMPP](https://www.apachefriends.org/index.html) (para Windows, inclui Apache, MySQL e PHP).
* **Composer**: Gerenciador de dependências PHP.
* **Node.js & npm**: Para instalação de pacotes JavaScript.

---

## Configuração do Projeto

Siga os passos abaixo para configurar e rodar o projeto em sua máquina local:

### 1. **Clonar o Repositório**

Abra seu terminal ou prompt de comando e execute o seguinte comando para clonar o repositório:

```bash
git clone https://github.com/eryyoficial/wawa-gps.git
cd wawa-gps
```

### 2. **Instalar Dependências PHP**

Execute o comando abaixo para instalar as dependências PHP do projeto:

```bash
composer install
```

### 3. **Configurar o Arquivo de Ambiente**

* Crie uma cópia do arquivo `.env.example` e renomeie-o para `.env`

* Gere uma nova chave de aplicação Laravel:

```bash
php artisan key:generate
```

* Abra o arquivo `.env` e configure as credenciais do seu banco de dados. Exemplo:

```env
APP_NAME="Laravel"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wawa_db
DB_USERNAME=root
DB_PASSWORD=
```

* Crie o banco de dados com o nome `wawa_db`.

### 4. **Rodar as Migrações do Banco de Dados**

Execute as migrações para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

* Para popular o banco de dados com dados iniciais, execute os seeders:

```bash
php artisan db:seed
```

### 5. **Instalar Dependências JavaScript**

Execute o comando abaixo para instalar as dependências JavaScript:

```bash
npm install
```

### 6. **Compilar Assets de Frontend**

Compile os assets de frontend com o comando:

```bash
npm run dev
```

Mantenha este comando rodando em um terminal separado enquanto você desenvolve, para atualizar os arquivos CSS e JS automaticamente.

### 7. **Iniciar o Servidor de Desenvolvimento Laravel**

Por fim, inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

O servidor estará disponível em [http://localhost:8000](http://localhost:8000).


