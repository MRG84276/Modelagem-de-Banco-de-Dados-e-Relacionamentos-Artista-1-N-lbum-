<h1>Cadastrar Álbum</h1>

<form action="{{ route('albuns.store') }}" method="POST">
    @csrf
    <div>
        <label>Nome do Álbum:</label><br>
        <input type="text" name="nome" value="{{ old('nome') }}" required>
    </div>
    <div>
        <label for="artista_id">Artista:</label><br>
        <select id="artista_id" name="artista_id" required>
            <option value="">-- Selecione um Artista --</option>
            @foreach($artistas as $artista)
                <option value="{{ $artista->id }}" {{ old('artista_id') == $artista->id ? 'selected' : '' }}>
                    {{ $artista->nome }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Ano de Lançamento:</label>
        <input type="text" name="ano_lancamento" value="{{ old('ano_lancamento') }}">
    </div>
    <br>
    <button type="submit">Cadastrar</button>
    <a href="{{ route('albuns.index') }}">Cancelar</a>
</form>