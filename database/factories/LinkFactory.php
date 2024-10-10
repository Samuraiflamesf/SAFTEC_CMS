<?php

namespace Database\Factories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    protected $model = Link::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $links = [
            ['name' => 'Fluxos de atendimento por patologia - SESAB', 'url' => 'https://www.saude.ba.gov.br/atencao-a-saude/comofuncionaosus/medicamentos/medicamentos-especializados/fluxos-de-atendimento-por-patologia/'],
            ['name' => 'PCDT - MS', 'url' => 'https://www.gov.br/saude/pt-br/assuntos/protocolos-clinicos-e-diretrizes-terapeuticas-pcdt'],
            ['name' => 'AGHUse', 'url' => 'https://aghuse.saude.ba.gov.br/aghu/pages/casca/casca.xhtml'],
            ['name' => 'AFSESAB', 'url' => 'http://afsesab.sesab.ba.gov.br/#/'],
            ['name' => 'BI - AGHUse', 'url' => 'https://pgs.saude.ba.gov.br/'],
            ['name' => 'Suporte Informática', 'url' => 'http://cimeb.infinityfreeapp.com'],
        ];

        $link = $this->faker->randomElement($links);

        return [
            'name' => $link['name'],
            'url' => $link['url'],
        ];
        
    }
}