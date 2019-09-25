<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App; //Usando App

class PagesController extends Controller
{
	// Controlador de la vista welcome.
    public function inicio()
    {
        $notas = App\Nota::paginate(5);
            // Variable $notas (va a guardar todo lo que viene de la tabla notas de la DB).
            //App\Nota = nombre del modelo (Nota).
            //pagination()- Trae todos los datos de la DB y hace una paginación.
            //$notas = App\Ntrae todos los datos de la DBota::all(); all() trae todos los datos de la DB.
    	return view('welcome', compact('notas'));
            // compact evita la duplicidad al definir la variable notas.
            // --view('welcome', ['notas'=>$notas]);-- es lo mismo que --view('welcome', compact('notas'));--
            // Blade asume que la variable que almacena los datos de DB es la misma es la variable que vamos a utilizar.
    }

    // Controlador de la vista notas/detalle.
    public function detalle($id)
        // ($id) Es el nombre del parametro que va a recibir
    {
        $nota = App\Nota::findOrFail($id);
        // findOrFail() = Si no encuentra el parametro($id) lleva a la pagina 404
        return view('notas.detalle', compact('nota'));
    }

    // Controlador de la vista notas/crear.
    public function crear(Request $request)
        //(Request $request) - Para capturar tota la información que esta mandando el formulario (welcome -form-)
    {
        $request->validate([//validacion para los campos vacios.
            'nombre' => 'required',//Nombre del campo a validar.
            'description' => 'required',
        ]);

        $notaNueva = new App\Nota;//$notaNueva - es igual al modelo y sus propiedades (Nombre y Descripción) que es App\Nota
        $notaNueva->nombre = $request->nombre;
            //$notaNueva = la variable anteriormrnte definida
            //->nombre = nombre que le estoy agregando a la nota que sacamos de $request.
            //$request->nombre = Acceder a la varibale y traer su nombre
            //nombre; = El nombre que tiene el campo (input) en el formulario
        $notaNueva->description = $request->description;
        $notaNueva->save();//para guardar la notaNueva
        return back()->with('mensaje', 'Nota agregada');
            //back() - Nos trae de vuelta al lugar anterior, pestaña enterior o pagina web.
            //with = Para devolver un mnsaje.
            //mensaje = nombre de la variable que va a viajar como mensaje a la vista.
            //Nota agregada  = el valor de la variable.
    }

    // Controlador de la vista notas/editar.
    public function editar($id)
    {
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }

    // Controlador de la vista notas/editar - actualizar.
    public function actualizar(Request $request, $id)
        /*  $request viene la informacion nueva.
            $id captura tota la información que esta mandando
            el formulario (notas.editar -form-) y el $id es el que estamos
            pasando en el formlario que estoy editando ({{ route('notas.actualizar', $nota->id) }}" )*/
    {
        $notaActualizar = App\Nota::findOrFail($id);
            //$notaActualizar - es igual al modelo y sus propiedades (Nombre y Descripción) que es App\Nota
        $notaActualizar->nombre = $request->nombre;
        $notaActualizar->description = $request->description;
        $notaActualizar->save();

        return back()->with('mensaje', 'Nota actualizada');
    }
    // Controlador de la vista notas/editar - eliminar.
    public function eliminar($id)
    {
        $notaEliminar = App\Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('mensaje', 'Nota eliminada');
    }

    // Controlador de la vista fotos.
    public function fotos()
    {
    	return view('fotos');
    }

    // Controlador de la vista nosotros.
    public function nosotros($nombre = null)
    {
    	$equipo = ['user1', 'user2', 'user3'];
    	return view('nosotros', compact('equipo', 'nombre'));
    }

    // Controlador de la vista blog.
    public function blog()
    {
    	return view('blog');
    }
}
