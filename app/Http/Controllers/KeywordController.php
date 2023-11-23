<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class KeywordController extends Controller
{
    public function getKeywords()
    {
        // You can cache the result to avoid frequent API calls
        // $keywords = Cache::remember('keywords', now()->addHours(1), function () {

        //     // Execute your Python script and get the output
        //     // $command = escapeshellcmd('threshholdkeywords.py');
        //     $pythonScriptPath = '"C:\\Backup\\Data Backup pratham\\E Drive\\SPIT Work\\Sem 7\\MoneyWiz\\MoneyWiz\\storage\\app\\pythonscripts\\threshholdkeywords.py"';
        //     $pythonScriptOutput = shell_exec("python $pythonScriptPath 2>&1");

        //     // Decode the JSON output
        //     return $pythonScriptOutput;
        //     // return json_decode($pythonScriptOutput, true);

        // });


            // Execute your Python script and get the output
            // $command = escapeshellcmd('threshholdkeywords.py');
            $pythonScriptPath = '"E:\sync\college\S.P.I.T\sem-7\major-project\moneywiz\app\Http\Controllers\Admin\scripts\threshholdkeywords.py"';
            $pythonScriptOutput = shell_exec("python $pythonScriptPath 2>&1");
            // Decode the JSON output
            return $pythonScriptOutput;
            // return json_decode($pythonScriptOutput, true);




    }
}
