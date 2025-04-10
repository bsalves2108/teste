@extends('template')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Detalhes do Contato</h4>
                <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-secondary">Voltar</a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nome:</strong>
                    <p>{{ $contact->name }}</p>
                </div>
                <div class="mb-3">
                    <strong>Email:</strong>
                    <p>{{ $contact->email }}</p>
                </div>
                <div class="mb-3">
                    <strong>Contato:</strong>
                    <p>{{ $contact->contact }}</p>
                </div>
                <div class="d-flex justify-content-start">
                    @can('edit-contact')
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary me-2">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    @endcan
                    @can('edit-contact')
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este contato?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Excluir
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
