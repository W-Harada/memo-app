<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;

Route::post('/api/memos',[MemoController::class, 'store']);
