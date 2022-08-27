@extends('layouts.frontend.app')
@push('css')
<style>

</style>
@endpush
@section('content')


    <!-- Header Area Start -->
    @include('layouts.frontend.partial.header')
    <!-- Header Area End -->

    <!-- category Area Start -->
    @include('layouts.frontend.partial.category')
    <!-- category Area End -->




    <!--  Blog area Start -->
    <!-- Blog Area Start -->

     @include('layouts.frontend.partial.blog')
    <!-- Blag Area End -->
    <!--  Blog area End -->




@endsection

