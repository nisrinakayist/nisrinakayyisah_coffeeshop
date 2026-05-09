@extends('layouts.main')

@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center justify-content-md-start align-items-start h-100">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card bg-dark text-white main-card" style="border-radius: 1rem;">
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
            /* Font size responsif: besar di laptop, mengecil di HP */
            font-size: clamp(30px, 8vw, 50px);
            line-height: 1.2;
            margin: 20px;
            margin-bottom: 0;
        }

        /* Card Utama */
        .card.bg-dark {
            display: flex;
            background-color: rgba(33, 37, 41, 0.8) !important;
            backdrop-filter: blur(5px);
            box-sizing: border-box;
            /* RESPONSIF: Lebar maksimal 800px, tapi di HP 100% */
            width: 100%;
            max-width: 800px;
            min-height: 450px;
            height: auto;
            gap: 20px;
            margin-top: 20px;
        }

        /* Badge Coffee Journey */
        .card2 {
            background-color: transparent;
            border: 2px solid #F3E9DC;
            box-sizing: border-box;
            /* RESPONSIF: Jangan paksa 600px, pakai max-width */
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
            margin-top: -10px; /* Disesuaikan agar tidak terlalu jauh */
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
            h2, #t2, .pcard2, .btn-menu, .card2 {
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