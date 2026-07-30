<h1>Detalhes do Artista</h1>

<p><strong>Nome:</strong> {{ $artista->nome }}</p>
<p><strong>Gênero:</strong> {{ $artista->genero ?? 'N/A' }}</p>
<p><strong>Pais de Origem:</strong> {{ $artista->pais_origem ?? 'N/A' }}</p>

<a href="{{ route('artistas.edit', $artista->id) }}">Editar</a> 
<a href="{{ route('artistas.index') }}">Voltar para a Lista</a>