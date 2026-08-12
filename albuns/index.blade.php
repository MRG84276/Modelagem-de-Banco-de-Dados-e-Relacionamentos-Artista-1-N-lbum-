<h1>Lista de Álbuns</h1>

<a href="{{ route('albuns.create') }}">Novo Álbum</a> | 
<a href="{{ route('artistas.index') }}">Ver Artistas</a>


<table border="1" cellpadding="8" ">
    <thead>
        <tr>
            <th>nome</th>
            <th>Artista</th>
            <th>Ano de Lançamento</th>
        </tr>
    </thead>
    <tbody>
        @forelse($albuns as $albun)
            <tr>
                <!-- Exibição da url_imagem com fallback se estiver vazia -->
                <td style="text-align: center;">
                    @if($albun->url_imagem)
                        <img src="{{ $albun->url_imagem }}" alt="{{ $albun->nome }}">
                    @else
                        <span">Sem imagem</span>
                    @endif
                </td>

                <td><strong>{{ $albun->nome }}</strong></td>
                <td>{{ $albun->artista->nome ?? 'Artista Não Encontrado' }}</td>
                <td>{{ $albun->ano_lancamento }}</td>

                <td>
                  
                    <a href="{{ route('albuns.musicas.index', $albun->id) }}">Músicas</a> | 
                    <a href="{{ route('albuns.show', $albun->id) }}">Detalhes</a> | 
                    <a href="{{ route('albuns.edit', $albun->id) }}">Editar</a> | 

                    <form action="{{ route('albuns.destroy', $albun->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Excluir este álbum?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center;">Nenhum álbum cadastrado.</td>
            </tr>
        @endforelse
    </tbody>
</table>