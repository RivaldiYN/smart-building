<?php

namespace App\Http\Controllers\Admin;

use Kreait\Firebase\Contract\Database;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    protected $database;
    public function __construct(Database $database){
        $this->database = $database;
        $this->tableName = 'ruangans';
    }

    public function index()
    {
        $ruangans = $this->database->getReference($this->tableName)->getValue();
        $ruangans = is_array($ruangans) ? $ruangans : [];
        return view('admin.ruangan.index', compact('ruangans'));
    }

    public function create(){
        return view('admin.ruangan.create');
    }

    public function store(Request $request){
        $postData = [
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $request->image,
            'status' => $request->status,
            'people_count' => $request->people_count
        ];
        $postRef = $this->database->getReference($this->tableName)->push($postData);
        if($postRef){
            return redirect('admin/ruangan')->with('status', 'Ruangan berhasil ditambah');
        }
        else{
            return redirect('admin/ruangan')->with('status', 'Ruangan gagal ditambah');
        }
    }
    
    public function edit($id){
    $key = $id;
    $editdata = $this->database->getReference($this->tableName)->getChild($key)->getValue();
    if($editdata){
        return view('admin.ruangan.edit', compact('editdata', 'key'));
    }
    else{
        return redirect('admin/ruangan')->with('status', 'Ruangan tidak ditemukan');
    }
}

    public function update(Request $request, $id){
    $postData = [
        'name' => $request->name,
        'desc' => $request->desc,
        'image' => $request->image,
        'status' => $request->status,
        'people_count' => $request->people_count
    ];

    $updateRef = $this->database->getReference($this->tableName . '/' . $id)->update($postData);
    
    if ($updateRef) {
        return redirect('admin/ruangan')->with('status', 'Ruangan berhasil diperbarui');
    } else {
        return redirect('admin/ruangan')->with('status', 'Ruangan gagal diperbarui');
    }
    }

    public function destroy($id){
        $deleteRef = $this->database->getReference($this->tableName . '/' . $id)->remove();
        if ($deleteRef) {
            return redirect('admin/ruangan')->with('status', 'Ruangan berhasil dihapus');
        } else {
            return redirect('admin/ruangan')->with('status', 'Ruangan gagal dihapus');
        }
    }
}
