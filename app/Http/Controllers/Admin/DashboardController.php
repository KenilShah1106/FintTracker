<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constants\TransactionConstants;
use App\Http\Controllers\Controller;
use App\Jobs\GeneratePdf;
use App\Models\Category;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard()
    {

        $transactionsTypes = TransactionConstants::TRANSACTION_TYPE;
        $categories = Category::all();
        $categoriesCount = $categories->count();
        $transactions = Transaction::all();
        $totalTransactions = $transactions->count();

        $typePercentageMapping = [];
        $categoryPercentageMapping = [];
        $categoryWiseData = [];

        foreach($transactionsTypes as $transactionsType) {
            $percentage = $totalTransactions == 0 ? 0 : (($transactions->where('type', $transactionsType)->count())/$totalTransactions)*100;
            $typePercentageMapping[] = $percentage;
        }

        $categoryAmountWiseData = [];
        foreach($categories as $category) {
            $temp = [];
            $transactionCount = $transactions->count();
            $percentage = ($categoriesCount == 0)|| ($transactionCount == 0) ? 0 : (($transactions->where('category_id', $category->id)->count())/$transactionCount)*100;
            $categoryWiseData[] = $transactions->where('category_id', $category->id)->count();
            $categoryAmountWiseData[] = $transactions->where('category_id', $category->id)->whereNotNull('amt_debit')->sum('amt_debit');

            for($i = 1; $i <= 12; $i++) {
                $temp[] = Transaction::whereMonth('date', ''.$i)->where('category_id', $category->id)->whereNotNull('amt_debit')->sum('amt_debit');
                $categoryMonthAmountWiseData[$category->name] = $temp;
            }

            // $categoryMonthAmountWiseData[$category->name] = $transactions->where('category_id', $category->id)->whereNotNull('amt_debit')->sum('amt_debit');

            $categoryPercentageMapping[] = $percentage;
        }
        // dd($categoryMonthAmountWiseData);
        $monthWiseData = [];
        for($i = 0; $i < 12; $i++) {
            $monthWiseData[] = Transaction::whereMonth('date', ''.$i+1)->count();
        }

        $categories = $categories->pluck('name');

        $currDate = Carbon::now();

        $transaction = Transaction::whereMonth('date', $currDate->subMonth())->latest()->first();
        $openingBalance = $transaction ? $transaction->balance : 0;

        // $currMonthTransactions = Transaction::whereMonth('date', $currDate->format('m'))
        //     ->orWhereMonth('date', $currDate->subMonth()->format('m'))
        //     ->whereYear('date', $currDate->year)
        //     ->get();

        $currMonthTransactions = Transaction::get();
        $transaction = $currMonthTransactions->last();
        $closingBalance = $transaction ? $transaction->balance : 0;

        $highestSpend = $currMonthTransactions->pluck('balance')->max();
        $highestSpend = $highestSpend == null ? 0 : $highestSpend;
        $totalMoneyIn = $currMonthTransactions->pluck('amt_credit')->sum();
        $totalMoneyOut = $currMonthTransactions->pluck('amt_debit')->sum();
        return view('dashboard', compact('typePercentageMapping', 'transactionsTypes', 'categoryPercentageMapping', 'categories', 'monthWiseData',
        'categoryWiseData', 'openingBalance', 'closingBalance', 'highestSpend', 'totalMoneyIn', 'totalMoneyOut', 'categoryAmountWiseData', 'categoryMonthAmountWiseData'));
    }

    public function storeImageFromUri(Request $request) {
        set_time_limit(300);
        $images = $request->get('images');
        $stats = $request->get('stats');
        $transactionTypeStats = $stats[0];
        $categoryPercentStats = $stats[1];
        $monthWiseStats = $stats[2];
        $categoryWiseStats = $stats[3];
        $categoryAmountWiseStats = $stats[4];
        $categoryMonthAmountWiseStats = $stats[5];
        $time = time();
        $path = public_path().'\assets\img\reports\report-'.$time;
        File::makeDirectory($path, 0777, true, true);
        $paths = [];
        foreach($images as $i => $image){
            $image = $images[$i];
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $image = base64_decode($image);
            $imageName = 'image_'.$time.'_'.(++$i).'.png';
            $file = $path . "\\" .$imageName;
            array_push($paths, $file);
            file_put_contents($file, $image);
        }

        $pdf = Pdf::loadView('report', compact('paths', 'transactionTypeStats', 'categoryPercentStats', 'monthWiseStats', 'categoryWiseStats', 'categoryAmountWiseStats', 'categoryMonthAmountWiseStats'));
        $pdf->setPaper('A4', 'landscape');
        $pdfPath = public_path() . '/assets/pdf/reports/report-'.$time;
        File::makeDirectory($pdfPath, 0777, true, true);
        $pdfFileName = $pdfPath . '/' . 'report-'.$time.'.pdf';
        $pdf->save($pdfFileName);
        File::deleteDirectory($path);
        return $pdf->stream();
    }

    public function storeInDbFromChat(Request $request) {
        $api = $request->api;

        $response = Http::get($api);

        if(Transaction::count('*') > 0) {
            $balance = Transaction::latest()->get()->first()->balance;
        }
        else {
            $balance = 0;
        }


        $responseBody = $response->json("body");
        $ref = Transaction::all()->last()->reference_no;
        $ref += 1;
        $desc = $responseBody['Desc']['value']['resolvedValues'][0];
        $date = $responseBody['Date']['value']['resolvedValues'][0];
        $amount = $responseBody['Amount']['value']['resolvedValues'][0];
        $category = $responseBody['Cat']['value']['resolvedValues'][0];
        $amtType = $responseBody['AmtType']['value']['resolvedValues'][0];
        $type = TransactionConstants::CASH;
        $balance = $amtType == "DEBIT" ? $balance - $amount : $balance + $amount;

        Transaction::create([
            'reference_no' => $ref,
            'date' => $date,
            'description' => $desc,
            'amt_type' => $amtType,
            'amt_debit' => $amtType == "DEBIT" ? $amount: null,
            'amt_credit' => $amtType == "CREDIT" ? $amount: null,
            'balance' => $amtType == "DEBIT" ? $balance - $amount : $balance + $amount,
            'category_id' => Category::where('name', "food")->get()->first()->id,
            'user_id' => auth()->id(),
            'type' => $type,
        ]);

        return response()->json([
            "success" => "Transaction inserted successfully!"
        ]);
    }

}
