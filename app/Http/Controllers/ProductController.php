<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
// use PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all()->pluck('name_category', 'id_category');

        return view('product.index', compact('category'));
    }

    public function data()
    {
        $product = Product::leftJoin('category', 'category.id_category', 'product.id_category')
            ->select('product.*', 'name_category')
            ->orderBy('code_product', 'asc')
            ->get();

        return datatables()
            ->of($product)
            ->addIndexColumn()
            ->addColumn('select_all', function ($product) {
                return '
                    <input type="checkbox" name="id_product[]" value="'. $product->id_product .'">
                ';
            })
            ->addColumn('code_product', function ($product) {
                return '<span class="badge badge-primary">'. $product->code_product .'</span>';
            })
            ->addColumn('modal', function ($product) {
                return change_dot($product->modal);
            })
            ->addColumn('price', function ($product) {
                return change_dot($product->price);
            })
            ->addColumn('stock', function ($product) {
                return change_dot($product->stock);
            })
            ->addColumn('aksi', function ($product) {
                return '
                <div class="btn">
                    <button type="button" onclick="editForm(`'. route('product.update', $product->id_product) .'`)" class="btn btn-xs btn-warning "><i class="fas fa-edit"></i></button>
                    <button type="button" onclick="deleteData(`'. route('product.destroy', $product->id_product) .'`)" class="btn btn-xs btn-danger "><i class="fas fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'code_product', 'select_all'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::latest()->first() ?? new Product();
        $request['code_product'] = 'PDT'. zero_on_front((int)$product->id_product +1, 6);

       $product = Product::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response(null, 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id_product as $id) {
            $product = Product::find($id);
            $product->delete();
        }

        return response(null, 204);
    }

    // public function cetakBarcode(Request $request)
    // {
    //     $dataproduct = array();
    //     foreach ($request->id_product as $id) {
    //         $product = Product::find($id);
    //         $dataproduct[] = $product;
    //     }

    //     $no  = 1;
    //     $pdf = PDF::loadView('product.barcode', compact('dataproduct', 'no'));
    //     $pdf->setPaper('a4', 'potrait');
    //     return $pdf->stream('product.pdf');
    // }
}
