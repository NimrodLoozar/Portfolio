<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    /**
     * Indicate that the model's title is "My Project"
     *
     * @return \Database\Factories\ProjectsFactory
     */
    public function ModernKnights(): ProjectsFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'title' => 'ModernKnight',
                'description' => 'Opkomend zelf bedachte game',

                'heading1' => 'Dit project was de eerste project van leerjaar 1.
De opdracht was om met een groepje van drie een website te maken over een opkomende game of serie.
wei hebben ervoor gekozen om een game zelf te bedenken en een site daarvoor te bouwen.
Mijn taak was om de FAQ pagina te maken. We hebben over de hele website mijn styling idee gebruikt.',

                'heading2' => 'Heading 2',
                'heading3' => 'Heading 3',
                'heading4' => 'Heading 4',
                'url' => 'https://modernknights.com',
                'year' => '2021',
                'banner' => 'banners/banner.jpg',
                'images' => ['images/image1.jpg', 'images/image2.jpg'],
            ];
        });
    }
}
