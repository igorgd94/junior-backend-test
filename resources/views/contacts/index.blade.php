@extends('layouts.app')

@section('content')
    <h1>Lista de Contatos</h1>

    <ul>
        @foreach ($contacts as $contact)
            <li>{{ $contact->name }} - {{ $contact->email }}</li>
        @endforeach
    </ul>
@endsection
