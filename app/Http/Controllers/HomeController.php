<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Limit validation
        $validator = Validator::make($request->all(), [
            'limit' => 'required|numeric|lte:1000000',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $limit = $request->limit;
        $notPrime[] = $limit;
        $primes = [];

        $notPrime[0] = 1;
        $notPrime[1] = 1;

        // Get all prime number
        for ($i = 2; $i < $limit; $i++) {
            if (empty($notPrime[$i])) {
                $primes[] = $i;
                for ($j = 2 * $i; $j < $limit; $j+= $i) {
                    $notPrime[$j] = 1;
                }
            }
        }

        $maxSum = 0;
        $maxRun = -1;
        $no = [];
        $consecutiveSum = [];
        for ($i = 0; $i < count($primes); $i++) {

            $sum = 0;
            $no = [];
            for ($j = $i; $j < count($primes); $j++) {
                $sum+= $primes[$j];
                $no[] = $primes[$j];
                if ($sum > $limit)
                break;
                if (empty($notPrime[$sum])  && $sum > $maxSum && $j - $i > $maxRun) {
                    // check $sum is prime or not
                    if($this->IsPrime($sum)){
                        $maxRun = $j - $i;
                        $maxSum = $sum;
                        $consecutiveSum = $no;
                    }
                
                }
            }
        }
        $maxRun = ++$maxRun;
        return view('welcome', compact('maxSum', 'maxRun','consecutiveSum', 'limit'));
    }

    public function IsPrime($n) {
        for($x=2; $x<$n; $x++) {
          if($n % $x ==0) { return false;}
        } 
        return true;
    }

}
