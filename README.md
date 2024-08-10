# Projeto de Desenvolvimento de Sistema

## Visão Geral

Este projeto foi desenvolvido para demonstrar boas práticas de desenvolvimento de software, incluindo **Clean Architecture**, **Command Pattern**, e boas práticas de **object calisthenics** e **PSRs**. Utilizamos **PHP 8.3**, **Laravel 11**, **Nginx** e **PostgreSQL** para criar uma aplicação robusta e escalável. O projeto inclui testes unitários, de features e de arquitetura para garantir a qualidade e confiabilidade do código.

## Tecnologias Utilizadas

- **PHP 8.3**
- **Laravel 11**
- **Nginx**
- **PostgreSQL**
- **Docker** e **Docker Compose** para orquestração do ambiente

## Tempo de Desenvolvimento

O desenvolvimento deste projeto levou aproximadamente **06:00h** horas para ser concluído. Este tempo inclui a configuração do ambiente, desenvolvimento de funcionalidades, e escrita de testes.

## Boas Práticas Seguidas

- **Clean Architecture**: Estrutura do projeto organizada para garantir separação de responsabilidades e facilitar a manutenção.
- **Design Pattern de Actions**: Implementação de ações específicas para operações de CRUD.
- **Object Calisthenics**: Aplicação de boas práticas de desenvolvimento orientado a objetos.
- **PSRs**: Conformidade com os padrões de codificação do PHP-FIG.
- **Testes**: Incluímos testes unitários, de features e de arquitetura para garantir a qualidade do software.

## Configuração do Ambiente

Para subir o ambiente de desenvolvimento, siga os passos abaixo:

### Comandos Básicos do Docker Compose

1. **Construir ou reconstruir serviços**
   ```bash
   docker-compose -f docker-compose-local.yml build

2. **Criar e iniciar containers**
    ```bash
    docker-compose -f docker-compose-local.yml up -d

3. **Executar as migrations**
    ```bash
    docker compose exec [container] php artisan

## Melhorias Futuras

Além das funcionalidades implementadas, consideramos adicionar as seguintes melhorias ao projeto:

- **Documentação Swagger**: Para gerar uma documentação interativa da API.
- **Camada de Logs**: Implementar um sistema de logging, como o **Log Viewer**, para monitorar e analisar logs da aplicação.
- **Makefile**: Criar um Makefile para simplificar e automatizar comandos comuns.
- **stubs**: Refinar a arquitetura com uma camada adicional de criação de Domain, DTO e Command, utilizando stubs do Laravel para padronização e organização do código.

