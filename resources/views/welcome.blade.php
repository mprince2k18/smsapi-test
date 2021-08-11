@extends('frontend.layouts.master')

@section('title', 'Newsletter')
@section('description', 'Anwar Landmark is a Leading Real Estate Developer of Residential and Commercial Property and Landmark in Bangladesh')
@section('keywords', '')

@section('content')

    <section class="otherPageContent">
         <div class="container py-4">
        
                <div class="row">
                    <div class="col-lg-4 col-md-4 py-4">
                        <a href="{{ route('wow.book', "1") }}" target="_blank">
                            <img class="img-fluid" src="{{ asset('frontend/images/Anwar Image/newsletter/1.png') }}">
                            <h4 class="font-weight-normal">Newsletter (Aug - Sep, 2021)</h4>
                        </a>
                    </div>
                </div>

            </div>
    </section>

@endsection
