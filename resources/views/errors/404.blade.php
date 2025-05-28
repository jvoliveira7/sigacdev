@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-danger mt-5">
        <h1>404 - Página não encontrada</h1>
        <p>A página que você está procurando não existe.</p>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
    </div>
</div>
@endsection