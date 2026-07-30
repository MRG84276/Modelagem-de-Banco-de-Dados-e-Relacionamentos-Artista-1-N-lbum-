<h1>Lista de Álbuns</h1>

<a href="/albuns/create">Ir para Formulário</a>
<table>
    @foreach ($albuns as $album)
        <tr>
            <td>
                <h3><?= $album->name ?></h3>
            </td>
            <td>
                <p><?= $album->artist ?></p>
            </td>
        </tr>
    @endforeach
</table>