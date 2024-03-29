<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ArticleImage;
use Illuminate\Support\Facades\Storage;

class ArticleImageController extends Controller
{
    public function destroy(ArticleImage $imagen)
    {
        Storage::disk('public')->delete('/imagenesArticulos/'.$imagen->nombre);
        $imagen->forceDelete();
        $notificacion="Imágen eliminada correctamente correctamente";
        return back()->with(compact('notificacion'));
    }
}
