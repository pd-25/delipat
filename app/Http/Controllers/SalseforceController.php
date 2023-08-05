<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class SalseforceController extends Controller
{
    public function create()
    {
        return view('admin.salseforce.create');
    }

    public function index(Services $services)
    {
        $data['services'] = $services->getAllSalseforceServices();
        return view('admin.salseforce.index', $data);
    }

    public function sConCreate(Services $services) {
        $data['services'] =  $services->getSalseServicesByTaken();
        return view('admin.salseforce.createContent', $data);
    }
}
