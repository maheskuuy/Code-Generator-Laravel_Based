<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\MenuConfiguration;
use App\Models\Menu_Configuration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Menu_ConfigurationController
 */
final class Menu_ConfigurationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $menuConfigurations = Menu_Configuration::factory()->count(3)->create();

        $response = $this->get(route('menu_-configurations.index'));

        $response->assertOk();
        $response->assertViewIs('menuConfiguration.index');
        $response->assertViewHas('menuConfigurations');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('menu_-configurations.create'));

        $response->assertOk();
        $response->assertViewIs('menuConfiguration.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Menu_ConfigurationController::class,
            'store',
            \App\Http\Requests\Menu_ConfigurationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('menu_-configurations.store'));

        $response->assertRedirect(route('menuConfigurations.index'));
        $response->assertSessionHas('menuConfiguration.id', $menuConfiguration->id);

        $this->assertDatabaseHas(menuConfigurations, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $menuConfiguration = Menu_Configuration::factory()->create();

        $response = $this->get(route('menu_-configurations.show', $menuConfiguration));

        $response->assertOk();
        $response->assertViewIs('menuConfiguration.show');
        $response->assertViewHas('menuConfiguration');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $menuConfiguration = Menu_Configuration::factory()->create();

        $response = $this->get(route('menu_-configurations.edit', $menuConfiguration));

        $response->assertOk();
        $response->assertViewIs('menuConfiguration.edit');
        $response->assertViewHas('menuConfiguration');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Menu_ConfigurationController::class,
            'update',
            \App\Http\Requests\Menu_ConfigurationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $menuConfiguration = Menu_Configuration::factory()->create();

        $response = $this->put(route('menu_-configurations.update', $menuConfiguration));

        $menuConfiguration->refresh();

        $response->assertRedirect(route('menuConfigurations.index'));
        $response->assertSessionHas('menuConfiguration.id', $menuConfiguration->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $menuConfiguration = Menu_Configuration::factory()->create();
        $menuConfiguration = MenuConfiguration::factory()->create();

        $response = $this->delete(route('menu_-configurations.destroy', $menuConfiguration));

        $response->assertRedirect(route('menuConfigurations.index'));

        $this->assertModelMissing($menuConfiguration);
    }


    #[Test]
    public function __invoke_displays_view(): void
    {
        $response = $this->get(route('menu_-configurations.__invoke'));

        $response->assertOk();
        $response->assertViewIs('menuConfiguration');
    }
}
