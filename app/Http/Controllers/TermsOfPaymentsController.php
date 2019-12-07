<?php

namespace App\Http\Controllers;

use App\TermsOfPayment;
use Illuminate\Http\Request;

class TermsOfPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termsOfPayments = TermsOfPayment::paginate(15);

        return view('terms_of_payments.list', [
            'termsOfPayments' => $termsOfPayments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terms_of_payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $termsOfPayment = new TermsOfPayment();
        $termsOfPayment->nameRussian = $request->get('nameRussian');
        $termsOfPayment->nameEnglish = $request->get('nameEnglish');
        $termsOfPayment->save();

        return redirect(route('termsOfPayments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $termsOfPayment = TermsOfPayment::find($id);
        $termsOfPayment->delete();

        return redirect(route('termsOfPayments.index'));
    }
}
