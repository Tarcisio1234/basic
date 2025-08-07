@extends('home.home_master')

@section('home')

@include('home.home_layout.slider')
  <!-- end hero -->
@include('home.home_layout.features')
  <!-- end content -->

@include('home.home_layout.clarifiles')
  <!-- end content -->

@include('home.home_layout.atualisacao_financeira')
  <!-- end content -->

@include('home.home_layout.video')
  <!-- end video -->

@include('home.home_layout.testemunho')
  <!-- end testimonial -->

 @include('home.home_layout.perguntas_loja')
  <!-- end cta --> 

@endsection