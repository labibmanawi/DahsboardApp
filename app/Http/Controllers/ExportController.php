<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportpdf() {
        $data = Product::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('admin.products.productdata-pdf');
        return $pdf->download('productlist.pdf');
    }

    public function exportexcel() {
        return Excel::download(new ProductExport,'dataproduct.xls');
    }

    public function exportcsv() {
        return Excel::download(new ProductExport,'dataproduct.csv');
    }

    public function importexcel(Request $request) {
        $data = $request->file('file');
        $namefile = $data->getClientOriginalName();
        $data->move('ProductData',$namefile);
        Excel::import(new ProductImport, \public_path('/ProductData/'.$namefile));
        return \redirect()->back();
    }
}
