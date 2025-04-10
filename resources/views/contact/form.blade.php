@extends('template')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>{{ isset($contact) ? 'Editar Contato' : 'Adicionar Contato' }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ isset($contact) ? route('contacts.update', $contact->id) : route('contacts.store') }}" method="POST">
                    @csrf
                    @if(isset($contact))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $contact->name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $contact->email ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Telefone</label>
                        <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact', $contact->contact ?? '') }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">{{ isset($contact) ? 'Atualizar' : 'Salvar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
