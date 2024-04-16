<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Http\Requests\StoreSettingsRequest;
use App\Http\Requests\UpdateSettingsRequest;
use App\Models\JobStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * Instantiate a new SettingsController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:edit-user', ['only' => ['show','edit','update']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('settings.index', [
            'settings'  => Settings::where('group', '<>', 'package')
                ->orderBy('group', 'ASC')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): RedirectResponse
    {
        // - not authorised
        return redirect()->route('home')
            ->withErrors('you are not authorised to access this page, [settings.create]');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        // - not authorised
        return redirect()->route('home')
            ->withErrors('you are not authorised to access this page, [settings.store]');
    }

    /**
     * Display the specified resource.
     */
    public function show(): View
    {
        return view('settings.index', [
            'settings' => Settings::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $setting): View
    {
        $model = "App\Models\\" . $setting->model;
        switch ($setting->type) {

            case 'modelinteger':
                $data = [
                    'model'     => $model::all(),
                    'setting'   => $setting,
                ];
                break;

            case 'string':
            default:
                $data = [
                    'setting'   => $setting,
                ];
                break;
        }
        return view('settings.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingsRequest $request, Settings $setting): RedirectResponse
    {
        $setting->update($request->all());
        return redirect()->route('settings.index')
            ->withSuccess('Setting succesfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings): RedirectResponse
    {
        // - not authorised
        return redirect()->route('home')
            ->withErrors('you are not authorised to access this page, [settings.destroy]');
    }
}
