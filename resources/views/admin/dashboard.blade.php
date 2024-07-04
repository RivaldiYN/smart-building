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
                            <h3>{{ $ruangansCount }}</h3>

                            <p>Data Ruangan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-apps"></i>
                        </div>
                        <a href="/admin/ruangan" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $devicesCount }}</h3>

                            <p>Data Device</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/admin/device" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $usersCount }}</h3>

                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/admin/user" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
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
                        <svg width="992" height="306" viewBox="0 0 992 306" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M945.018 100.14H838.643V218.303H945.018V100.14Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M945.018 0.59436H838.643V95.462H945.018V0.59436Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M833.965 95.462V0.59436H702.797V95.462H833.965Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M698.119 95.462V0.59436H553.011V95.462H698.119Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M399.81 0.59436H147.672V95.462H399.81V0.59436Z"
                                fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M142.994 100.14V97.8009V0.59436H0.318359V158.005H142.994V100.14Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M142.994 162.683H0.318359V292.962H142.994V162.683Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M991.376 0.59436H949.696V95.462V97.8009V100.14V220.642V222.981H947.357H836.304H833.965V220.642V100.14H702.797H700.458H698.119H550.672H548.333V97.8009V74.2711H404.488V97.8009V100.14H402.149H147.672V158.005V160.344V162.683V292.962H991.376V0.59436Z"
                                fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M239.78 297.64H147.672V305.406H239.78V297.64Z"
                                fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M533.738 297.64H441.63V305.406H533.738V297.64Z"
                                fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M937.908 297.64H845.8V305.406H937.908V297.64Z"
                                fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.535 64.9621V69.7336H474.89V64.9621H404.535Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.535 52.0979V60.2842H474.89V52.0979H404.535Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.535 39.2805V47.4201H474.89V39.2805H404.535Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.535 26.4163V34.6026H474.89V26.4163H404.535Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.535 13.5989V21.7384H474.89V13.5989H404.535Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M474.89 0.734741H404.535V8.92105H474.89V0.734741Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.521 64.9621V69.7336H548.333V64.9621H479.521Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.521 52.0979V60.2842H548.333V52.0979H479.521Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.521 39.2805V47.4201H548.333V39.2805H479.521Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.521 26.4163V34.6026H548.333V26.4163H479.521Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.521 13.5989V21.7384H548.333V13.5989H479.521Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M548.333 0.734741H479.521V8.92105H548.333V0.734741Z" fill="#C6C6C6" />
                            <path d="M548.363 31.3749H405.19V31.3796H548.363V31.3749Z" fill="#C6C6C6" />
                            <path d="M548.363 57.0565H405.19V57.0611H548.363V57.0565Z" fill="#C6C6C6" />
                            <path d="M548.363 69.8739H405.19V69.8786H548.363V69.8739Z" fill="#C6C6C6" />
                        </svg>

                    </div>
                    <div id="floor2" class="image-container" style="display:none;">
                        <svg width="992" height="292" viewBox="0 0 992 292" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M144.771 97.958H0.317383V291.015H144.771V97.958Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M833.732 97.958H149.449V291.015H991.377V222.39H836.071H833.732V220.051V97.958Z"
                                fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M991.378 97.958H838.41V217.712H991.378V97.958Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M144.771 0.985107H0.317383V69.9374H144.771V0.985107Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M399.763 0.985107H149.449V69.9374H399.763V65.1659V60.488V52.3484V47.6705V39.4842V34.8063V26.6668V24.3278V21.9889V11.4636V9.12465V0.985107Z"
                                fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.441 65.1659V69.9374H475.077V65.1659H404.441Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.441 52.3484V60.488H475.077V52.3484H404.441Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.441 39.4842V47.6705H475.077V39.4842H404.441Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.441 26.6668V34.8063H475.077V26.6668H404.441Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M404.441 13.8025V21.9889H475.077V13.8025H404.441Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M475.077 0.985107H404.441V9.12465H475.077V0.985107Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.755 65.1659V69.9374H548.895V65.1659H479.755Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.755 52.3484V60.488H548.895V52.3484H479.755Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.755 39.4842V47.6705H548.895V39.4842H479.755Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.755 26.6668V34.8063H548.895V26.6668H479.755Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M479.755 13.8025V21.9889H548.895V13.8025H479.755Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M548.895 0.985107H479.755V9.12465H548.895V0.985107Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M697.418 0.985107H553.573V9.12465V11.4636V21.9889V24.3278V26.6668V34.8063V39.4842V47.6705V52.3484V60.488V65.1659V69.9374H697.418V0.985107Z"
                                fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M842.246 0.985107H702.096V69.9374H842.246V0.985107Z" fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M842.246 74.6152H702.096H699.757H553.573H479.755H477.416H402.102H399.763H149.449H0.317383V93.2801H842.246V74.6152Z"
                                fill="#C6C6C6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M991.378 0.985107H846.924V72.2763V74.6153V93.2801H991.378V0.985107Z" fill="#C6C6C6" />
                            <path d="M551.244 24.3278H402.102V24.3325H551.244V24.3278Z" fill="#C6C6C6" />
                            <path d="M551.244 50.0095H402.102V50.0142H551.244V50.0095Z" fill="#C6C6C6" />
                            <path d="M551.244 62.827H402.102V62.8316H551.244V62.827Z" fill="#C6C6C6" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            $(document).ready(function() {
                let isSecond = false;
                const toggleFloorBtn = $('#toggleFloorBtn');
                const toggleFloorText = $('#toggleFloorText');
                const floor1 = $('#floor1');
                const floor2 = $('#floor2');

                toggleFloorBtn.on('click', function() {
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
