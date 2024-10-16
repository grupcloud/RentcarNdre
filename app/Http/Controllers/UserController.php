<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function userexport()
    {
        return Excel::download(new UserExport, 'datauser.xlsx');
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'username' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);
        if (User::where('username', $request->username)->where('id_user', '<>', $user->id_user)->first())
            return back()->withErrors(['username' => 'Username sudah terdaftar!!']);

        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->telp = $request->telp;
        $user->email = $request->email;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect()->route('user.index')->with(['message' => 'Data berhasil diubah!!']);
    }

    public function edit(User $user)
    {
        $title = 'Ubah User';
        $levels = ['Admin', 'User'];
        return view('user.edit', compact('title', 'user', 'levels'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);
        if (User::where('username', $request->username)->first())
            return back()->withErrors(['username' => 'Username sudah terdaftar!!']);

        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index')->with(['message' => 'Data berhasil ditambahkan!!']);
    }

    public function create()
    {
        $title = 'Tambah User';
        $levels = ['Admin', 'User'];
        return view('user.create', compact('title', 'levels'));
    }
    public function index(Request $request)
    {
        $title = 'Data User';
        $q = $request->query('q');
        $users = User::where('nama_user', 'like', '%' . $q . '%')
            ->orWhere('username', 'like', '%' . $q . '%')
            ->orWhere('email', 'like', '%' . $q . '%')
            ->paginate(10)
            ->withQueryString();
        $no = $users->firstItem();
        return view('user.index', compact('title', 'users', 'q', 'no'));
    }

    public function login()
    {
        $title = 'Login';
        return view('user.login', compact('title'));
    }

    public function loginAction(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('home');
            return 'Login Berhasil!';
        }

        return back()->withErrors([
            'username' => 'Salah kombinasi username',
            'Password' => 'Salah kombinasi password',
        ]);
    }

    public function passwordAction(Request $request)
    {
        $request->validate([
            'pass1' => 'required',
            'pass2' => 'required',
            'pass3' => 'required',
        ]);

        if (!Hash::check($request->pass1, Auth::user()->password))
            return back()->withErrors(['pass1' => 'Password lama salah']);

        if ($request->pass2 != $request->pass3)
            return back()->withErrors(['pass2' => 'Password baru dan konfirmasi password baru harus sama']);

        User::where('id_user', Auth::id())->update([
            'password' => Hash::make($request->pass2)
        ]);
        return redirect()->route('user.password')->With(['message' => 'Password berhasil diubah!']);
    }

    public function password()
    {
        $title = 'Ubah Password';
        return view('user.password', compact('title'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with(['message' => 'Data berhasil dihapus!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
