<?php

namespace App\Http\Controllers;

use App;
use App\Offer;
use App\OfferProduct;
use App\Product;
use App\TermsOfPayment;
use Barryvdh\DomPDF\Facade as PDF;


use Illuminate\Http\Request;
use Storage;



class OffersController extends Controller
{
    private function saveOffer(Offer $offer, $sourceOffer)
    {
        $offer->name = $sourceOffer['name'];
        $offer->number = $sourceOffer['number'];
        $offer->productionTime = $sourceOffer['productionTime'];
        $offer->language = $sourceOffer['language'];
        $offer->sale = $sourceOffer['sale'];
        $offer->termsOfPayment = $sourceOffer['termsOfPayment'];
        $offer->employee = $sourceOffer['employee'];
        $offer->number = $sourceOffer['name'];
        $offer->save();

        $totalCost = 0;
        foreach ($sourceOffer['products'] as $key => $product) {
            if (!$product['delete']) {
                if (isset($product['id'])) {
                    $offerProduct = OfferProduct::find($product['id']);

                    if (isset($offerProduct->image) && $offerProduct->image != $product['image']) {
                        Storage::delete('temp/' . $offerProduct->image);
                    }
                } else {
                    $offerProduct = new OfferProduct();
                }

                $offerProduct->number = $key;
                $offerProduct->description = $product['description'];
                $offerProduct->price = $product['price'];
                $offerProduct->quantity = $product['quantity'];
                $offerProduct->measure = $product['measure'];

                if (isset($product['image'])) {
                    $offerProduct->image = $product['image'];
                }

                $offer->products()->save($offerProduct);

                $totalCost += $offerProduct->quantity * $offerProduct->price;
            }
        }

        $offer->totalCost = $totalCost;
        $offer->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::orderBy('id', 'desc')->with('employeeCanceledR')->paginate(15);
        $employees = App\Employee::all();

        return view('offers.list', [
            'offers' => $offers
            ,'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $termsOfPayments = TermsOfPayment::all();
        $employees = App\Employee::all();

        return view('offers.create', [
            'products' => $products
            ,'termsOfPayments' => $termsOfPayments
            ,'employees' => $employees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offer = new Offer();
        $this->saveOffer($offer, $request->get('offer'));

        return response([
            'offerId' => $offer->id
        ], 200);

    }

    public function edit($id)
    {
        $products = Product::all();
        $termsOfPayments = TermsOfPayment::all();
        $employees = App\Employee::all();
        $offer = Offer::whereId($id)->with('products')->first();

        return view('offers.edit', [
            'products' => $products
            ,'termsOfPayments' => $termsOfPayments
            ,'employees' => $employees
            ,'offer' => $offer
        ]);
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $sourceOffer = $request->get('offer');

        foreach ($sourceOffer['products'] as $product) {
            if (isset($product['id']) && isset($product['delete']) && $product['delete']) {
                $product = OfferProduct::find($product['id']);

                if (isset($product->image)) {
                    Storage::delete('temp/' . $product->image);
                }

                $product->delete();
            }
        }

        $this->saveOffer($offer, $sourceOffer);

        return response([
            'offerId' => $offer->id
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::whereId($id)->with('products', 'term')->first();
        if ($offer->sale !== null && $offer->sale !== 0) {
            $totalCost = $offer->totalCost - $offer->totalCost / 100 * $offer->sale;
        } else $totalCost = $offer->totalCost;

        if ($offer->language == 0) {
            App::setLocale('ru');
        } else {
            App::setLocale('en');
        }

        $employee = App\Employee::find($offer->employee);

        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('template_pdf.main', [
            'offer' => $offer
            ,'totalCost' => $totalCost
            ,'employee' => $employee
        ]);

        return response($pdf->download('customers.pdf')->getOriginalContent(), 200, [
            'Content-Type' => 'application/pdf'
        ]);
    }

    public function canceled(Request $request, $id)
    {
        $offer = Offer::find($id);

        if(isset($offer)) {
            $offer->employeeCanceled = $request->get('employeeCanceled');
            $offer->save();

            return redirect(route('offers.index'));
        } else {
            return response(view('404'), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);

        if(isset($offer)) {
            $offerProducts = $offer->products;

            foreach ($offerProducts as $product) {
                if (isset($product->image))
                    Storage::delete('temp/' . $product->image);

                $product->delete();
            }
            $offer->delete();

            return redirect(route('offers.index'));
        } else {
            return response(view('404'), 404);
        }
    }
}
