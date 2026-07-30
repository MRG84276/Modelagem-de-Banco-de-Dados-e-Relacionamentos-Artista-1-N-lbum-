<h1>Editar Album: {{ $album->nome }}</h1>

<form action="{{ route('albuns.update', $album->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Nome:</label><br>
        <input type="text" name="nome" value="{{ old('nome', $album->nome) }}" required>
    </div>
    <div>
        <label>Artista:</label><br>
        <input type="text" name="artista" value="{{ old('artista', $album->artista) }}" required>
    </div>
    <div>
        <label>Gênero:</label>
        <input type="text" name="genero" value="{{ old('genero', $album->genero) }}">
    </div>
    <div>
        <label>Data de Lançamento:</label>
        <input type="text" name="ano_lancamento" value="{{ old('ano_lancamento', $album->ano_lancamento) }}">
    </div>
    <br>
    <button type="submit">Atualizar</button>
    <a href="{{ route('albuns.index') }}">Cancelar</a>
</form>