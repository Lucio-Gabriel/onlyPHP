<p align="center"><a href="https://laravel.com" target="_blank"><img src="/public/images/logo/php.png" width="300" alt="Laravel Logo"></a></p>

# onlyPHP

Uma **plataforma de vagas exclusiva para desenvolvedores PHP**. Foco em vagas que realmente exigem conhecimento de PHP e suas principais stacks (Laravel, Symfony, WordPress, Zend, etc).

[Saiba mais sobre o projeto](https://www.linkedin.com/posts/lucio-azevedo_php-laravel-project-activity-7351569054828036097-3hx4?utm_source=share&utm_medium=member_desktop&rcm=ACoAAFbTjrQB3b6Yq39yznOrI7H_4kKeUbbFTNE)

[Acesse o discord do projeto](https://discord.gg/a9VSs7jA)

## Stack utilizada

**Front-end:** Livewire, alpineJS, TailwindCSS

**Back-end:** PHP, Laravel, Mysql


## Funcionalidades para candidato

- Cadastro/login
- Perfil com stack principal (Laravel, Symfony, etc), nível, experiência
- Currículo online + link para portfólio/GitHub
- Sistema de busca e filtros por vagas
- Candidatura simplificada
- Notificações por e-mail

## Funcionalidades para empresas
- Cadastro/login de recrutadores
- Cadastro de empresa com logo e descrição
- Publicação de vagas
- Dashboard para ver número de candidaturas
- Vagas destacadas

## Instalação e Execução

Clone este repositório:

```bash
    git clone https://github.com/SeuUsuario/onlyPHP.git
```

Configure seu .env:

```bash
    cp .env.example .env
```

Crie o banco de dados de exemplo (SQLITE):

```bash
    composer create-test-database
```

Execute as migrations:

```bash
    php artisan migrate
```

Execute os seeders:

```bash
    php artisan db:seed
```

Execute os testes:

```bash
    php artisan test
```

Rode os servidores:

```bash
    php artisan serve & npm run dev
```

Acesse o sistema:

```bash
    http://localhost
```
## Contribuindo

Contribuições são sempre bem-vindas!

Veja - [Guia de Contribuição](./CONTRIBUINDO.md) para saber como começar.



