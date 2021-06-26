<?php 
 // CONTROLLER
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lampen;
use App\LampType;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class LampController extends Controller 
{
    public function index()
    {
        return view('overzicht');
    }

    public function detail(Request $request) 
    {
        $lamp = $request->input("lamp",2);
        $watt = $request->input("watt",'');
        
        if (!empty($watt)) {
            $lampen = Lampen::select('*')->where([
                ['specs', 'like', '%'.$watt.'W'],['product', '=', $lamp]])->limit(20)->get();
        }
        else {
            $lampen = Lampen::select('*')->where('product', $lamp)->limit(20)->get();
        }

        return view('overzicht', ['lamp'=>$lamp, 'watt'=>$watt, 'lampen'=>$lampen, 'lamptype'=>LampType::lampen()]);
    }
} 