<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Kreait\Firebase\Contract\Database;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $database;
    public function __construct(Database $database){
        $this->database = $database;
        $this->tableName = 'users';
    }

    public function index()
    {
        $users = $this->database->getReference($this->tableName)->getValue();
        $users = is_array($users) ? $users : [];
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Ambil semua roles dari database
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'roles_id' => 'required|exists:roles,id',
        ]);

        // Simpan user baru ke Firebase Realtime Database
        $postData = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Jangan lupa hash password
            'roles_id' => $request->roles_id,
            'permissions' => [] // Anda bisa menambahkan permissions jika diperlukan
        ];

        $postRef = $this->database->getReference($this->tableName)->push($postData);

        if ($postRef) {
            return redirect('admin/user')->with('status', 'User berhasil ditambah');
        }
        else{
            return redirect('admin/user')->with('status', 'User gagal ditambah');
        }
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tableName)->getChild($key)->getValue();
        
        // Ambil semua roles dari database
        $roles = Role::all();

        if ($editdata) {
            return view('admin.user.edit', compact('editdata', 'roles', 'key'));
        } else {
            return redirect('admin/user')->with('status', 'User tidak ditemukan');
        }
    }

    public function update(Request $request, $id){
        $postData = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Jangan lupa hash password
            'roles_id' => $request->roles_id,
            'permissions' => [] // Anda bisa menambahkan permissions jika diperlukan
        ];
    
        $updateRef = $this->database->getReference($this->tableName . '/' . $id)->update($postData);
        
        if ($updateRef) {
            return redirect('admin/user')->with('status', 'User berhasil diperbarui');
        } else {
            return redirect('admin/user')->with('status', 'User gagal diperbarui');
        }
        }
    
        public function destroy($id){
            $deleteRef = $this->database->getReference($this->tableName . '/' . $id)->remove();
            if ($deleteRef) {
                return redirect('admin/user')->with('status', 'User berhasil dihapus');
            } else {
                return redirect('admin/user')->with('status', 'User gagal dihapus');
            }
        }
}
