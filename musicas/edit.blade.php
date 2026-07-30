<h1>Editar Música: {{ $musica->nome }}</h1>

<form action="{{  route('albuns.musicas.update' , [$album_id, $musica->id]) }}" method="POST">
  @csrf
  @method('PUT')

  <div>
    <label>Nome da Música:</label><br>
    <input type="text" name="name" value="{{ old('nome', $musica->nome) }}" required>
  </div>

  <div>
    <label>Artista:</label><br>
    <input type="text" name="artist" value="{{ old('artista', $musica->artista) }}" required>
  </div>

  <div>
    <label>Duração (em segundos):</label><br>
    <input type="number" name="duration" value="{{ old('duration', $musica->duration) }}" required>
  </div>

  <br>
  <button type="submit">Atualizar Música</button>
  <a href="{{ route('albuns.musicas.index', $album_id) }}">Cancelar</a>
</form>