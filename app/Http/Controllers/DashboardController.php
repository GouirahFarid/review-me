<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PlaceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct( private readonly PlaceService $placeService)
    {
    }

    public function index()
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'auth' => auth()->user(),
            'phpVersion' => PHP_VERSION,
            'places' => $this->placeService->getTopRatedPlaces(),

        ]);
    }
}
