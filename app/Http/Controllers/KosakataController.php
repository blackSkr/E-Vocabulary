<?php

namespace App\Http\Controllers;

use App\Models\Kosakata;
use App\Models\Jeniskosakata;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KosakataController extends Controller
{
public function index(Request $request): View
{
    $query = Kosakata::with('jenis_kosakata')
        ->where('status', 'Disetujui');

    // 🔍 Filter berdasarkan pencarian
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('kata_indo', 'like', '%' . $search . '%')
              ->orWhere('kata_inggris', 'like', '%' . $search . '%');
        });
    }

    // 🏷️ Filter kategori
    if ($request->filled('kategori')) {
        $query->where('jenis_kosakata_id', $request->kategori);
    }

    // 🔃 Urutan (opsional)
    if ($request->filled('sort')) {
        switch ($request->sort) {
            case 'newest':
                $query->orderByDesc('created_at');
                break;
            case 'views':
                $query->orderByDesc('views');
                break;
            default:
                $query->orderBy('kata_indo');
                break;
        }
    }

    $terms = $query->paginate(9)->appends($request->query());
    $jenisKosakata = Jeniskosakata::all();

    return view('halaman.landingpages.index', compact('terms', 'jenisKosakata'));
}

}
