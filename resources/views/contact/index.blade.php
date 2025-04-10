@extends('template')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Lista de Contatos</h4>
                @can('create-contact')
                <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-success">Adicionar</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Contato</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->contact }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    @can('edit-contact')
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> <span class="d-none d-md-inline">Editar</span>
                                    </a>
                                    @endcan
                                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-eye"></i> <span class="d-none d-md-inline">Ver</span>
                                    </a>
                                    @can('delete-contact')
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                              style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir este contato?')">
                                                <i class="fas fa-trash"></i> <span class="d-none d-md-inline">Excluir</span>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
