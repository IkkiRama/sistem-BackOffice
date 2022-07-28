@extends("layouts.main")

@section("title", "Halaman Home")
@section("body")
	<h1>Selamat Datang Di Web Kami {{auth()->user()->name}}</h1>
@endsection