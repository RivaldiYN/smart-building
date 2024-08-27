<?php

namespace App\Http\Controllers\Admin;

use Google\Cloud\Firestore\FirestoreClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $firestore;

    public function __construct()
    {
        $this->firestore = new FirestoreClient([
            'projectId' => env('FIREBASE_PROJECT_ID'),
        ]);
    }

    public function index()
    {
        $usersCount = $this->getTotalCount('users');
        $ruangansCount = $this->getTotalCount('rooms');
        $devicesCount = $this->getTotalCount('devices');

        return view('admin.dashboard', compact('usersCount', 'ruangansCount', 'devicesCount'));
    }

    private function getTotalCount($collectionName)
    {
        $collection = $this->firestore->collection($collectionName);
        $documents = $collection->documents();
        return $documents->size(); // This returns the total count of documents in the collection
    }
}