<?php

namespace App\Http\Controllers\Admin;

use Kreait\Firebase\Contract\Database;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function __construct(Database $database){
        $this->database = $database;
        $this->tableName = 'ruangans';
    }

    public function index()
    {
        return view('admin.ruangan.index');
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
}
