<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Por aqui tengo el index el cual Mediante un array me llevo los registros ala vista index
     * 
     */
    public function index()
    {
        $personas = Persona::all();
        return view('tienda.index', compact('personas'));
    }

    /**
     * Aqui llamo el metodo create el cual redirige ala vista tienda.create
     */
    public function create()
    {
        return view('tienda.create');
    }

    /**
     * Aqui el metodo para registrar
     */
    public function store(Request $request)
    {
        //una validacion el los datos
        $request->validate([
            'Nombre' => 'required|string|min:5|max:100',
            'Apellido' => 'required|string|min:5|max:100'
        ]);
        //llamo la clase y el metodo create y el parametro request->all()..trae los datos de la vista

        Persona::create($request->all());
       //luego redireciono ala tienda.index y listar el registro
        return redirect()->route('tienda.index')->with('success', 'Persona created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        return view('tienda.show', compact('persona'));
    }

    /**
     * Aqui el metodo de editar el cual le paso de parametro el id
     * se crea una Array de tipo Persona para filtrar el id obtenido de la vista
     * mediante un array redirigir ala pantalla edit con el array 
     */
    
    public function edit($id)
    {
        //buscar el id de la persona
        $persona = Persona::findOrFail($id);
        //retornar la vista y llevar el array persona
        return view('tienda.edit', compact('persona'));
        
    }
    //metodo para actualizar el cual es casi lo mismo de agregar
    //se filtra el id y mediante la istancia llamr el metodo update y
    //redirigir nueva mente ala pantalla tienda.index
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required|string|min:5|max:100',
            'Apellido' => 'required|string|min:1'
            
        ]);
    
        $persona = Persona::findOrFail($id);
        $persona->update($request->all());
        //guardar los cambios y redirigir al index
    
        return redirect()->route('tienda.index')->with('success', 'Persona actualizada exitosamente.');
    }
    /**
     * Metodo para eliminar registro mediante el metodo findOrfaild filtrar el id
     * mediante el objeto istanciado de la clase Persona
     * atravez de eloquent llamar el metodo delete()
     * y redirigir ala pantalla tienda.index 
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();
    
        return redirect()->route('tienda.index')->with('success', 'Persona eliminada exitosamente.');
    }    
   
}
