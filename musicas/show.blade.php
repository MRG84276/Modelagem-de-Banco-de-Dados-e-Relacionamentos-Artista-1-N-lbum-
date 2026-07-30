<h1>Detalhes da Música</h1>

<p><strong>Nome:</strong> {{ $musica->name }}</p>
<p><strong>Artista:</strong> {{ $musica->artista }}</p>
<p><strong>Duração:</strong> {{ $musica->duration }} segundos</p>
<p><strong>ID do Álbum:</strong> {{ $album_id }}</p>

<a href="{{ route('albuns.musicas.edit', [$album_id, $musica->id]) }}">Editar</a> 
<a href="{{ route('albuns.musicas.index', $album_id) }}">Voltar para a Lista</a>

