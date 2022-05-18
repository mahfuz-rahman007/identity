<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Archive;
use Illuminate\Support\Facades\Session;

class ArchiveController extends Controller
{
    public function index() {
        $archives = Archive::all();
        return view('admin.blog.archive.index', compact('archives'));
    }

    public function add() {
        return view('admin.blog.archive.add');
    }

    public function store(Request $request) {
        $request->validate([
            'date' => 'required',
        ]);


        $archive = new Archive();
        $archive->date = $request->date;
        $archive->save();

        Session::flash('success', 'Archive Added successfully!');
        return redirect()->route('admin.archive');
    }

    public function edit($id) {
        $archive = Archive::findOrFail($id);
        return view('admin.blog.archive.edit', compact('archive'));
    }

    public function update(Request $request, $id) {





        $request->validate([
            'date' => 'required',
        ]);

        $archive = Archive::findOrFail($id);
        $archive->date = $request->date;
        $archive->save();

        Session::flash('success', 'Archive Updated successfully!');
        return redirect()->route('admin.archive');
    }

    public function delete($id){
       
        $archive = Archive::findOrFail($id);
        $archive->delete();

        Session::flash('success', 'Archive Deleted successfully!');
        return redirect()->route('admin.archive');
    }
}
