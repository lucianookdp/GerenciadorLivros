<?php

// app/Http/Controllers/LivroController.php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        $query = Livro::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('titulo', 'LIKE', "%{$search}%")
                ->orWhere('autor', 'LIKE', "%{$search}%");
        }

        if ($request->filled('sort_by')) {
            $sortBy = $request->input('sort_by');
            if ($sortBy == 'ano_publicacao') {
                $query->orderBy('ano_publicacao', 'desc');
            } else {
                $query->orderBy($sortBy);
            }
        }

        if ($request->filled('categoria_id')) {
            $categoriaId = $request->input('categoria_id');
            $query->where('categoria_id', $categoriaId);
        }

        $livros = $query->get(); // Remover paginação
        $totalLivros = Livro::count();
        $categorias = Categoria::all();

        return view('livros.index', compact('livros', 'totalLivros', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('livros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'ano_publicacao' => 'required|integer',
            'descricao' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Livro::create($request->all());
        return redirect('/livros')->with('success', 'Livro adicionado com sucesso!');
    }

    public function show($id)
    {
        $livro = Livro::with('categoria')->findOrFail($id);
        return view('livros.show', compact('livro'));
    }

    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        $categorias = Categoria::all();
        return view('livros.edit', compact('livro', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'ano_publicacao' => 'required|integer',
            'descricao' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $livro = Livro::findOrFail($id);
        $livro->update($request->all());
        return redirect('/livros')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return redirect('/livros')->with('success', 'Livro deletado com sucesso!');
    }

    public function home()
    {
        return view('livros.home');
    }

    public function relatorios()
    {
        return view('livros.relatorios');
    }

    public function showLoginForm()
    {
        return view('livros.admin');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === 'admin2024') {
            return redirect()->route('livros.index');
        } else {
            return redirect()->route('admin.loginForm')->with('error', 'Usuário ou senha inválidos. Tente novamente.');
        }
    }

    public function lista(Request $request)
    {
        $query = Livro::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('titulo', 'LIKE', "%{$search}%")
                ->orWhere('autor', 'LIKE', "%{$search}%");
        }

        if ($request->filled('sort_by')) {
            $sortBy = $request->input('sort_by');
            if ($sortBy == 'ano_publicacao') {
                $query->orderBy('ano_publicacao', 'desc');
            } else {
                $query->orderBy($sortBy);
            }
        }

        if ($request->filled('categoria_id')) {
            $categoriaId = $request->input('categoria_id');
            $query->where('categoria_id', $categoriaId);
        }

        $livros = $query->get(); // Remover paginação
        $totalLivros = Livro::count();
        $categorias = Categoria::all();

        return view('livros.lista', compact('livros', 'totalLivros', 'categorias'));
    }
}
