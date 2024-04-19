# API de Lista de Tarefas

Esta API permite gerenciar uma lista de tarefas, fornecendo operações CRUD (Criar, Ler, Atualizar e Deletar) para os itens da lista.

## Endpoints

- `GET /api/items`: Retorna uma lista de todos os itens na lista de tarefas.
- `POST /api/item/store`: Cria um novo item na lista de tarefas.
- `PUT /api/item/{id}`: Atualiza um item existente na lista de tarefas.
- `DELETE /api/item/{id}`: Deleta um item da lista de tarefas.

## Modelo de Dados

Cada item na lista de tarefas possui os seguintes campos:

- `id`: Identificador único do item (automatically generated).
- `task`: A tarefa a ser realizada.
- `description`: Descrição da tarefa.
- `completed`: Indica se a tarefa foi concluída ou não.
- `completed_at`: Timestamp indicando quando a tarefa foi concluída (optional).

## Autenticação

Não é necessária autenticação para acessar os endpoints da API.

## Exemplos de Uso

### Listar todos os itens

GET /api/items

### Criar um novo item

POST /api/item/store
Content-Type: application/json

{
    "task": "Completar o projeto",
    "description": "Terminar a documentação do projeto",
    "completed": false
}

### Atualizar um item

PUT /api/item/{id}
Content-Type: application/json

{
    "task": "Completar o projeto",
    "description": "Terminar a documentação do projeto",
    "completed": true
}

### Deletar um item

DELETE /api/item/{id}

```http
