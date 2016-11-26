<?php

/**
 * PAYPAL API SERVICE TEST
 */

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayPalService as PayPalSvc;

class PayPalController extends Controller
{

    private $paypalSvc;

    public function __construct(PayPalSvc $paypalSvc)
    {
        ///parent::__construct();

        $this->paypalSvc = $paypalSvc;
    }

    public function index(Request $request)
    {
        $data = [
            [
                'name' => \Session::get('nd_maso'),
                'quantity' => 1,
                'price' => $request->input('hdtk_gia'),
                'sku' => '1'
            ],
        ];
        $transactionDescription = "Nạp tiền";

        $paypalCheckoutUrl = $this->paypalSvc
            // ->setCurrency('eur')
            ->setReturnUrl(url('paypal/status'))
            // ->setCancelUrl(url('paypal/status'))
            ->setItem($data)
            // ->setItem($data[0])
            // ->setItem($data[1])
            ->createPayment($transactionDescription);

        if ($paypalCheckoutUrl) {
            return redirect($paypalCheckoutUrl);
        } else {
            dd(['Error']);
        }
    }

    public function status()
    {
        $paymentStatus = $this->paypalSvc->getPaymentStatus();
        dd($paymentStatus);
    }

    public function paymentList()
    {
        $limit = 10;
        $offset = 0;

        $paymentList = $this->paypalSvc->getPaymentList($limit, $offset);

        dd($paymentList);
    }

    public function paymentDetail(Request $request)
    {
        $paymentDetails = $this->paypalSvc->getPaymentDetails($request->input('paymentId'));

        dd($paymentDetails);
    }
}
