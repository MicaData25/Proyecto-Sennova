<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario')->only('index');
        $this->middleware('permission:crear-usuario', ['only' => ['create','store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-usuario', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {      
        $texUsuario = trim($request->get('texUsuario'));
        $usuarios = User::where('name','LIKE','%'.$texUsuario.'%')
                        ->orWhere('email','LIKE','%'.$texUsuario.'%')
                        ->paginate(5);
        return view('usuarios.index', compact('usuarios', 'texUsuario'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('usuarios.crear', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles' => 'required'
            ]);

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            $user->assignRole($request->input('roles'));

            Alert::success('¡Felicitaciones!', '¡Usuario guardado con exito!');
            return redirect()->route('usuarios.index');
        
        } catch (Throwable $e) {
            Alert::error('¡Error Crear Usuario!', '¡Error Al Crear Este Usuario!');
            return redirect()->route('usuarios.create')->withInput();
        }    
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('usuarios.editar', compact('user', 'roles', 'userRole'));   
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'same:confirm-password',
                'roles' => 'required'
            ]);

            $input = $request->all();
            if (!empty($input['password'])) { 
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = Arr::except($input, array('password'));    
            }

            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();

            $user->assignRole($request->input('roles'));

            Alert::success('¡Felicitaciones!', '¡Usuario Editado con exito!');
            return redirect()->route('usuarios.index');

        } catch (Throwable $e) {
            Alert::error('¡Error Editar Usuario!', '¡Error Al Editar Este Usuario!');
            return redirect()->route('usuarios.edit', $id)->withInput();
        }
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
}
