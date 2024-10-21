<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index() {
        $prodi = Prodi::with('fakultas')->get();
        return view('prodi', ['prodi' => $prodi]);
    }

    public function show($id) {
        $prodi = Prodi::with(['fakultas', 'mahasiswa'])->findOrFail($id);
        return view('prodi-detail', ['prodi' => $prodi]);
    }

    public function create() {
        $fakultas = Fakultas::select('id', 'name')->get();
        return view('prodi-create', ['fakultas' => $fakultas]);
    }

    public function store(Request $request) {
        $prodi = Prodi::create($request->all());
        if($prodi) {
            session()->flash('status','success');
            session()->flash('message','Program Studi Berhasil Ditambahkan');
        }
        return redirect('/prodi');
    }

    public function edit($id) {
       $prodi = Prodi::with('fakultas')->findOrFail($id);
       $fakultas = Fakultas::where('id', '!=', $prodi->fakultas_id)->get();
        return view('prodi-edit', ['prodi' => $prodi, 'fakultas' => $fakultas]);
    }

    public function update(Request $request, $id) {
        $prodi = Prodi::findOrFail($id);
        $prodi->update($request->all());
        if($prodi) {
            session()->flash('status', 'success');
            session()->flash('message', 'Program Studi Berhasil Diupdate');
        }
        return redirect('/prodi');
    }

    public function delete($id) {
        $prodi = Prodi::findOrFail($id);
        return view('prodi-delete', ['prodi' => $prodi]);
    }

    public function destroy($id) {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        if($prodi) {
            session()->flash('status', 'success');
            session()->flash('message', 'Prodi Berhasil Dihapus');
        }
        return redirect('/prodi');
    }

    public function prodiDeleted() {
        $prodi = Prodi::onlyTrashed()->get();
        return view('prodi-temporary', ['prodi'=>$prodi]);
    }

    public function restore($id) {
        $prodi = Prodi::withTrashed()->where('id', $id)->restore();
        if($prodi) {
            session()->flash('status', 'success');
            session()->flash('message', 'Prodi Berhasil Dipulihkan');
        }
        return redirect('/prodi');
    }
}
