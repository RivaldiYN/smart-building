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

        // Ambil data ruangan secara real-time
        $roomsData = $this->getRoomsData();

        return view('admin.dashboard', compact(
            'usersCount',
            'ruangansCount',
            'devicesCount',
            'roomsData'
        ));
    }

    private function getTotalCount($collectionName)
    {
        $collection = $this->firestore->collection($collectionName);
        $documents = $collection->documents();
        return $documents->size();
    }

    private function getRoomsData()
    {
        $roomsCollection = $this->firestore->collection('rooms');
        $rooms = $roomsCollection->documents();

        $roomsData = [];

        foreach ($rooms as $room) {
            $roomData = $room->data();
            $roomsData[$room->id()] = $this->processRoomData($room->id(), $roomData);
        }

        return $roomsData;
    }

    private function processRoomData($roomId, $roomData)
    {
        // Fungsi untuk menentukan status lampu
        $lampuStatus = $this->checkLampuStatus($roomData);

        // Fungsi untuk menentukan keterangan suhu
        $suhuKeterangan = $this->getSuhuKeterangan($roomData);

        return [
            'name' => $this->getRoomName($roomId),
            'status' => $lampuStatus,
            'people' => $roomData['People'] ?? 0,
            'suhu_ac' => $roomData['Suhu-AC'] ?? 0,
            'suhu_ket' => $suhuKeterangan,
            'lampu_details' => $this->getLampuDetails($roomData)
        ];
    }

    private function checkLampuStatus($roomData)
    {
        $lampuKeys = array_filter(array_keys($roomData), function ($key) {
            return strpos($key, 'lampu') === 0;
        });

        foreach ($lampuKeys as $lampuKey) {
            if ($roomData[$lampuKey] === true) {
                return true;
            }
        }
        return false;
    }


    private function getSuhuKeterangan($roomData)
    {
        if (isset($roomData['Ket-Suhu'])) {
            return $roomData['Ket-Suhu'];
        }

        $suhu = $roomData['Suhu-AC'] ?? 0;
        if ($suhu < 20) return 'Dingin';
        if ($suhu >= 20 && $suhu <= 25) return 'Normal';
        return 'Panas';
    }

    private function getRoomName($roomId)
    {
        $roomNames = [
            'Ruang-IIO' => 'International Office',
            'Ruang-rektor' => 'Ruang Rektor',
            'Ruang_WR1' => 'Ruang WR 1'
        ];

        return $roomNames[$roomId] ?? 'Unnamed Room';
    }

    private function getLampuDetails($roomData)
    {
        $lampuDetails = [];
        $lampuKeys = array_filter(array_keys($roomData), function ($key) {
            return strpos($key, 'lampu') === 0;
        });

        foreach ($lampuKeys as $lampuKey) {
            $lampuDetails[$lampuKey] = $roomData[$lampuKey];
        }

        return $lampuDetails;
    }
}
