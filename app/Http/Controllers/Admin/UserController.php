<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Kreait\Firebase\Contract\Firestore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $firestore;
    protected $collectionName;

    public function __construct(Firestore $firestore)
    {
        $this->firestore = $firestore;
        $this->collectionName = 'users';
    }

    public function index()
    {
        $usersCollection = $this->firestore->database()->collection($this->collectionName);
        $documents = $usersCollection->documents();
        $users = [];

        foreach ($documents as $document) {
            if ($document->exists()) {
                $users[$document->id()] = $document->data();
            }
        }

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

        // Simpan user baru ke Firestore
        $postData = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password
            'roles_id' => $request->roles_id,
            'permissions' => [] // Anda bisa menambahkan permissions jika diperlukan
        ];

        $usersCollection = $this->firestore->database()->collection($this->collectionName);
        $postRef = $usersCollection->add($postData);

        return redirect('admin/user')->with('status', $postRef ? 'User berhasil ditambah' : 'User gagal ditambah');
    }

    public function edit($id)
    {
        $userDocument = $this->firestore->database()->collection($this->collectionName)->document($id)->snapshot();

        if ($userDocument->exists()) {
            $editdata = $userDocument->data();
            $roles = Role::all();
            return view('admin.user.edit', compact('editdata', 'roles', 'id'));
        } else {
            return redirect('admin/user')->with('status', 'User tidak ditemukan');
        }
    }

    public function update(Request $request, $id)
    {
        $postData = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password
            'roles_id' => $request->roles_id,
            'permissions' => [] // Anda bisa menambahkan permissions jika diperlukan
        ];

        $usersCollection = $this->firestore->database()->collection($this->collectionName);
        $updateRef = $usersCollection->document($id)->set($postData);

        return redirect('admin/user')->with('status', $updateRef ? 'User berhasil diperbarui' : 'User gagal diperbarui');
    }

    public function destroy($id)
    {
        $usersCollection = $this->firestore->database()->collection($this->collectionName);
        $deleteRef = $usersCollection->document($id)->delete();

        return redirect('admin/user')->with('status', $deleteRef ? 'User berhasil dihapus' : 'User gagal dihapus');
    }
}
