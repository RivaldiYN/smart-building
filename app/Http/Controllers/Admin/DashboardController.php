<?php

namespace App\Http\Controllers\Admin;

use Kreait\Firebase\Contract\Database;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        $usersCount = $this->getTotalCount('users');
        $ruangansCount = $this->getTotalCount('ruangans');
        $devicesCount = $this->getTotalCount('devices');

        return view('admin.dashboard', compact('usersCount', 'ruangansCount', 'devicesCount'));
    }

    private function getTotalCount($tableName)
    {
        $reference = $this->database->getReference($tableName);
        $snapshot = $reference->getSnapshot();
        return $snapshot->numChildren();
    }
}
