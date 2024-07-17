<?php

namespace App\Http\Controllers\Admin;

use Kreait\Firebase\Contract\Firestore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    protected $firestore;
    protected $collectionName;

    public function __construct(Firestore $firestore)
    {
        $this->firestore = $firestore;
        $this->collectionName = 'ruangans';
    }

    public function index()
    {
        $ruangansCollection = $this->firestore->database()->collection($this->collectionName);
        $documents = $ruangansCollection->documents();
        $ruangans = [];
        
        foreach ($documents as $document) {
            if ($document->exists()) {
                $ruangans[$document->id()] = $document->data();
            }
        }
        
        return view('admin.ruangan.index', compact('ruangans'));
    }

    public function create()
    {
        return view('admin.ruangan.create');
    }

    public function store(Request $request)
    {
        $postData = [
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $request->image,
            'status' => $request->status,
            'people_count' => $request->people_count
        ];

        $ruangansCollection = $this->firestore->database()->collection($this->collectionName);
        $postRef = $ruangansCollection->add($postData);
        
        if ($postRef) {
            return redirect('admin/ruangan')->with('status', 'Ruangan berhasil ditambah');
        } else {
            return redirect('admin/ruangan')->with('status', 'Ruangan gagal ditambah');
        }
    }

    public function edit($id)
    {
        $ruangansCollection = $this->firestore->database()->collection($this->collectionName);
        $document = $ruangansCollection->document($id)->snapshot();
        
        if ($document->exists()) {
            $editdata = $document->data();
            return view('admin.ruangan.edit', compact('editdata', 'id'));
        } else {
            return redirect('admin/ruangan')->with('status', 'Ruangan tidak ditemukan');
        }
    }

    public function update(Request $request, $id)
    {
        $postData = [
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $request->image,
            'status' => $request->status,
            'people_count' => $request->people_count
        ];

        $ruangansCollection = $this->firestore->database()->collection($this->collectionName);
        $updateRef = $ruangansCollection->document($id)->set($postData);
        
        if ($updateRef) {
            return redirect('admin/ruangan')->with('status', 'Ruangan berhasil diperbarui');
        } else {
            return redirect('admin/ruangan')->with('status', 'Ruangan gagal diperbarui');
        }
    }

    public function destroy($id)
    {
        $ruangansCollection = $this->firestore->database()->collection($this->collectionName);
        $deleteRef = $ruangansCollection->document($id)->delete();
        
        if ($deleteRef) {
            return redirect('admin/ruangan')->with('status', 'Ruangan berhasil dihapus');
        } else {
            return redirect('admin/ruangan')->with('status', 'Ruangan gagal dihapus');
        }
    }
}
