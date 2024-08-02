@extends('pagesMandor.main')

@section('halaman')
    <div class="row my-4">
        <div class="col-lg-7 col-12">
            <div class="custom-block ">
                <small>Target</small>

                <h2 class="mt-2 mb-3">{{ $targethariini }} Batang</h2>

                {{-- <div class="custom-block-numbers d-flex align-items-center">
                    <span>****</span>
                    <span>****</span>
                    <span>****</span>
                    <p>2560</p>
                </div> --}}
                <hr>

                <div class="d-flex">
                    <div>
                        <small>Selesai</small>
                        <p>{{ $selesai }}</p>
                    </div>

                    <div class="ms-auto">
                        <small>Sisa</small>
                        <p>{{ $sisa }}</p>
                    </div>
                </div>
            </div>

            <div class="custom-block custom-block-exchange">
                <h5 class="mb-4">Rincian Target</h5>

                @if ($tarMerah == '0')
                    <div style="display: none">
                    @else
                        <div class="d-flex flex-wrap align-items-center mb-4">
                @endif

                <div class="d-flex align-items-center">
                    {{-- <img src="{{ asset('assetmandor') }}/images/profile/senior-man-white-sweater-eyeglasses.jpg"
                            class="profile-image img-fluid" alt=""> --}}
                    <div>
                        <p>
                            <b style="color: red">Rosso Merah</b>
                        </p>

                        <small class="text-muted">target = <b>{{ $tarMerah }}</b></small>
                    </div>
                </div>

                <div class="ms-auto">
                    <small>{{ $doneMerah }}</small>
                    <strong class="d-block text-danger"><span class="me-1">-</span> {{ $sisaMerah }}</strong>
                </div>

            </div>

            @if ($tarHitam == '0')
                <div style="display: none">
                @else
                    <div class="d-flex flex-wrap align-items-center mb-4">
            @endif
            <div class="d-flex align-items-center">
                {{-- <img src="{{ asset('assetmandor') }}/images/profile/senior-man-white-sweater-eyeglasses.jpg"
                            class="profile-image img-fluid" alt=""> --}}
                <div>
                    <p>
                        <b style="color: rgb(0, 0, 0)">Rosso Hitam</b>
                    </p>

                    <small class="text-muted">target = <b>{{ $tarHitam }}</b></small>
                </div>
            </div>

            <div class="ms-auto">
                <small>{{ $doneHitam }}</small>
                <strong class="d-block text-danger"><span class="me-1">-</span> {{ $sisaHitam }}</strong>
            </div>

        </div>

        @if ($tarCokelat == '0')
            <div style="display: none">
            @else
                <div class="d-flex flex-wrap align-items-center mb-4">
        @endif
        <div class="d-flex align-items-center">
            {{-- <img src="{{ asset('assetmandor') }}/images/profile/senior-man-white-sweater-eyeglasses.jpg"
                            class="profile-image img-fluid" alt=""> --}}
            <div>
                <p>
                    <b style="color: rgb(192, 131, 0)">Rosso Cokelat</b>
                </p>

                <small class="text-muted">target = <b>{{ $tarCokelat }}</b></small>
            </div>
        </div>

        <div class="ms-auto">
            <small>{{ $doneCokelat }}</small>
            <strong class="d-block text-danger"><span class="me-1">-</span> {{ $sisaCokelat }}</strong>
        </div>

    </div>

    @if ($tarJawas == '0')
        <div style="display: none">
        @else
            <div class="d-flex flex-wrap align-items-center mb-4">
    @endif
    <div class="d-flex align-items-center">
        {{-- <img src="{{ asset('assetmandor') }}/images/profile/senior-man-white-sweater-eyeglasses.jpg"
                            class="profile-image img-fluid" alt=""> --}}
        <div>
            <p>
                <b style="color: rgb(26, 155, 0)">Jawas</b>
            </p>

            <small class="text-muted">target = <b>{{ $tarJawas }}</b></small>
        </div>
    </div>

    <div class="ms-auto">
        <small>{{ $doneJawas }}</small>
        <strong class="d-block text-danger"><span class="me-1">-</span> {{ $sisaJawas }}</strong>
    </div>

    </div>


    {{-- <div id="pie-chart"></div> --}}
    </div>

    {{-- <div class="custom-block bg-white">
                <div id="chart"></div>
            </div>

            <div class="custom-block custom-block-exchange">
                <h5 class="mb-4">Exchange Rate</h5>

                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <img src="images/flag/united-states.png" class="exchange-image img-fluid" alt="">

                        <div>
                            <p>USD</p>
                            <h6>1 US Dollar</h6>
                        </div>
                    </div>

                    <div class="ms-auto me-4">
                        <small>Sell</small>
                        <h6>1.0931</h6>
                    </div>

                    <div>
                        <small>Buy</small>
                        <h6>1.0821</h6>
                    </div>
                </div>

                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <img src="images/flag/singapore.png" class="exchange-image img-fluid" alt="">

                        <div>
                            <p>SGD</p>
                            <h6>1 Singapore Dollar</h6>
                        </div>
                    </div>

                    <div class="ms-auto me-4">
                        <small>Sell</small>
                        <h6>0.6901</h6>
                    </div>

                    <div>
                        <small>Buy</small>
                        <h6>0.6201</h6>
                    </div>
                </div>

                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <img src="images/flag/united-kingdom.png" class="exchange-image img-fluid" alt="">

                        <div>
                            <p>GPD</p>
                            <h6>1 British Pound</h6>
                        </div>
                    </div>

                    <div class="ms-auto me-4">
                        <small>Sell</small>
                        <h6>1.1520</h6>
                    </div>

                    <div>
                        <small>Buy</small>
                        <h6>1.1412</h6>
                    </div>
                </div>

                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                    <div class="d-flex align-items-center">
                        <img src="images/flag/australia.png" class="exchange-image img-fluid" alt="">

                        <div>
                            <p>AUD</p>
                            <h6>1 Australian Dollar</h6>
                        </div>
                    </div>

                    <div class="ms-auto me-4">
                        <small>Sell</small>
                        <h6>0.6110</h6>
                    </div>

                    <div>
                        <small>Buy</small>
                        <h6>0.5110</h6>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="images/flag/european-union.png" class="exchange-image img-fluid" alt="">

                        <div>
                            <p>EUR</p>
                            <h6>1 Euro</h6>
                        </div>
                    </div>

                    <div class="ms-auto me-4">
                        <small>Sell</small>
                        <h6>1.1020</h6>
                    </div>

                    <div>
                        <small>Buy</small>
                        <h6>1.1010</h6>
                    </div>
                </div>
            </div> --}}
    </div>

    <div class="col-lg-5 col-12">
        {{-- <div class="custom-block custom-block-profile-front custom-block-profile text-center bg-white">
                <div class="custom-block-profile-image-wrap mb-4">
                    <img src="images/medium-shot-happy-man-smiling.jpg" class="custom-block-profile-image img-fluid"
                        alt="">

                    <a href="setting.html" class="bi-pencil-square custom-block-edit-icon"></a>
                </div>

                <p class="d-flex flex-wrap mb-2">
                    <strong>Name:</strong>

                    <span>Thomas Edison</span>
                </p>

                <p class="d-flex flex-wrap mb-2">
                    <strong>Email:</strong>

                    <a href="#">
                        thomas@site.com
                    </a>
                </p>

                <p class="d-flex flex-wrap mb-0">
                    <strong>Phone:</strong>

                    <a href="#">
                        (60) 12 345 6789
                    </a>
                </p>
            </div>

            <div class="custom-block custom-block-bottom d-flex flex-wrap">
                <div class="custom-block-bottom-item">
                    <a href="#" class="d-flex flex-column">
                        <i class="custom-block-icon bi-wallet"></i>

                        <small>Top up</small>
                    </a>
                </div>

                <div class="custom-block-bottom-item">
                    <a href="#" class="d-flex flex-column">
                        <i class="custom-block-icon bi-upc-scan"></i>

                        <small>Scan & Pay</small>
                    </a>
                </div>

                <div class="custom-block-bottom-item">
                    <a href="#" class="d-flex flex-column">
                        <i class="custom-block-icon bi-send"></i>

                        <small>Send</small>
                    </a>
                </div>

                <div class="custom-block-bottom-item">
                    <a href="#" class="d-flex flex-column">
                        <i class="custom-block-icon bi-arrow-down"></i>

                        <small>Request</small>
                    </a>
                </div>
            </div> --}}

        {{-- <div class="custom-block custom-block-transations">
                <h5 class="mb-4">Recent Transations</h5>

                <div class="d-flex flex-wrap align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <img src="images/profile/senior-man-white-sweater-eyeglasses.jpg" class="profile-image img-fluid"
                            alt="">

                        <div>
                            <p>
                                <a href="transation-detail.html">Daniel Jones</a>
                            </p>

                            <small class="text-muted">C2C Transfer</small>
                        </div>
                    </div>

                    <div class="ms-auto">
                        <small>05/12/2023</small>
                        <strong class="d-block text-danger"><span class="me-1">-</span> $250</strong>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <img src="images/profile/young-beautiful-woman-pink-warm-sweater.jpg"
                            class="profile-image img-fluid" alt="">

                        <div>
                            <p>
                                <a href="transation-detail.html">Public Bank</a>
                            </p>

                            <small class="text-muted">Mobile Reload</small>
                        </div>
                    </div>

                    <div class="ms-auto">
                        <small>22/8/2023</small>
                        <strong class="d-block text-success"><span class="me-1">+</span> $280</strong>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="images/profile/young-woman-with-round-glasses-yellow-sweater.jpg"
                            class="profile-image img-fluid" alt="">

                        <div>
                            <p><a href="transation-detail.html">Store</a></p>

                            <small class="text-muted">Payment Received</small>
                        </div>
                    </div>

                    <div class="ms-auto">
                        <small>22/8/2023</small>
                        <strong class="d-block text-success"><span class="me-1">+</span> $280</strong>
                    </div>
                </div>

                <div class="border-top pt-4 mt-4 text-center">
                    <a class="btn custom-btn" href="wallet.html">
                        View all transations
                        <i class="bi-arrow-up-right-circle-fill ms-2"></i>
                    </a>
                </div>
            </div> --}}

        {{-- <div class="custom-block primary-bg">
                <h5 class="text-white mb-4">Send Money</h5>

                <a href="#">
                    <img src="images/profile/young-woman-with-round-glasses-yellow-sweater.jpg"
                        class="profile-image img-fluid" alt="">
                </a>

                <a href="#">
                    <img src="images/profile/young-beautiful-woman-pink-warm-sweater.jpg" class="profile-image img-fluid"
                        alt="">
                </a>

                <a href="#">
                    <img src="images/profile/senior-man-white-sweater-eyeglasses.jpg" class="profile-image img-fluid"
                        alt="">
                </a>

                <div class="profile-rounded">
                    <a href="#">
                        <i class="profile-rounded-icon bi-plus"></i>
                    </a>
                </div>
            </div> --}}

    </div>
    </div>
@endsection
