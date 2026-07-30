<h1>Detalhes do Álbum</h1>

<p><strong>Nome:</strong> {{ $album->nome }}</p>
<p><strong>Artista:</strong> {{ $album->artista }}</p>
<p><strong>Gênero:</strong> {{ $album->genero ?? 'N/A' }}</p>
<p><strong>Ano de Lançamento:</strong> {{ $album->ano_lancamento ?? 'N/A' }}</p>

<a href="{{ route('albuns.edit', $album->id) }}">Editar</a> 
<a href="{{ route('albuns.index') }}">Voltar para a Lista</a>