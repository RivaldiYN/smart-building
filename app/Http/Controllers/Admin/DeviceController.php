<?php

namespace App\Http\Controllers\Admin;

use Kreait\Firebase\Contract\Firestore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    protected $firestore;
    protected $collectionName;

    public function __construct(Firestore $firestore)
    {
        $this->firestore = $firestore;
        $this->collectionName = 'devices';
    }

    public function index()
    {
        $devicesCollection = $this->firestore->database()->collection($this->collectionName);
        $documents = $devicesCollection->documents();
        $devices = [];
        
        foreach ($documents as $document) {
            if ($document->exists()) {
                $devices[$document->id()] = $document->data();
            }
        }
        
        return view('admin.device.index', compact('devices'));
    }

    public function create()
    {
        return view('admin.device.create');
    }

    public function store(Request $request)
    {
        $postData = [
            'room_id' => $request->room_id,
            'name' => $request->name,
            'link_monitoring' => $request->link_monitoring,
            'link_controlling' => $request->link_controlling,
            'satuan' => $request->satuan
        ];

        $devicesCollection = $this->firestore->database()->collection($this->collectionName);
        $postRef = $devicesCollection->add($postData);
        
        if ($postRef) {
            return redirect('admin/device')->with('status', 'Device berhasil ditambah');
        } else {
            return redirect('admin/device')->with('status', 'Device gagal ditambah');
        }
    }

    public function edit($id)
    {
        $devicesCollection = $this->firestore->database()->collection($this->collectionName);
        $document = $devicesCollection->document($id)->snapshot();
        
        if ($document->exists()) {
            $editdata = $document->data();
            return view('admin.device.edit', compact('editdata', 'id'));
        } else {
            return redirect('admin/device')->with('status', 'Device tidak ditemukan');
        }
    }

    public function update(Request $request, $id)
    {
        $postData = [
            'room_id' => $request->room_id,
            'name' => $request->name,
            'link_monitoring' => $request->link_monitoring,
            'link_controlling' => $request->link_controlling,
            'satuan' => $request->satuan
        ];

        $devicesCollection = $this->firestore->database()->collection($this->collectionName);
        $updateRef = $devicesCollection->document($id)->set($postData);
        
        if ($updateRef) {
            return redirect('admin/device')->with('status', 'Device berhasil diperbarui');
        } else {
            return redirect('admin/device')->with('status', 'Device gagal diperbarui');
        }
    }

    public function destroy($id)
    {
        $devicesCollection = $this->firestore->database()->collection($this->collectionName);
        $deleteRef = $devicesCollection->document($id)->delete();
        
        if ($deleteRef) {
            return redirect('admin/device')->with('status', 'Device berhasil dihapus');
        } else {
            return redirect('admin/device')->with('status', 'Device gagal dihapus');
        }
    }
}
