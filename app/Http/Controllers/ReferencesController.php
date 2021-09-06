<?php

namespace App\Http\Controllers;

use App\References;
use Illuminate\Http\Request;


class ReferencesController extends Controller
{
    public function getreference(Request $request)
    {
        if($request->reference != ''){

            $reference = References::where(['reference_groupname' => $request->reference])->orderBy('reference_id', 'asc')->get();
        }
        if($request->reference == ''){

            $reference = References::where(['reference_status' => $request->reference_status])->orderBy('reference_id', 'asc')->get();
        }

        return response()->json([
            'data' => $reference
        ]);
    }
    public function savereference(Request $request)
    {
        $reference = new References;
        $reference->reference_groupname         = $request->reference_groupname;
        $reference->reference_shortcodename     = $request->reference_short;
        $reference->reference_longcodename      = $request->reference_long;
        $reference->reference_status            = 1;
        $reference->added_by                    = auth()->id();
        $reference->save();

        if ($request->expectsJson()) {
            return response()->json([
                'data' => $reference,
                'message' => "Your status has been submitted."
            ]);
        }
        return redirect('/');
    }

}
