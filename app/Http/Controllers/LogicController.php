<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRatingRequest;
use Illuminate\Support\Facades\Log;

class LogicController extends Controller
{
    public function store(StoreRatingRequest $request)  {
        $data = $request->validated(); // data validate
        try {
            // start create data
            DB::transaction(function () use ($data) {
                Rating::create($data);
            });

            return redirect()->route('book.index')->with('success', 'Your rating has been saved!');
        } catch (\Throwable $th) {
            DB::rollBack(); // rollback data when try block fails
            Log::error('error_store_rating:'. $th->getMessage()); // loging
            return back()->withErrors('Someting went wrong!');
        }
    }
}
