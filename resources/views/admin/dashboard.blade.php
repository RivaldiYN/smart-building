@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
<style>
  .card-text-large {
      font-weight: 600;
      font-size: 80px;
  }
  .card-text-medium {
      font-weight: 600;
      font-size: 30px;
  }
  .card-text-welcome {
      font-weight: 600;
      font-size: 30px;
  }
  .hover-box {
      position: absolute;
      display: flex;
      justify-content: center;
      align-items: center;
      border: 2px solid black;
  }
  .hover-box:hover {
      background-color: red;
  }
  .btn-toggle {
      background-color: white;
      color: #2D777A;
      border-radius: 15px;
      font-family: sans-serif;
      font-weight: normal;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .btn-toggle:hover {
      background-color: white;
  }
  .image-container {
      width: 100%;
      height: 500px;
      position: relative;
  }
  .centered-image {
      display: block;
      margin: 0 auto;
      max-width: 100%;
      height: auto;
      position: relative;
  }
</style>
</head>
<body>

<div class="container mt-4">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$ruangansCount}}</h3>
  
          <p>Data Ruangan</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-apps"></i>
        </div>
        <a href="/admin/ruangan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$devicesCount}}</h3>
  
          <p>Data Device</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/admin/device" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$usersCount}}</h3>
  
          <p>User</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="/admin/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          {{-- <h3>{{$x}}</h3> --}}
  
          <p>X</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  
<div class="d-flex justify-content-end mb-4">
  <button id="toggleFloorBtn" class="btn btn-toggle btn-md">
      <span id="toggleFloorText">1st Floor</span>
  </button>
</div>

<div class="card">
  <div class="card-body">
      <div id="floor1" class="image-container">
          <div class="hover-box" style="top: 12%; left: 2%; height: 45%; width: 11%;">
              <p class="text-center">Ruang Hukum Tata Laksana</p>
          </div>
          <div class="hover-box" style="top: 57%; left: 2%; height: 35%; width: 11%;">
              <p class="text-center">Ruang Transit Tamu</p>
          </div>
          <div class="hover-box" style="top: 12%; left: 14%; height: 25%; width: 37%;">
              <p class="text-center">International Office</p>
          </div>
          <div class="hover-box" style="top: 12%; left: 52%; height: 25%; width: 12%;">
              <p class="text-center">Humas</p>
          </div>
          <div class="hover-box" style="top: 12%; left: 65%; height: 25%; width: 11%;">
              <p class="text-center">Gudang</p>
          </div>
          <div class="hover-box" style="top: 12%; left: 77%; height: 25%; width: 8.5%;">
              <p class="text-center">WC Perempuan</p>
          </div>
          <div class="hover-box" style="top: 39%; left: 77%; height: 45%; width: 8.5%;">
              <p class="text-center">WC Laki-Laki</p>
          </div>
          <img src="https://res.cloudinary.com/dteondhij/image/upload/v1692253916/Denah_Gedung_A-Page-1.drawio_1_sggvvr.png" alt="First Floor Plan" class="centered-image">
      </div>
      <div id="floor2" class="image-container" style="display:none;">
          <div class="hover-box" style="top: 12%; left: 2%; height: 27%; width: 14.5%;">
              <p class="text-center">Ruang Rapat Kecil</p>
          </div>
          <div class="hover-box" style="top: 12%; left: 17%; height: 27%; width: 23.5%;">
              <p class="text-center">WR 1</p>
          </div>
          <div class="hover-box" style="top: 12%; left: 41%; height: 27%; width: 23.5%;">
              <p class="text-center">WR 2</p>
          </div>
          <div class="hover-box" style="top: 12%; left: 65%; height: 27%; width: 22%;">
              <p class="text-center">Ruang Sekretariat</p>
          </div>
          <div class="hover-box" style="top: 40%; left: 65%; height: 50%; width: 22%;">
              <p class="text-center">Ruang Rektor</p>
          </div>
          <div class="hover-box" style="top: 40%; left: 2%; height: 50%; width: 14.5%;">
              <p class="text-center">Ruang Rapat Besar</p>
          </div>
          <img src="https://res.cloudinary.com/dteondhij/image/upload/v1692254126/Denah_Gedung_A-Page-2.drawio_2_smut9z.png" alt="Second Floor Plan" class="centered-image">
      </div>
  </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function () {
  let isSecond = false;
  const toggleFloorBtn = $('#toggleFloorBtn');
  const toggleFloorText = $('#toggleFloorText');
  const floor1 = $('#floor1');
  const floor2 = $('#floor2');
  
  toggleFloorBtn.on('click', function () {
      isSecond = !isSecond;
      if (isSecond) {
          toggleFloorText.text('2nd Floor');
          floor1.hide();
          floor2.show();
      } else {
          toggleFloorText.text('1st Floor');
          floor2.hide();
          floor1.show();
      }
  });
});
</script>
@endsection
