<h1>Adicionar uma nova Música ao Álbum {{ $album_id }}</h1>

<form action="{{ route('albuns.musicas.store', $album_id) }}" method="POST">
    @csrf

    <div>
        <label>Nome da Música:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label>Artista:</label><br>
        <input type="text" name="artist" value="{{ old('artist') }}" required>
    </div>

    <div>
        <label>Duração (em quantidade de minutos):</label><br>
        <input type="number" name="duration" value="{{ old('duration') }}" required>
    </div>

    <br>
    <button type="submit">Salvar Música</button>
    <a href="{{ route('albuns.musicas.index', $album_id) }}">Cancelar</a>
</form>