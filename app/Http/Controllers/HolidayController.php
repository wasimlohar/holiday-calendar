<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::all();
        return view('holidays', compact('holidays'));
    }

    public function holidaysList(Request $request)
    {
        $search = $request->input('search', ''); // Default to an empty string if 'search' is not set

        $query = Holiday::query();

        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('type', 'like', "%{$search}%")
                ->orWhere('date', 'like', "%{$search}%");
        }

        $holidays = $query->paginate(10);
        return view('index', compact('holidays', 'search'));
    }
}
