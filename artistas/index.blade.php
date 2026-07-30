<h1>Lista de Artistas</h1>

<a href="{{ route('artistas.create') }}">Novo Artista</a> | 
<a href="{{ route('albuns.index') }}">Ver Álbuns</a>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Pais de Origem</th>
        </tr>
    </thead>
    <tbody>
        @forelse($artistas as $artista)
            <tr>
                <td>{{ $artista->nome }}</td>
                <td>{{ $artista->genero ?? 'N/A' }}</td>
                <td>{{ $artista->pais_origem ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('artistas.show', $artista->id) }}">Detalhes</a>
                    <a href="{{ route('artistas.edit', $artista->id) }}">Editar</a>
                    <form action="{{ route('artistas.destroy', $artista->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Excluir artista?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">Nenhum artista cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>