<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaCreateRequest;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->keyword;
        $mahasiswa = Mahasiswa::with('prodi')
                    ->where('name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('nim', 'LIKE', '%'.$keyword.'%')
                    ->orWhereHas('prodi', function($query) use($keyword) {
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    })
                    ->paginate(15);
        return view('mahasiswa', ['mahasiswaList' => $mahasiswa]);
    }

    public function show($id) {
        $mahasiswa_detail = Mahasiswa::with('prodi.fakultas')->findOrFail($id);
        return view('mahasiswa-detail', ['mahasiswa' => $mahasiswa_detail]);
    }

    public function create() {
        $prodi = Prodi::select('id','name')->get();
        return view('mahasiswa-create', ['prodi' => $prodi]);
    }

    public function store(MahasiswaCreateRequest $request) {
        $imageDefault = '';
        if($request->file('photo')) {
            $formatFile = $request->file('photo')->getClientOriginalExtension();
            $imageDefault = $request->name . "-" . now()->timestamp . "." . $formatFile;
            $request->file('photo')->storeAs('photo', $imageDefault);
        }
        $request['image'] = $imageDefault;
        $mahasiswa = Mahasiswa::create($request->all());
        if($mahasiswa) {
            session()->flash('status', 'success');
            session()->flash('message', 'Sukses Menambahkan Mahasiswa');
        }
        return redirect('/mahasiswa');
    }

    public function edit($id) {
        $mahasiswa = Mahasiswa::with('prodi')->findOrFail($id);
        $prodi = Prodi::where('id', '!=', $mahasiswa->prodi_id)->get(['id', 'name']);
        return view('mahasiswa-edit', ['mahasiswa' => $mahasiswa, 'prodi' => $prodi]);
    }

    public function update(Request $request, $id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $imageDefault = '';
        if($request->file('photo')) {
            $formatFile = $request->file('photo')->getClientOriginalExtension();
            $imageDefault = $request->name . "-" . now()->timestamp . "." . $formatFile;
            $request->file('photo')->storeAs('photo', $imageDefault);
        }
        $request['image'] = $imageDefault;
        $mahasiswa->update($request->all());
        if($mahasiswa){
            session()->flash('status', 'success');
            session()->flash('message', 'Sukses Update Data Mahasiswa');
        }
        return redirect('/mahasiswa');
    }

    public function delete($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa-delete', ['mahasiswa' => $mahasiswa]);
    }

    public function destroy($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        if($mahasiswa) {
            session()->flash('status', 'success');
            session()->flash('message', 'Berhasil Menghapus Mahasiswa');
        }
        return redirect('/mahasiswa');
    }

    public function mahasiswaDeleted() {
        $mahasiswa = Mahasiswa::with('prodi')->onlyTrashed()->get();
        return view('mahasiswa-temporary', ['mahasiswa' => $mahasiswa]);
    }

    public function restore($id) {
        $mahasiswa = Mahasiswa::withTrashed()->where('id', $id)->restore();
        if($mahasiswa) {
            session()->flash('status','success');
            session()->flash('message', 'Data Berhasil Dipulihkan');
        }
        return redirect('/mahasiswa');
    }
}
