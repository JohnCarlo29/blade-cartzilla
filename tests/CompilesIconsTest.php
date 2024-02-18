<?php

declare(strict_types=1);

namespace Tests;

use BladeUI\Icons\BladeIconsServiceProvider;
use JohnCarlo29\Cartzilla\BladeCartzillaServiceProvider;
use Orchestra\Testbench\TestCase;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('cartzilla-add-circle')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
        <title>add-circle</title>
        <path d="M16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16c0-8.8-7.2-16-16-16zM16 29.867c-7.6 0-13.867-6.267-13.867-13.867s6.267-13.867 13.867-13.867 13.867 6.267 13.867 13.867-6.267 13.867-13.867 13.867v0zM21.867 15.333h-4.4v-4.4c0-0.667-0.533-1.067-1.067-1.067s-1.067 0.533-1.067 1.067v4.4h-4.4c-0.667 0-1.067 0.533-1.067 1.067s0.533 1.067 1.067 1.067h4.4v4.4c0 0.667 0.533 1.067 1.067 1.067s1.067-0.533 1.067-1.067v-4.4h4.4c0.667 0 1.067-0.533 1.067-1.067s-0.533-1.067-1.067-1.067z"></path>
        </svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('cartzilla-add-circle', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
        <svg class="w-6 h-6 text-gray-500" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
        <title>add-circle</title>
        <path d="M16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16c0-8.8-7.2-16-16-16zM16 29.867c-7.6 0-13.867-6.267-13.867-13.867s6.267-13.867 13.867-13.867 13.867 6.267 13.867 13.867-6.267 13.867-13.867 13.867v0zM21.867 15.333h-4.4v-4.4c0-0.667-0.533-1.067-1.067-1.067s-1.067 0.533-1.067 1.067v4.4h-4.4c-0.667 0-1.067 0.533-1.067 1.067s0.533 1.067 1.067 1.067h4.4v4.4c0 0.667 0.533 1.067 1.067 1.067s1.067-0.533 1.067-1.067v-4.4h4.4c0.667 0 1.067-0.533 1.067-1.067s-0.533-1.067-1.067-1.067z"></path>
        </svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('cartzilla-add-circle', ['style' => 'color: #555'])->toHtml();

            $expected = <<<'SVG'
            <svg style="color: #555" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
            <title>add-circle</title>
            <path d="M16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16c0-8.8-7.2-16-16-16zM16 29.867c-7.6 0-13.867-6.267-13.867-13.867s6.267-13.867 13.867-13.867 13.867 6.267 13.867 13.867-6.267 13.867-13.867 13.867v0zM21.867 15.333h-4.4v-4.4c0-0.667-0.533-1.067-1.067-1.067s-1.067 0.533-1.067 1.067v4.4h-4.4c-0.667 0-1.067 0.533-1.067 1.067s0.533 1.067 1.067 1.067h4.4v4.4c0 0.667 0.533 1.067 1.067 1.067s1.067-0.533 1.067-1.067v-4.4h4.4c0.667 0 1.067-0.533 1.067-1.067s-0.533-1.067-1.067-1.067z"></path>
            </svg>
                SVG;

        $this->assertSame($expected, $result);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeCartzillaServiceProvider::class,
        ];
    }
}
