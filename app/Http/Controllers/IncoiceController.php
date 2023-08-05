<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Incoice;
use Illuminate\Http\Request;

class IncoiceController extends Controller
{
    public  function  get_all_invoices(){
        $invoices=Incoice::with('customer')
            ->orderBy('id','DESC')
            ->get();
        return response()->json([
            'invoices' =>$invoices
        ],200);

    }
    public function  search_invoices(Request $request){
        $search=$request->get('s');
        if ($search != null){
            $invoices=Incoice::with('customer')
                ->where('id','LIKE',"%$search%")
//                ->orWhere('firstname','LIKE',"%$search%")
                ->get();
            return response()->json([
                'invoices' =>$invoices
            ],200);
        }

        return  $this->get_all_invoices();

    }

    public function create_invoice(Request $request)
    {
        $counter = Counter::where('key', 'invoice')->first();

        $invoice = Incoice::orderBy('id', 'DESC')->first();
        if ($invoice) {
            $invoiceId = $invoice->id + 1;
            $counters = $counter->value + $invoiceId;
        } else {
            $counters = $counter->value;
        }

        $formData = [
            'number' => $counter->prefix . $counters,
            'customer_id' => null,
            'customer' => null,
            'date' => date('y-m-d'),
            'due_date' => null,
            'reference' => null,
            'discount' => 0,
            'terms_and_conditions' => 'terms_and_conditions',
            'items' => [
                [
                    'unit_price' => 0,
                    'quantity' => 1,
                    'product_id' => null,
                    'product' => null,
                ],
            ],
        ];

        return response()->json($formData);
    }


}
