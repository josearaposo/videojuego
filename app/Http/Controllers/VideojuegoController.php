<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideojuegoRequest;
use App\Http\Requests\UpdateVideojuegoRequest;
use App\Models\Desarrolladora;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
     {
         $this->authorizeResource(Videojuego::class, 'videojuego');
     }

    public function index(Request $request)
    {
        $order = $request->query('order', 'desarrolladora');
        $order_dir = $request->query('order_dir', 'asc');


        $videojuegos = Videojuego::with(['desarrolladora'])
            ->selectRaw('videojuegos.* , desarrolladoras.nombre as desarrolladora, distribuidoras.nombre as distribuidora')
            ->leftJoin('desarrolladoras', 'videojuegos.desarrolladora_id', '=', 'desarrolladoras.id')
            ->leftJoin('distribuidoras', 'desarrolladoras.distribuidora_id', '=', 'distribuidoras.id')
            ->leftJoin('posesiones', 'posesiones.videojuego_id', '=', 'videojuegos.id')
            ->where('posesiones.user_id', '=', $request->user()->id)
            ->orderBy($order, $order_dir)
            ->orderBy('desarrolladora')
            ->paginate(3);
        return view('videojuegos.index', [
            'videojuegos' => $videojuegos,
            'order' => $order,
            'order_dir' => $order_dir,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videojuegos.create', [
            'desarrolladoras' => Desarrolladora::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideojuegoRequest $request)
    {
        $validate = $request->validated();
        Videojuego::create($validate);

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego creado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show', [
            'videojuego' => $videojuego,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        return view('videojuegos.edit', [
            'videojuego' => $videojuego,
            'desarrolladoras' => Desarrolladora::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideojuegoRequest $request, Videojuego $videojuego)
    {
        $validate = $request->validated();
        $videojuego->update($validate);

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();
        return redirect()->route('videojuegos.index');
    }
    public function insertar(Videojuego $videojuego)
    {
        $usuario = Auth::user();
        $videojuego->usuarios()->attach($usuario);
        return redirect()->route('poseo');
    }

    public function borrar(Videojuego $videojuego)
    {

        $videojuego->usuarios()->detach(Auth::user());
        return redirect()->route('poseo');
    }

}
