<h1>Cadastrar Artista</h1>

<form action="{{ route('artistas.store') }}" method="POST">
    @csrf
    <div>
        <label>Nome:</label><br>
        <input type="text" name="nome" value="{{ old('nome') }}" required>
    </div>
    <div>
        <label>Gênero Musical:</label><br>
        <input type="text" name="genero" value="{{ old('genero') }}">
    </div>
    <div>
        <label>Pais de Origem:</label>
        <input type="text" name="pais_origem" value="{{ old('pais_origem') }}">
    </div>
    <br>
    <button type="submit">Salvar</button>
    <a href="{{ route('artistas.index') }}">Cancelar</a>
</form>