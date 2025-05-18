<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'company_name' => Cache::get('company_name', ''),
            'company_address' => Cache::get('company_address', ''),
            'company_phone' => Cache::get('company_phone', ''),
            'company_email' => Cache::get('company_email', ''),
            'currency' => Cache::get('currency', 'UZS'),
            'tax_rate' => Cache::get('tax_rate', 0),
            'low_stock_threshold' => Cache::get('low_stock_threshold', 10),
            'enable_notifications' => Cache::get('enable_notifications', true),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string',
            'company_phone' => 'required|string|max:20',
            'company_email' => 'required|email|max:255',
            'currency' => 'required|string|max:10',
            'tax_rate' => 'required|numeric|min:0|max:100',
            'low_stock_threshold' => 'required|integer|min:1',
            'enable_notifications' => 'required|boolean'
        ]);

        foreach ($validated as $key => $value) {
            Cache::put($key, $value);
        }

        return redirect()->route('admin.settings')
            ->with('success', 'Sozlamalar muvaffaqiyatli yangilandi.');
    }
}
