<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EtalaseGalleryModel;
use App\Models\EtalaseModel;
use App\Http\Requests\Admin\GalleryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryEtalaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = EtalaseGalleryModel::with('Etalase')->get();

        return view('Pages.admin.gallery.index', ['galleries' => $galleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etalaseItems = EtalaseModel::all();

        return view('Pages.admin.gallery.create', ['etalaseItems' => $etalaseItems]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');
        EtalaseGalleryModel::create($data);

        Alert::toast('Success', 'Data berhasil ditambahkan');
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = EtalaseGalleryModel::findOrFail($id);
        $etalaseItems = EtalaseModel::all();

        return view('Pages.admin.gallery.edit', ['item' => $item, 'etalaseItems' => $etalaseItems]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {

        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');
        $a = EtalaseGalleryModel::findOrFail($id)->update($data);
    

        Alert::toast('Success', 'Data berhasil diubah');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = EtalaseGalleryModel::findOrFail($id);
        $items->delete();

        Alert::toast('Success', 'Data berhasil dihapus');
        return redirect()->route('gallery.index');
    }
}
