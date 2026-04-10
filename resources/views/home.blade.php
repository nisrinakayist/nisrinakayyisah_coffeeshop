@extends('layouts.main')

@section('content')
{{-- <section class="vh-100 gradient-costum"></section> --}}
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-left align-items-start h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                    <div class="card-body">
                        <div class="card2">
                            <p class="mb-0 text-uppercase coffee ">COFFEE JOURNAY</p>
                        </div>
                            {{-- <div class="mb-md-5 mt-md-4 pb-5"> --}}
                                <h2 class="mb-2">Every Cup Tells </h2>
                                <p class="mb-2" id="t2"> a Story.</p>
                                <p class="pcard2">Susun daftar kedai kopi impian yang ingin Anda kunjungi, dokumentasikan setiap momen lewat foto, dan abadikan ulasan rasa dari setiap sudut kota dalam jurnal digital pribadi Anda. </p>
                                <a href="{{ url('/galerys') }}" class="btn btn-menu">Review</a>
                                
                            {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.pinimg.com/1200x/29/7e/fe/297efec5a4c0012bdc5610bb9a4e5a57.jpg');
            background-size: cover;
            background-positon: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
        }
        h2{
            font-family: 'sans-serif';
            font-weight: bold;
            font-size: 50px;
            line-height: 2;
            margin: 20px;
            margin-bottom: 0;
        }
        .card.bg-dark{
            display: flex;
            background-color: rgba(33, 37, 41, 0.8)  !important;
            backdrop-filter: blur(5px);
            box-sizing: border-box;
            width: 800px;
            height: 450px;
            gap: 20px;
            
    
        }
        .card2 {
           background-color: transparent;
           border: 2px solid #F3E9DC;
           box-sizing: border-box;
           width: 600px;
           height: 20px;
           border-radius: 14px;
           padding: 15px;
           display: flex;
           align-items: center;
           justify-content: flex-start;
           padding-left: 15px;
           color: #F3E9DC;
        }
        p{
            /* color: #FFF8F0;
            font-family: sans-serif;
            font-size: 15px;
            line-height: 0.5;
            text-align: left;
            margin: 20px; */
            /* font-weight: bold; */
        }
        .pcard2{
            font-family: sans-serif;
            font-size: 15px;
            overflow: hidden;
            word-wrap:break-word;
            overflow: break-word;
            line-height: 1.6;
            margin: 20px;

        }
        .button-link{
            display: inline-block;
            padding: 12px 24px;
            background-color: #BFA28C;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3 ease;
            border: none;
            cursor: pointer;
            margin: 20px;
            font-family: 'sans-serif';
        }
        #t2{
            font-family: 'sans-serif';
            font-weight: bold;
            font-size: 50px;
            line-height: 1;
            margin: 20px;
            margin-top: -30px;
        }
        p.coffee{
            /* color: #FFF8F0;
            font-family: sans-serif;
            font-size: 15px;
            text-align: left;
            margin: 20px;
            font-weight: bold; */
            margin-top: -2px;
            margin bottom: 0px;
        }
        .btn-menu{
            background-color: transparent;
            border: 2px solid #F3E9DC;
            color: #F3E9DC;
            margin: 20px;
        }
        .btn-menu:hover{
            background-color: #F3E9DC;
            color: #703B3B;
        }
    </style>
{{-- </section> --}}
@endsection