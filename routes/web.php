<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function() {
    return redirect('app');
});

# Nota: sempre meglio nominare i metodi dei controller in base alla funzione CRUD che svolgono, in questo caso show
# Nota: quando abbiamo un access point unico per Vue Router, bisogna aggiungere la wildcard {any?},
# altrimenti quando fai refresh dentro una pagina secondaria (es. beat/account) passa dal server che non sa risolverlo
// Route::get('/{event}', [EventController::class, 'getEvent']);
Route::get('/{event}/{any?}', [EventController::class, 'show']);
