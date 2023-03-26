<?php

use App\Http\Controllers\OpenAIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [OpenAIController::class, 'index'])->name('home');
Route::get('openai-demo', [OpenAIController::class, 'openAIDemo'])->name('openai-demo');
Route::post('text-moderation', [OpenAIController::class, 'textModeration'])->name('text-moderation');
Route::post('spell-check', [OpenAIController::class, 'spellCheck'])->name('spell-check');
Route::post('text-completion', [OpenAIController::class, 'textCompletion'])->name('text-completion');
Route::post('image-generation', [OpenAIController::class, 'imageGeneration'])->name('image-generation');
Route::post('image-variation', [OpenAIController::class, 'imageVariation'])->name('image-variation');
