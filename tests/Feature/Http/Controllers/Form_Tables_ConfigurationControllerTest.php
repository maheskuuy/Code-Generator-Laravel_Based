<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\FormTablesConfiguration;
use App\Models\Form_Tables_Configuration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Form_Tables_ConfigurationController
 */
final class Form_Tables_ConfigurationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $formTablesConfigurations = Form_Tables_Configuration::factory()->count(3)->create();

        $response = $this->get(route('form_-tables_-configurations.index'));

        $response->assertOk();
        $response->assertViewIs('formTablesConfiguration.index');
        $response->assertViewHas('formTablesConfigurations');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('form_-tables_-configurations.create'));

        $response->assertOk();
        $response->assertViewIs('formTablesConfiguration.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Form_Tables_ConfigurationController::class,
            'store',
            \App\Http\Requests\Form_Tables_ConfigurationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('form_-tables_-configurations.store'));

        $response->assertRedirect(route('formTablesConfigurations.index'));
        $response->assertSessionHas('formTablesConfiguration.id', $formTablesConfiguration->id);

        $this->assertDatabaseHas(formTablesConfigurations, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $formTablesConfiguration = Form_Tables_Configuration::factory()->create();

        $response = $this->get(route('form_-tables_-configurations.show', $formTablesConfiguration));

        $response->assertOk();
        $response->assertViewIs('formTablesConfiguration.show');
        $response->assertViewHas('formTablesConfiguration');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $formTablesConfiguration = Form_Tables_Configuration::factory()->create();

        $response = $this->get(route('form_-tables_-configurations.edit', $formTablesConfiguration));

        $response->assertOk();
        $response->assertViewIs('formTablesConfiguration.edit');
        $response->assertViewHas('formTablesConfiguration');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Form_Tables_ConfigurationController::class,
            'update',
            \App\Http\Requests\Form_Tables_ConfigurationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $formTablesConfiguration = Form_Tables_Configuration::factory()->create();

        $response = $this->put(route('form_-tables_-configurations.update', $formTablesConfiguration));

        $formTablesConfiguration->refresh();

        $response->assertRedirect(route('formTablesConfigurations.index'));
        $response->assertSessionHas('formTablesConfiguration.id', $formTablesConfiguration->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $formTablesConfiguration = Form_Tables_Configuration::factory()->create();
        $formTablesConfiguration = FormTablesConfiguration::factory()->create();

        $response = $this->delete(route('form_-tables_-configurations.destroy', $formTablesConfiguration));

        $response->assertRedirect(route('formTablesConfigurations.index'));

        $this->assertModelMissing($formTablesConfiguration);
    }


    #[Test]
    public function __invoke_displays_view(): void
    {
        $response = $this->get(route('form_-tables_-configurations.__invoke'));

        $response->assertOk();
        $response->assertViewIs('formTablesConfiguration');
    }
}
