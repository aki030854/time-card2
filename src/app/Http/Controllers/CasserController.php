<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casser;

class CasserController extends Controller
{
    public function create() {
         
     }

    public function store(Request $request)
{
    $Casser = new Casser();
    $casser->breakstart = $request->input('breakstart');
    $Casser->breakend = $request->input('breakend');
    $casser->save();
}
public function update(Request $request) {
    $Casser->breakend = $request->input('breakend');
    $Casser->save();
}
}
