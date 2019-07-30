<?php

namespace App\Http\Controllers;

use App\Event;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator,Redirect,Response,File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //$events = Event::all();
        //return view('events/index', compact('events'));
        $images = Image::all();
        return view('images/index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Event::all(['id', 'event_name']);
        return view('images/create', compact('items',$items));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $file = $request->file('event_image');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('my_files')->put($file->getFilename().'.'.$extension,  File::get($file));
        //$file->store('toPath', ['disk' => 'my_files']);
    
        $image = new Image();
        $image->event_id = $request->event_id;
        $image->mime = $file->getClientMimeType();
        $image->original_filename = $file->getClientOriginalName();
        $image->filename = $file->getFilename().'.'.$extension;
        $image->save();
    
        return redirect()->route('events.index')
            ->with('success','Image added successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    $image->delete();
    return redirect()->route('images.index')
    ->with('success','Image deleted successfully');
        
    }
}
