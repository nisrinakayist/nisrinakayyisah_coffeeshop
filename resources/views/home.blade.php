@extends('layouts.main')

@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center justify-content-md-start align-items-start h-100">
            <div class="col-12 col-md-10 col-lg-8">
                
                <div class="card bg-dark text-white main-card mb-5" style="border-radius: 1rem;">
                    <div class="card-body">
                        <div class="card2">
                            <p class="mb-0 text-uppercase coffee">COFFEE JOURNEY</p>
                        </div>
                        <h2 class="mb-2">Every Cup Tells </h2>
                        <p class="mb-2" id="t2"> a Story.</p>
                        <p class="pcard2">Susun daftar kedai kopi impian yang ingin Anda kunjungi, dokumentasikan setiap momen lewat foto, dan abadikan ulasan rasa dari setiap sudut kota dalam jurnal digital pribadi Anda. </p>
                        <a href="{{ url('/galerys') }}" class="btn btn-menu">Review</a>
                    </div>
                </div>

                <div class="stats-section mt-4">
                    <h4 class="text-white fw-bold mb-3 section-title">Statistik Jelajah</h4>
                    
                    <div class="d-flex flex-row flex-wrap gap-3 w-100">
                        
                        <div class="card border-0 p-2 counter-card" style="flex: 1; min-width: 180px; border-radius: 1rem;">
                            <div class="card-body d-flex align-items-center p-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: rgba(40, 167, 69, 0.2); flex-shrink: 0;">
                                    <i class="bi bi-camera text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-uppercase fw-bold text-white-50 mb-0" style="font-size: 0.65rem; letter-spacing: 0.5px;">
                                        Sudah Dikunjungi
                                    </h6>
                                    <h3 class="fw-bold mb-0 text-white mt-1" style="font-size: 1.4rem;">
                                        {{ $totalDikunjungi }} <span class="fw-normal text-white-50" style="font-size: 0.85rem;">Toko</span>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 p-2 counter-card" style="flex: 1; min-width: 180px; border-radius: 1rem;">
                            <div class="card-body d-flex align-items-center p-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background: rgba(255, 193, 7, 0.2); flex-shrink: 0;">
                                    <i class="bi bi-bookmark-dash text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-uppercase fw-bold text-white-50 mb-0" style="font-size: 0.65rem; letter-spacing: 0.5px;">
                                        Belum Dikunjungi
                                    </h6>
                                    <h3 class="fw-bold mb-0 text-warning mt-1" style="font-size: 1.4rem;">
                                        {{ $totalBelumDikunjungi }} <span class="fw-normal text-white-50" style="font-size: 0.85rem;">Toko</span>
                                    </h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
        </div>
    </div>
    

    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.pinimg.com/1200x/29/7e/fe/297efec5a4c0012bdc5610bb9a4e5a57.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
        }

        h2 {
            font-family: sans-serif;
            font-weight: bold;
            font-size: clamp(30px, 8vw, 50px);
            line-height: 1.2;
            margin: 20px;
            margin-bottom: 0;
        }

        /* Judul Section Statistik Baru */
        .section-title {
            font-family: sans-serif;
            letter-spacing: 0.5px;
            margin-left: 5px;
            opacity: 0.9;
        }

        /* Style untuk Counter Card (Tema Glassmorphism) */
        .counter-card {
            background-color: rgba(33, 37, 41, 0.75) !important;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
        }

        /* Card Utama */
        .card.bg-dark {
            display: flex;
            background-color: rgba(33, 37, 41, 0.8) !important;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            box-sizing: border-box;
            width: 100%;
            max-width: 800px;
            min-height: 450px;
            height: auto;
            gap: 20px;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Badge Coffee Journey */
        .card2 {
            background-color: transparent;
            border: 2px solid #F3E9DC;
            box-sizing: border-box;
            width: 100%;
            max-width: 600px;
            height: auto;
            min-height: 40px;
            border-radius: 14px;
            padding: 5px 15px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            color: #F3E9DC;
            margin: 20px;
        }

        .pcard2 {
            font-family: sans-serif;
            font-size: 15px;
            line-height: 1.6;
            margin: 20px;
            word-wrap: break-word;
        }

        #t2 {
            font-family: sans-serif;
            font-weight: bold;
            font-size: clamp(30px, 8vw, 50px);
            line-height: 1;
            margin: 20px;
            margin-top: -10px;
        }

        p.coffee {
            margin: 0;
        }

        .btn-menu {
            background-color: transparent;
            border: 2px solid #F3E9DC;
            color: #F3E9DC;
            margin: 20px;
            padding: 8px 25px;
            font-weight: bold;
        }

        .btn-menu:hover {
            background-color: #F3E9DC;
            color: #703B3B;
        }

        /* Perbaikan khusus layar kecil banget */
        @media (max-width: 576px) {
            h2, #t2, .pcard2, .btn-menu, .card2, .section-title {
                margin-left: 10px;
                margin-right: 10px;
            }
            .card.bg-dark {
                min-height: auto;
                padding-bottom: 20px;
            }
        }
    </style>
@endsection