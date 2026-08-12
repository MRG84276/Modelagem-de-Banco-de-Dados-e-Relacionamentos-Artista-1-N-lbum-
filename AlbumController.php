bum;


class AlbumController extends Controller
{
   
    public function index()
    {
        
        $albuns = Album::with('artista')->get(); 
        return view('albuns.index', compact('albuns'));

    }

    
    public function create()
    {

        $artistas = Artista::all(); 
        return view('albuns.create', compact('artistas'));

    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'artista_id' => 'required|exists:artistas,id',
            'ano_lancamento' => 'required|integer',
            'url_imagem' => 'nullable|url'
        ]);

        Album::create($validated);
        return redirect()->route('albuns.index')->with('sucesso', 'Álbum cadastrado com sucesso');

    }

   
    public function show(Album $album)
    {
        $album->load('musicas', 'artista'); 
        return view('albuns.show', compact('album'));
    }

   
    public function edit(Album $album)
    {
        $artistas = Artista::all();
        return view('albuns.edit', compact('album', 'artistas'));
    }

    
    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'artista_id' => 'required|exists:artistas,id',
            'ano_lancamento' => 'required|integer',
            'url_imagem' => 'nullable|url'
        ]);

        $album->update($validated);

        return redirect()->route('albuns.index')->with('sucesso', 'Álbum atualizado com sucesso');
    }

    public function destroy(Album $album)
    {
        $album->delete(); 
        
        return redirect()->route('albuns.index')->with('sucesso', 'Álbum e suas faixas foram excluídos');
    }
}

