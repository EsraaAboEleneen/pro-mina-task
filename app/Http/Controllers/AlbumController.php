<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Models\Album;
use App\Helpers\Attachment;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $records = Album::with('attachments')->paginate(10);
        return view('albums.index',compact('records'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(StoreAlbumRequest $request)
    {
        //create record for new album with request data
        $album = Album::create([
            'title' => $request->album_title
        ]);

        $imageNames = $request->images_names;
        $images = $request->file('images');

        //check if request contain files
        if ($request->hasFile('images')){
            foreach ($images as $index => $image){
                //upload image in storage disk && store record in attachments table with img data
                Attachment::upload('/user/albums',$image,$imageNames[$index],$album);
            }
        }
        return back()->with('success','Album Created Successfully');
    }

    public function edit($uuid)
    {
        $record = Album::whereUuid($uuid)->first();
        return view('albums.edit',compact('record'));
    }

    public function update(StoreAlbumRequest $request,$uuid)
    {
        //get the record
        $album = Album::whereUuid($uuid)->first();

        //if not exist
        if (!$album){
            abort(404);
        }

        //update record it exist
        $album->title = $request->album_title;
        $album->save();

        $imageNames = $request->images_names;
        $images = $request->file('images');
        if ($request->hasFile('images')){
            foreach ($images as $index => $image){
                Attachment::upload('/user/albums',$image,$imageNames[$index],$album);
            }
        }
        return back()->with('success','Album Created Successfully');
    }

    public function deleteImg($imgUuid)
    {
        $record = \App\Models\Attachment::whereUuid($imgUuid)->first();
        if (!$record){
            abort(404);
        }
        $record->delete();
        return response()->json(['success' => true]);

    }



}
