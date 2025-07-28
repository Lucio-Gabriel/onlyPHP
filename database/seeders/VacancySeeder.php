<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    public function run(): void
    {
        Vacancy::create([
            'title'         => 'Desenvolvedor PHP Pleno',
            'description'   => 'Desenvolvimento de APIs e manutenção de sistemas legados utilizando Laravel.',
            'city'          => 'São Paulo',
            'state'         => 'SP',
            'company'       => 'Tech Solutions',
            'stacks'        => 'laravel',
            'salary'        => 5000,
            'type'          => 'full-time',
            'contract_type' => 'clt',
            'location'      => 'remote',
            'user_id'       => 1,
        ]);

        Vacancy::create([
            'title'         => 'Dev WordPress',
            'description'   => 'Criação de temas e plugins para WordPress em projetos personalizados.',
            'city'          => 'Rio de Janeiro',
            'state'         => 'RJ',
            'company'       => 'Agência Criativa RJ',
            'stacks'        => 'wordpress',
            'salary'        => 3500,
            'type'          => 'contract',
            'contract_type' => 'pj',
            'location'      => 'on-site',
            'user_id'       => 2,
        ]);

        Vacancy::create([
            'title'         => 'Dev Symfony Junior',
            'description'   => 'Manutenção de APIs internas e integração com serviços REST.',
            'city'          => 'Curitiba',
            'state'         => 'PR',
            'company'       => 'SoftBR',
            'stacks'        => 'symfony',
            'salary'        => 3000,
            'type'          => 'full-time',
            'contract_type' => 'clt',
            'location'      => 'hybrid',
            'user_id'       => 3,
        ]);

        Vacancy::create([
            'title'         => 'Estágio em PHP',
            'description'   => 'Suporte ao time de desenvolvimento com foco em aplicações CodeIgniter.',
            'city'          => 'Recife',
            'state'         => 'PE',
            'company'       => 'DevJr Labs',
            'stacks'        => 'codeigniter',
            'salary'        => 2000,
            'type'          => 'part-time',
            'contract_type' => 'trainee',
            'location'      => 'on-site',
            'user_id'       => 4,
        ]);

        Vacancy::create([
            'title'         => 'Fullstack PHP com CakePHP',
            'description'   => 'Projetos para sistemas internos e refatoração com CakePHP + Vue.js.',
            'city'          => 'Florianópolis',
            'state'         => 'SC',
            'company'       => 'Cake Systems',
            'stacks'        => 'cakephp',
            'salary'        => 7000,
            'type'          => 'full-time',
            'contract_type' => 'pj',
            'location'      => 'remote',
            'user_id'       => 1,
        ]);

        Vacancy::create([
            'title'         => 'Backend Zend/Laminas',
            'description'   => 'Suporte e evolução de plataforma utilizando Zend Framework (Laminas).',
            'city'          => 'Porto Alegre',
            'state'         => 'RS',
            'company'       => 'Framework Solutions',
            'stacks'        => 'laminas',
            'salary'        => 6000,
            'type'          => 'contract',
            'contract_type' => 'pj',
            'location'      => 'hybrid',
            'user_id'       => 2,
        ]);

    }
}
