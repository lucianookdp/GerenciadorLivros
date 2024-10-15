
# Gerenciador de Livros

Este projeto é um **Gerenciador de Livros** construído com Laravel, destinado a facilitar a gestão de informações sobre livros.

## Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- [PHP](https://www.php.net/downloads) (versão 7.3 ou superior)
- [Composer](https://getcomposer.org/download/)

## Instalação

Siga os passos abaixo para configurar o projeto:

### 1. Clone o repositório

Clone este repositório em sua máquina local:

```bash
git clone https://github.com/lucianookdp/GerenciadorLivros.git
cd GerenciadorLivros
```

### 2. Instale as dependências

Instale as dependências do projeto usando Composer:

```bash
composer install
```

### 3. Configure o ambiente

1. Renomeie o arquivo `.env.example` para `.env`.
2. Abra o arquivo `.env` e configure suas credenciais de banco de dados.

### 4. Gere a chave do aplicativo

Execute o seguinte comando para gerar a chave de aplicativo:

```bash
php artisan key:generate
```

### 5. Execute as migrações

Se o projeto usar um banco de dados, execute as migrações para criar as tabelas necessárias:

```bash
php artisan migrate
```

### 6. Inicie o servidor local

Inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

Agora, você pode acessar o projeto em seu navegador através do endereço [http://localhost:8000](http://localhost:8000).

## Licença

Este projeto possui direitos autorais. Não é permitido copiar ou distribuir sem autorização.

---

Sinta-se à vontade para contribuir com melhorias!
