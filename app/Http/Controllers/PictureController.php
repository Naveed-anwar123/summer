<?php

namespace App\Http\Controllers;

use App\Http\Requests\PictureRequest;
use App\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $pictures = Picture::latest()->get();
        return view('picture.index',compact('pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('picture.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PictureRequest $request)
    {
        //
//        $this->validate($request,[
//            'name'=>'required|23'
//        ]);
        $formInput = $request->all();
        $file =  $request->file('file');
        if($file)
        {
            $orignalName = $file->getClientOriginalName();
            $file->move('images',$orignalName);
            $formInput['path'] = $orignalName;
        }


        //return $formInput;
       // $picture = new Picture();
       //$picture->save($formInput);
        Picture::create($formInput);
     //echo "Image Uploaded successfully";
        return redirect()->route('picture.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
