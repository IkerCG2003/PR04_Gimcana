<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorito;

class FavoritosController extends Controller
{
    public function añadirFav(Request $request)
    {
        // Comprobar si el marcador ya está añadido como favorito para este usuario
        $favoritoExistente = Favorito::where('id_usuario', session('id'))
                                      ->where('id_sitio', $request->id_sitio)
                                      ->first();
    
        // Si ya existe, elimina el registro y redirige con un mensaje de éxito
        if ($favoritoExistente) {
            $favoritoExistente->delete();
            return redirect()->back()->with('success', 'Sitio eliminado de tus favoritos.');
        }
    
        // Si no existe, crea un nuevo registro en la tabla tbl_favoritos
        Favorito::create([
            'id_usuario' => session('id'),
            'id_sitio' => $request->id_sitio
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Sitio añadido a favoritos correctamente.');   
    }
}
