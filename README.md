# Documentação do Sistema de Gestão de Clientes PBSOFT

## 📌 Visão Geral
Sistema CRUD para gerenciamento de clientes desenvolvido em **Laravel 10**, com:
* Cadastro de clientes (nome, CPF/CNPJ, data de nascimento, foto e nome social)
* Validações robustas (incluindo CPF/CNPJ customizado)
* Interface responsiva com Bootstrap 5
* Upload de imagens (exclusivamente PNG)

## ⚙️ Pré-requisitos
* PHP 8.1+
* Composer
* Banco de dados MySQL
* Servidor web (Apache/Nginx) ou `php artisan serve`

## 🚀 Instalação
1. Clone o repositório:
```bash
git clone [URL_DO_REPOSITÓRIO]
cd pbsoft-clientes
```

2. Instale as dependências:
```bash
composer install
```

3. Configure o ambiente:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no `.env`:
```env
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

5. Execute as migrations:
```bash
php artisan migrate
```

6. Inicie o servidor:
```bash
php artisan serve
```

## 🛠️ Estrutura de Arquivos
```
pbsoft-clientes/
├── public/
│   ├── css/app.css       # Estilos personalizados
│   └── js/app.js        # JavaScript global
├── app/
│   ├── Models/Client.php
│   ├── Http/
│   │   ├── Controllers/ClientController.php
│   │   └── Requests/      # Validações customizadas
├── resources/views/      # Telas Blade
└── database/migrations/  # Esquema do banco
```

## 🔧 Tecnologias Utilizadas

| Tecnologia | Finalidade |
|------------|------------|
| Laravel 11 | Backend MVC |
| Bootstrap 5 | UI Responsiva |
| Carbon | Manipulação de datas |
| Intervention Image | Processamento de imagens |
| jQuery Mask | Formatação de campos |

## 🎨 Frontend

### Arquivos Principais
* **CSS**: `public/css/app.css`
```css
:root {
  --primary-color: #4e73df;
  --secondary-color: #f8f9fc;
}
/* ... */
```

* **JavaScript**: `public/js/app.js`
```js
// Máscaras e validações
$(document).ready(function() {
  $('#cpf_cnpj').mask('000.000.000-00');
});
```

### Bibliotecas Incluídas via CDN
* Bootstrap 5
* Bootstrap Icons
* jQuery 3.6
* jQuery Mask Plugin

## 📋 Funcionalidades

### Validações Implementadas

| Campo | Regras |
|-------|--------|
| Nome | Obrigatório, máximo 255 chars |
| CPF/CNPJ | Obrigatório, único, formato válido |
| Foto | PNG, máximo 2MB |
| Data Nasc. | Obrigatório, formato date |

### Exemplo de Validação Customizada
```php
// app/Rules/CpfCnpj.php
public function passes($attribute, $value) {
    $cleaned = preg_replace('/[^0-9]/', '', $value);
    return (strlen($cleaned) === 11) ? $this->validaCPF($cleaned) : $this->validaCNPJ($cleaned);
}
```

## 🖥️ Telas

| Rota | Descrição |
|------|-----------|
| `GET /clients` | Listagem paginada |
| `GET /clients/create` | Formulário de cadastro |
| `POST /clients` | Processa cadastro |
| `GET /clients/{id}` | Detalhes do cliente |
| `GET /clients/{id}/edit` | Formulário de edição |
| `PUT /clients/{id}` | Processa edição |
| `DELETE /clients/{id}` | Remove cliente |

## 🔒 Variáveis de Ambiente Críticas
```env
APP_URL=http://localhost:8000
STORAGE_DISK=public
```

## 📦 Dependências do Composer

| Pacote | Versão |
|--------|--------|
| laravel/framework | ^10.0 |
| intervention/image | ^2.7 |
