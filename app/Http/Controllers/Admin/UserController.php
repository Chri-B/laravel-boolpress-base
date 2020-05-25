<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:20'
            // |regex:/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/ =>one lowercase char, one uppercase char, one digit, one special sign @#-_$%^&+=§!?]
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.create')
                ->withErrors($validator)
                ->withInput();
        }


        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['name']);
        $saved = $user->save();
        if (!$saved) {
            return redirect()->route('admin.users.create')
                ->with('status', 'Utente NON Creato!');
        }

        return redirect()->route('admin.users.show', $user->id)
            ->with('statusOk', 'Utente Creato Correttamente con id: ' . $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        if ($data['email'] == $user->email) {
            unset($data['email']);
        }

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'email|unique:users'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.users.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user->fill($data);
        $updated = $user->update();
        if (!$updated) {
            return redirect()->route('admin.users.edit', $id)
                ->with('status', 'Utente NON Aggiornato!');
        }

        return redirect()->route('admin.users.show', $user->id)
            ->with('statusOk', 'Utente Modificato Correttamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->id == Auth::id()) {
            return redirect()->back()->with('status', 'Non Puoi cancellare l\'utente in uso!');
        }
        $deleted = $user->delete();

        if (!$deleted) {
            return redirect()->back()->with('status', 'Utente NON cancellato!');
        }
        return redirect()->route('admin.users.index')->with('statusOk', 'Utente ' . $user->name . ' (id: ' . $id . ') cancellato correttamente');
    }
}
