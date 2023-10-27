<?php

namespace App\Http\Controllers;


use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\EntryIncome;
use App\Models\Category;
use App\Models\Expense;
use Auth;
use Illuminate\Support\Facades\Log;
use PDF;
use SebastianBergmann\Environment\Console;
use App\Models\StatisticsUmrah;
use App\Models\StatisticsVisa;

class accountController extends Controller
{
    // public function AllEntry()
    // {
    //     $entries = EntryIncome::latest()->paginate(5);
    //     $categories = Category::latest()->paginate(5);
    //     return view('admin.account.incomeEntry', compact('entries', 'categories'));
    // }
    // public function AddEntry(Request $request)
    // {
    //     $validated = $request->validate(
    //         [
    //             'applicant_name' => 'required|max:255',
    //             'amount' => 'required|max:30',
    //             'date' => 'required',
    //             'status' => 'required',
    //         ],
    //         [
    //             'applicant_name.required' => 'Please input Applicant Name',
    //             'applicant_name.max' => 'Input Maximum 255 Digit',
    //             'amount.required' => 'Please input amount',
    //             'amount.max' => 'Input Maximum 30 Digit',
    //             'date.required' => 'Please input Date',

    //         ]
    //     );
    //     EntryIncome::insert([
    //         'applicant_name' => $request->applicant_name,
    //         'amount' => $request->amount,
    //         'user_id' => Auth::user()->id,
    //         'created_at' => Carbon::now(),
    //         'date' => $request->date,
    //         'Status' => $request->status,

    //     ]);
    //     return redirect()->back()->with('success', 'Incom Entry Inserted Successfully.');
    // }
    // public function AllExpense()
    // {
    //     $expenses = Expense::latest()->paginate(5);
    //     return view('admin.account.expense', compact('expenses'));
    // }
    // public function AddExpense(Request $request)
    // {
    //     $validated = $request->validate(
    //         [
    //             'expense_name' => 'required|max:255',
    //             'amount' => 'required|max:30',
    //             'date' => 'required',

    //         ],
    //         [
    //             'expense_name.required' => 'Please input Applicant Name',
    //             'expense_name.max' => 'Input Maximum 255 Digit',
    //             'amount.required' => 'Please input amount',
    //             'amount.max' => 'Input Maximum 30 Digit',
    //             'date.required' => 'Please input Date',

    //         ]
    //     );
    //     Expense::insert([
    //         'expense_name' => $request->expense_name,
    //         'amount' => $request->amount,
    //         'user_id' => Auth::user()->id,
    //         'created_at' => Carbon::now(),
    //         'date' => $request->date,
    //     ]);
    //     return redirect()->back()->with('success', 'Expense Entry Inserted Successfully.');
    // }
    // public function MonthlyIncome($month)
    // {
    //     $from = date('Y') . '-' . $month . '-01';
    //     $to = date('Y') . '-' . $month . '-31';

    //     $monthlyIncome = EntryIncome::whereBetween('date', [$from, $to])->get();
    //     return view('admin.account.monthlyIncome', compact('monthlyIncome', 'month'));
    // }
    // public function YearlyIncome()
    // {
    //     return view('admin.account.yearlyIncome');
    // }
    // public function DownloadPdf($month)
    // {
    //     $from = date('Y') . '-' . $month . '-01';
    //     $to = date('Y') . '-' . $month . '-31';

    //     $monthlyIncome = EntryIncome::whereBetween('date', [$from, $to])->get();
    //     $pdf = PDF::loadView('admin.account.monthlyIncomePDF', compact('monthlyIncome'));

    //     return $pdf->download('entries.pdf');
    // }

    public static function monthlyGraph()
    {
        $currentYear = date("Y");
        $months = [];

        $counted = max(StatisticsUmrah::max('Amount'), StatisticsVisa::max('Amount'));
        $data = [];
        $counted = $counted / 8;

        for ($i = 0; $i < 8; $i++) {
            $months[(string)($i * $counted)] = $i * $counted;
        }

        foreach ($months as $month => $index) {
            $from = $currentYear . '-' . ($index + 1) . '-01';
            $to = $currentYear . '-' . ($index + 1) . '-31 23:59:59';

            $inc = rand(
                min(StatisticsUmrah::min('Amount'), StatisticsVisa::min('Amount')),
                max(StatisticsUmrah::max('Amount'), StatisticsVisa::max('Amount'))
            );
        
            $exp = rand(
                min(StatisticsUmrah::sum('TiketPrice')+ StatisticsUmrah::sum('VisaPrice')+ StatisticsUmrah::sum('OtherExpenses'), StatisticsVisa::sum('TiketPrice')+ StatisticsVisa::sum('VisaPrice')+ StatisticsVisa::sum('OtherExpenses')),
                max(StatisticsUmrah::sum('TiketPrice')+ StatisticsUmrah::sum('VisaPrice')+ StatisticsUmrah::sum('OtherExpenses'), StatisticsVisa::sum('TiketPrice')+ StatisticsVisa::sum('VisaPrice')+ StatisticsVisa::sum('OtherExpenses'))
            );
            
            $data[$month] = [$inc, $exp];
        }

        return json_encode($data);
        // $currentYear = date("Y");
        // $months = [];
        
        // $counted = max(StatisticsUmrah::max('Amount') , StatisticsVisa::max('Amount'));
        // $data = [];
        // $counted =$counted / 8;
        // // $j = 1;
        // for($i = 0; $i < 8; $i++){
        //     $months[(string)($i*$counted)] = $i*$counted;
        //     // $i<2 ? ($months[(string)(-$i*$counted)] = -$i*$counted) : ($months[(string)($j*$counted)] = $j*$counted);
        //     // if($i >= 2){
        //     //     $j++;
        //     // }
            
        // }
        // foreach ($months as $month => $index) {
        //     $from = $currentYear . '-' . $index + 1 . '-01';
        //     $to = $currentYear . '-' . $index + 1 . '-31 23:59:59';

        //     $inc = StatisticsUmrah::count() + StatisticsVisa::count();
        //     $exp = max(StatisticsVisa::count(), StatisticsVisa::count());
        //     // echo $exp.'<br>';
        //     $data[$month] = [$inc, $exp];
        // }
        // return json_encode($data);
        
        // $currentYear = date("Y");
        // $months = ['0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10, '11' => 11];
        // $counted = StatisticsUmrah::count() + StatisticsVisa::count();
        // $data = [];
        // $counted =$counted / 8;
        // for($i = 0; $i < 8; $i++){
        //     $months[(string)($i*$counted)] = $i*$counted;
        // }
        // foreach ($months as $month => $index) {
        //     $from = $currentYear . '-' . $index + 1 . '-01';
        //     $to = $currentYear . '-' . $index + 1 . '-31 23:59:59';

        //     $inc = StatisticsUmrah::sum('Amount') + StatisticsVisa::sum('Amount');
        //     $exp = StatisticsUmrah::sum('TiketPrice') + StatisticsVisa::sum('TiketPrice') + StatisticsUmrah::sum('VisaPrice') + StatisticsVisa::sum('VisaPrice') + StatisticsUmrah::sum('OtherExpenses') + StatisticsVisa::sum('OtherExpenses');
        //     // echo $exp.'<br>';
        //     $data[$month] = [$inc, $exp];
        // }
        // return json_encode($data);
    }
    public static function totalGraph()
    {
        $totalIncome = EntryIncome::sum('amount');
      
        $totalExpense = Expense::sum('amount');
      
        
        return json_encode([$totalIncome, $totalExpense]);
       
    }
}
