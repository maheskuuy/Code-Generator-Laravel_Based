<?php

namespace App\Http\Controllers;

use App\Http\Requests\Menu_ConfigurationStoreRequest;
use App\Http\Requests\Menu_ConfigurationUpdateRequest;
use App\MenuConfiguration;
use App\Menu_Configuration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Menu_ConfigurationController extends Controller
{
    public function index(Request $request): Response
    {
        $menuConfigurations = MenuConfiguration::all();

        return view('menuConfiguration.index', compact('menuConfigurations'));
    }

    public function create(Request $request): Response
    {
        return view('menuConfiguration.create');
    }

    public function store(Menu_ConfigurationStoreRequest $request): Response
    {
        $menuConfiguration = MenuConfiguration::create($request->validated());

        $request->session()->flash('menuConfiguration.id', $menuConfiguration->id);

        return redirect()->route('menuConfigurations.index');
    }

    public function show(Request $request, Menu_Configuration $menuConfiguration): Response
    {
        return view('menuConfiguration.show', compact('menuConfiguration'));
    }

    public function edit(Request $request, Menu_Configuration $menuConfiguration): Response
    {
        return view('menuConfiguration.edit', compact('menuConfiguration'));
    }

    public function update(Menu_ConfigurationUpdateRequest $request, Menu_Configuration $menuConfiguration): Response
    {
        $menuConfiguration->update($request->validated());

        $request->session()->flash('menuConfiguration.id', $menuConfiguration->id);

        return redirect()->route('menuConfigurations.index');
    }

    public function destroy(Request $request, Menu_Configuration $menuConfiguration): Response
    {
        $menuConfiguration->delete();

        return redirect()->route('menuConfigurations.index');
    }

    public function __invoke(Request $request): Response
    {
        return view('menuConfiguration');
    }
}
