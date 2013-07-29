<?php

class ImagesController extends BaseController {
    $imageHeight = 400; // Image height after uploading and cropping
    $imageWidth = 400; // Image width after uploading and cropping
    $imageMaxSize = 8000; // Max image size in kB


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $fileInput = Input::file('photo');

        // Validate that the images is less than maxSize
        if($fileInput < $imageMaxSize) {
            // Create instance of Image class
            $img = Image::make($fileInput);

            // If aspectratio is different from 1, crop
            if($img->width != $img->height) $needCropping = 1;

            // Upload
            $img->save(Auth::user()->imagepath.$img->basename);

            // If image needs cropping then don't add it to DB
            if(!$needCropping) {
                // Add to database             
                Auth::user()->profilePicture = Auth::user()->imagepath.$img->basename;
                Auth::user()->save();
            } else {
                // Return and promt user to crop the picture
                return 'Need cropping'; // Debug 
            }
        } else {
            // Return error: to large file
            return 'Too large image'; // Debug
        }
    }

    /**
    * Crop the given image
    * @param Image img
    * @return Image
    */
    public function crop($img) {
        return $img->crop();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}