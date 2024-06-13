<?php

namespace App\Http\Controllers\Admin;

use Kreait\Firebase\Contract\Database;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DeviceController extends Controller
{
    protected $database;
    public function __construct(Database $database){
        $this->database = $database;
        $this->tableName = 'devices';
    }

    public function index()
    {
        $devices = $this->database->getReference($this->tableName)->getValue();
        $devices = is_array($devices) ? $devices : [];
        return view('admin.device.index', compact('devices'));
    }

    public function create(){
        return view('admin.device.create');
    }

    public function store(Request $request){
        $postData = [
            'room_id' => $request->room_id,
            'name' => $request->name,
            'link_monitoring' => $request->link_monitoring,
            'link_controlling' => $request->link_controlling,
            'satuan' => $request->satuan
        ];
        $postRef = $this->database->getReference($this->tableName)->push($postData);
        if($postRef){
            return redirect('admin/device')->with('status', 'Device berhasil ditambah');
        }
        else{
            return redirect('admin/device')->with('status', 'Device gagal ditambah');
        }
    }
    
    public function edit($id){
    $key = $id;
    $editdata = $this->database->getReference($this->tableName)->getChild($key)->getValue();
    if($editdata){
        return view('admin.device.edit', compact('editdata', 'key'));
    }
    else{
        return redirect('admin/device')->with('status', 'device tidak ditemukan');
    }
}

    public function update(Request $request, $id){
    $postData = [
        'room_id' => $request->room_id,
        'name' => $request->name,
        'link_monitoring' => $request->link_monitoring,
        'link_controlling' => $request->link_controlling,
        'satuan' => $request->satuan
    ];

    $updateRef = $this->database->getReference($this->tableName . '/' . $id)->update($postData);
    
    if ($updateRef) {
        return redirect('admin/device')->with('status', 'Device berhasil diperbarui');
    } else {
        return redirect('admin/device')->with('status', 'Device gagal diperbarui');
    }
    }

    public function destroy($id){
        $deleteRef = $this->database->getReference($this->tableName . '/' . $id)->remove();
        if ($deleteRef) {
            return redirect('admin/device')->with('status', 'Device berhasil dihapus');
        } else {
            return redirect('admin/device')->with('status', 'Device gagal dihapus');
        }
    }
}
