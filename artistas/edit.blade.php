<h1>Editar Artista: {{ $artista->nome }}</h1>

<form action="{{ route('artistas.update', $artista->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Nome:</label><br>
        <input type="text" name="nome" value="{{ old('nome', $artista->nome) }}" required>
    </div>
    <div>
        <label>Gênero Musical:</label><br>
        <input type="text" name="genero" value="{{ old('genero', $artista->genero) }}">
    </div>
    <div>
        <label>Pais de Origem:</label>
        <input type="text" name="pais_origem" value="{{ old('pais_origem', $artista->pais_origem) }}">
    </div>
    <br>
    <button type="submit">Atualizar</button>
    <a href="{{ route('artistas.index') }}">Cancelar</a>
</form>