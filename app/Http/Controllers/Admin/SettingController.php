<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key)->store('settings', 'public');
                Setting::set($key, $file);
            } else {
                Setting::set($key, $value);
            }
        }

        return back()->with('success', 'Instellingen opgeslagen');
    }
}
