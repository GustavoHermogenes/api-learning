<p align="center">
  <img src="banner.svg" width="100%" alt="API Academia"/>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.0-1E1E1E?style=for-the-badge&logo=php&logoColor=FF2D20"/>
  <img src="https://img.shields.io/badge/Laravel-9-1E1E1E?style=for-the-badge&logo=laravel&logoColor=FF2D20"/>
  <img src="https://img.shields.io/badge/MySQL-1E1E1E?style=for-the-badge&logo=mysql&logoColor=FF2D20"/>
  <img src="https://img.shields.io/badge/REST_API-1E1E1E?style=for-the-badge&logo=postman&logoColor=FF2D20"/>
</p>

---

## <img src="https://img.shields.io/badge/-%20-FF2D20?style=flat-square" height="15" align="absmiddle"/> Sobre o projeto

**API REST** desenvolvida em **Laravel** para praticar a construção de APIs. Ela gerencia o cadastro de **alunos** e **instrutores**, com **upload de foto**, validação de dados e respostas em JSON.

---

## <img src="https://img.shields.io/badge/-%20-FF2D20?style=flat-square" height="15" align="absmiddle"/> Funcionalidades

- CRUD completo de alunos e instrutores via `apiResource`
- Upload de imagem com armazenamento no disco `public`
- Remoção automática da foto antiga ao atualizar o registro
- Atualização parcial com `PATCH`, validando apenas os campos enviados
- Mensagens de validação personalizadas
- Respostas de erro em JSON (`404` para registros inexistentes)

---

## <img src="https://img.shields.io/badge/-%20-FF2D20?style=flat-square" height="15" align="absmiddle"/> Endpoints

| Método | Rota | Descrição |
|:---:|:---|:---|
| `GET` | `/api/aluno` | Lista todos os alunos |
| `POST` | `/api/aluno` | Cadastra um aluno (`nome`, `foto`) |
| `GET` | `/api/aluno/{id}` | Exibe um aluno |
| `PUT` / `PATCH` | `/api/aluno/{id}` | Atualiza um aluno (completo ou parcial) |
| `DELETE` | `/api/aluno/{id}` | Remove um aluno |
| `GET` | `/api/instrutor` | Lista todos os instrutores |
| `POST` | `/api/instrutor` | Cadastra um instrutor (`nome`, `foto`) |
| `GET` | `/api/instrutor/{id}` | Exibe um instrutor |
| `PUT` / `PATCH` | `/api/instrutor/{id}` | Atualiza um instrutor (completo ou parcial) |
| `DELETE` | `/api/instrutor/{id}` | Remove um instrutor |

> Envie `POST`, `PUT` e `PATCH` como `multipart/form-data` quando houver foto.

---

## <img src="https://img.shields.io/badge/-%20-FF2D20?style=flat-square" height="15" align="absmiddle"/> Como executar

**Pré-requisitos:** PHP 8.0+, Composer e MySQL.

```bash
# Clonar o repositório
git clone https://github.com/GustavoHermogenes/api-learning.git
cd api-learning

# Instalar as dependências
composer install

# Configurar o ambiente
cp .env.example .env
php artisan key:generate
# Ajuste as credenciais do banco de dados no arquivo .env

# Criar as tabelas e o link público das imagens
php artisan migrate
php artisan storage:link

# Iniciar o servidor
php artisan serve
```

A API estará disponível em `http://localhost:8000/api`.

---

## <img src="https://img.shields.io/badge/-%20-FF2D20?style=flat-square" height="15" align="absmiddle"/> Autor

<p>
  <b>Gustavo Hermogenes</b> — Desenvolvedor Full Stack<br/><br/>
  <a href="https://github.com/GustavoHermogenes" target="_blank"><img src="https://img.shields.io/badge/GitHub-1E1E1E?style=for-the-badge&logo=github&logoColor=FF2D20"/></a>
  <a href="https://www.linkedin.com/in/gustavohermogenes/" target="_blank"><img src="https://img.shields.io/badge/LinkedIn-1E1E1E?style=for-the-badge&logo=linkedin&logoColor=FF2D20"/></a>
</p>

<p align="center">
  <img src="https://capsule-render.vercel.app/api?type=waving&color=0:FF2D20,100:1E1E1E&height=100&section=footer" width="100%"/>
</p>
