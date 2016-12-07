<?php

/**
 * PAYPAL API SERVICE TEST
 */

namespace App\Http\Controllers;

use App\Nguoidung;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayPalService as PayPalSvc;
use App\Hoadontk;
use PayPal\Api\WebProfile;
use PayPal\Exception\PayPalConnectionException;

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
        try{
        $data = [
            [
                'name' => \Session::get('nd_maso'),
                'quantity' => 1,
                'price' => $request->input('hdtk_gia'),
                'sku' => '1'
            ],
        ];
        $transactionDescription = "Nap_tien_vao_tai_khoan";

        $paypalCheckoutUrl = $this->paypalSvc
            // ->setCurrency('eur')
            ->setReturnUrl(url('paypal/status'))
            ->setCancelUrl(url('nguoiban/naptien/them'))
            ->setItem($data[0])
            // ->setItem($data[1])
            ->createPayment($transactionDescription);

        if ($paypalCheckoutUrl) {
            return redirect($paypalCheckoutUrl);
        } else {
            return redirect('nguoiban/naptien/them')->with('error-message','Thanh toán lỗi');
        }
        }
        catch (PayPalConnectionException $ex) {
            echo $ex->getCode(); // Prints the Error Code
            echo $ex->getData(); // Prints the detailed error message
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
    }

    public function status()
    {
        $paymentStatus = $this->paypalSvc->getPaymentStatus();
        $hoadontk_gia = ($paymentStatus->transactions[0]->item_list->items[0]->price)*20000;
        $hoadontk = new Hoadontk();
        $hoadontk->hdtk_nguoidung = \Session::get('nd_maso');
        $hoadontk->hdtk_tgian = date('Y-m-d');
        $hoadontk->hdtk_gia=$hoadontk_gia;
        $hoadontk->save();
        Nguoidung::naptien(\Session::get('nd_maso'),$hoadontk_gia);
        return redirect('nguoiban/naptien/them')->with('message','Bạn đã nạp '.$hoadontk_gia.' vào tài khoản thành công');
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
