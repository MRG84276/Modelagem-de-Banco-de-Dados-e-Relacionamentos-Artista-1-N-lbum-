<h1>Cadastrar Álbum</h1>

<form action="{{ route('albuns.store') }}" method="POST">
    @csrf
    <div>
        <label>Nome do Álbum:</label><br>
        <input type="text" name="nome" value="{{ old('nome') }}" required>
    </div>
    <div>
        <label>Nome do artista:</label><br>
        <input type="text" name="artista" value="{{ old('artista') }}" required>
    </div>
    <div>
        <label>Ano de Lançamento:</label>
        <input type="text" name="ano_lancamento" value="{{ old('ano_lancamento') }}">
    </div>
    <br>
    <button type="submit">Salvar</button>
    <a href="{{ route('albuns.index') }}">Cancelar</a>
</form>
