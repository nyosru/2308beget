<?php

namespace Modules\Phpcat\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Phpcat\Entities\PhpcatNews;
use Modules\Phpcat\Transformers\PhpcatNewsCollection;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return new PhpcatNewsCollection( PhpcatNews::all()->sortByDesc('date') );
    }

    // /**
    //  * Show the form for creating a new resource.
    //  * @return Renderable
    //  */
    // public function create()
    // {
    //     return view('phpcat::create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  * @param Request $request
    //  * @return Renderable
    //  */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'head' => 'required|max:255',
            'date' => 'required|date',
            'text' => 'nullable',
            'img' => 'nullable|image',
            'link' => 'nullable|max:255',
            // 'title' => 'required|unique:posts|max:255',
            // 'body' => 'required',
        ]);

        if ($request->hasfile('img')) {
            $name = time().rand(1,100).'.'.$request->img->extension();
            if ($request->img->move(public_path('phpcat/'), $name)) {
                // $data = Image::create(["imageName" => $name]);
                $validated['img'] = '/phpcat/'.$name;
            }else{
                if( isset($validated['img']) )
                unset($validated['img']);
            }
         }

        return PhpcatNews::create($validated);
    }

    // /**
    //  * Show the specified resource.
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function show($id)
    // {
    //     return view('phpcat::show');
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function edit($id)
    // {
    //     return view('phpcat::edit');
    // }

    // /**
    //  * Update the specified resource in storage.
    //  * @param Request $request
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
