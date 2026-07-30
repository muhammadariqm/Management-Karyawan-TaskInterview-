<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WilayahController extends Controller
{
    public function provinces()
    {
        return Http::get(
            'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'
        )->json();
    }

    public function regencies($id)
    {
        return Http::get(
            "https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$id}.json"
        )->json();
    }

    public function districts($id)
    {
        return Http::get(
            "https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$id}.json"
        )->json();
    }

    public function villages($id)
    {
        return Http::get(
            "https://www.emsifa.com/api-wilayah-indonesia/api/villages/{$id}.json"
        )->json();
    }
}