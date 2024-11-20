<?php

use App\Models\Stacks;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $stacks = Stacks::all();
    return view('pages/home/app', ['stacks' => $stacks]);
});