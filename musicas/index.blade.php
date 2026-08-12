<h1>Lista de Músicas do Álbuns</h1>

<a href="{{ route('albuns.musicas.create', $album_id) }}">Nova Música</a>
<a href="/albuns/index">Ir para Formulário</a>

<table border="1" cellpadding="10">
    <thead>
       <tr>
          <th>Nome</th>
          <th>Artista</th>
          <th>Duração</th>
       </tr>
    </thead>
    <tbody>
        @foreach ($musicas as $musica)
            <tr>
                <td><?= $musica->nome ?></td>
                <td><?= $musica->artista ?></td>
                <td><?= $musica->duration ?></td>
                <td>
                    <a href="{{ route('albuns.musicas.show', [$album_id, $musica->id]) }}">Ver detalhes</a>
                    <a href="{{ route('albuns.musicas.edit', [$album_id, $musica->id]) }}">Editar</a>
                    <form action="{{ route('albuns.musicas.destroy', [$album_id, $musica->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>