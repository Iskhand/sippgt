<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="icon" href="/img/logopx.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="LTE/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="LTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="LTE/dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="07a12cd2-630d-4d72-ab10-66bf67de0ff1">
        try {
            (function(w, d) {
                ! function(bS, bT, bU, bV) {
                    bS[bU] = bS[bU] || {};
                    bS[bU].executed = [];
                    bS.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    bS.zaraz._v = "5629";
                    bS.zaraz.q = [];
                    bS.zaraz._f = function(bW) {
                        return async function() {
                            var bX = Array.prototype.slice.call(arguments);
                            bS.zaraz.q.push({
                                m: bW,
                                a: bX
                            })
                        }
                    };
                    for (const bY of ["track", "set", "debug"]) bS.zaraz[bY] = bS.zaraz._f(bY);
                    bS.zaraz.init = () => {
                        var bZ = bT.getElementsByTagName(bV)[0],
                            b$ = bT.createElement(bV),
                            ca = bT.getElementsByTagName("title")[0];
                        ca && (bS[bU].t = bT.getElementsByTagName("title")[0].text);
                        bS[bU].x = Math.random();
                        bS[bU].w = bS.screen.width;
                        bS[bU].h = bS.screen.height;
                        bS[bU].j = bS.innerHeight;
                        bS[bU].e = bS.innerWidth;
                        bS[bU].l = bS.location.href;
                        bS[bU].r = bT.referrer;
                        bS[bU].k = bS.screen.colorDepth;
                        bS[bU].n = bT.characterSet;
                        bS[bU].o = (new Date).getTimezoneOffset();
                        if (bS.dataLayer)
                            for (const ce of Object.entries(Object.entries(dataLayer).reduce(((cf, cg) => ({
                                    ...cf[1],
                                    ...cg[1]
                                })), {}))) zaraz.set(ce[0], ce[1], {
                                scope: "page"
                            });
                        bS[bU].q = [];
                        for (; bS.zaraz.q.length;) {
                            const ch = bS.zaraz.q.shift();
                            bS[bU].q.push(ch)
                        }
                        b$.defer = !0;
                        for (const ci of [localStorage, sessionStorage]) Object.keys(ci || {}).filter((ck => ck
                            .startsWith("_zaraz_"))).forEach((cj => {
                            try {
                                bS[bU]["z_" + cj.slice(7)] = JSON.parse(ci.getItem(cj))
                            } catch {
                                bS[bU]["z_" + cj.slice(7)] = ci.getItem(cj)
                            }
                        }));
                        b$.referrerPolicy = "origin";
                        b$.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bS[bU])));
                        bZ.parentNode.insertBefore(b$, bZ)
                    };
                    ["complete", "interactive"].includes(bT.readyState) ? zaraz.init() : bS.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
    <style>
        body {
            background-image: url('{{ asset('LTE/dist') }}/img/banner.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;


        }

        body::before {
            content: "";
            background: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .show-hide {
            position: absolute;
            right: 45px;
            top: 25%;
            transform: translateY(-8%);
        }

        .show-hide i {
            font-size: 19px;
            color: #3e0d0d;
            cursor: pointer;
            display: none;
        }

        .show-hide i.hide::before {
            content: "\f070";
        }

        input:valid~.show-hide i {
            display: block;
        }

        .ngambang {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 0, 0, 0.26);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

        .wave-animation {
            position: relative;
            overflow: hidden;
        }

        .wave-animation::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0));
            animation: wave 5s infinite;
        }

        @keyframes wave {
            0% {
                transform: translateX(-100%);
            }

            50% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box ngambang">
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
        @endif


        <div class="card">
            <div class="login-logo pt-2 bg-primary wave-animation">
                <a href="/admin"><b>{{ $key }}</b>Produksi</a>
            </div>
            <div class="card-body login-card-body" style="border-radius: 20px">
                <p class="login-box-msg">Sign in to start your session</p>
                @if ($key == 'Admin')
                    <form action="{{ route('loginadmin') }}" method="post">
                    @else
                        <form action="{{ route('login') }}" method="post">
                @endif
                {{-- <form action="{{ route('login') }}" method="post"> --}}
                @csrf
                <div class="input-group mb-3">
                    <input type="text"
                        class="form-control @error('email')
                            is-invalid
                        @enderror"
                        name="email" placeholder="Email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="pass" type="password"
                        class="form-control @error('password')
                        is-invalid
                    @enderror"
                        name="password" placeholder="Password" autofocus>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <span class="show-hide"><i class="fa fa-eye"></i></span>
                </div>
                <div class="row">

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block ">Sign In</button>
                    </div>

                </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        const password = document.getElementById('pass');
        const btn_show = document.querySelector('i');
        btn_show.addEventListener("click", function() {
            if (password.type === "password") {
                password.type = "text";
                btn_show.classList.add("hide");
            } else {
                password.type = "password";
                btn_show.classList.remove("hide");
            }
        })
    </script>

    <script src="LTE/plugins/jquery/jquery.min.js"></script>

    <script src="LTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="LTE/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
