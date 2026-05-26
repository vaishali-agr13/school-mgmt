<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{

    public function create()
    {
        return view('gallery.create');
    }

    public function indexFrontEnd() {
        
        $galleries = Gallery::latest()->get();

        return view('front-end.gallery', compact('galleries'));
    }
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('gallery.index', compact('galleries'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480'
        ]);

        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                // extension
                $extension = $file->getClientOriginalExtension();

                // type detect
                $type = in_array($extension, ['mp4', 'mov', 'avi']) 
                            ? 'video' 
                            : 'image';

                // unique name
                $filename = time().'_'.$file->getClientOriginalName();

                // folder
                $folder = $type == 'image'
                            ? '/uploads/gallery/images'
                            : '/uploads/gallery/videos';

                $destinationPath = $_SERVER['DOCUMENT_ROOT'].$folder;

                File::copy($file, $destinationPath.'/'.$filename);

                // move file
               // $file->move(public_path($folder), $filename);

                // save db
                Gallery::create([
                    'title' => $filename,
                    'type' => $type,
                    'file' => $folder.'/'.$filename,
                ]);
            }
        }

        return back()->with('success', 'Gallery uploaded successfully');
    }

    public function edit($id)
        {

            $gallery = Gallery::find($id);

            return view('gallery.edit', compact('gallery'));
        }

    public function update(Request $request, $id)
        {
            $gallery = Gallery::find($id);

            if ($request->hasFile('file')) {

                // old file delete
                if (file_exists(public_path($gallery->file))) {
                    unlink(public_path($gallery->file));
                }

                $file = $request->file('file');

                $extension = $file->getClientOriginalExtension();

                // detect type
                $type = in_array($extension, ['mp4', 'mov', 'avi'])
                            ? 'video'
                            : 'image';

                $filename = time().'_'.$file->getClientOriginalName();

                $folder = $type == 'image'
                            ? '/uploads/gallery/images'
                            : '/uploads/gallery/videos';

                $destinationPath = $_SERVER['DOCUMENT_ROOT'].$folder;

                File::copy($file, $destinationPath.'/'.$filename);

                //$file->move(public_path($folder), $filename);

                $gallery->update([
                    'type' => $type,
                    'file' => $folder.'/'.$filename,
                ]);
            }

            return redirect('/admin/gallery')
                    ->with('success', 'Gallery updated successfully');
        }

        public function destroy($id)
        {
            $gallery = Gallery::find($id);

            // delete file from folder
            if (file_exists(public_path($gallery->file))) {

                unlink(public_path($gallery->file));
            }

            // delete record
            $gallery->delete();

            return redirect('/admin/gallery')
                    ->with('success', 'Gallery deleted successfully');
        }
 }