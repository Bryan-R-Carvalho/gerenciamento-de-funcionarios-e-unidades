## Gerenciamento de Funcionários e Unidades
Este é um projeto de gerenciamento de funcionários e unidades, desenvolvido com Laravel. Ele permite cadastrar, editar e excluir funcionários e unidades, bem como gerenciar seus relacionamentos.

## Instalação ⚙️

1-Clone este repositório para o seu computador:

```bash
 git clone https://github.com/Bryan-R-Carvalho/gerenciamento-de-funcionarios-e-unidades.git
```

2-Instale as dependências do projeto

```bash
  composer install
```
3-Configure as informações de conexão com o banco de dados no arquivo .env
```bash
cp .env.example .env
```
4-Execute as migrações para criar as tabelas do banco de dados :
```bash
  php artisan migrate
```

5-Inicie o servidor interno do Laravel:
```bash
  php artisan serve
```
Agora você pode acessar o projeto em http://localhost:8000

## Funcionalidades
- CRUD de funcionários
- CRUD de unidades
- Cadastro de endereços com a API do ViaCep
- Vínculo entre funcionários, endereços e unidades
- Confirmaçao de cadastro por email

