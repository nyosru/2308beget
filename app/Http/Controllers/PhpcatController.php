<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhpcatNewsCollection;
use App\Models\PhpcatNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhpcatController extends Controller
{

    public function apiNews()
    {
//        return response()->json([1 => 2]);
        try {
            return new PhpcatNewsCollection(PhpcatNews::all());
        }catch( \Exception $ex ){
            dD( $ex->getMessage());
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function getVueFiles(): array
    {
        $directory = 'public/phpcat/vue/dist/assets/';
        $files = Storage::files($directory);
        $in = [
            'vue_js' => '',
            'vue_css' => '',
        ];
        foreach ($files as $file) {
            if (strpos($file, 'index-') !== false) {
                if (strpos($file, '.css') !== false) {
                    $in['vue_css'] = Storage::url($file);
                } else if (strpos($file, '.js') !== false) {
                    $in['vue_js'] = Storage::url($file);
                }
            }
        }
        return $in;
    }

    public function index()
    {
        $in = $this->getVueFiles();
        return view('phpcat.index', $in);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
