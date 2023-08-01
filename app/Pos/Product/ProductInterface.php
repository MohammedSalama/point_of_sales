<?php

namespace Pos\Product;

use Illuminate\Http\Request;
use Pos\Product\Requests\StoreProductsRequest;

interface ProductInterface
{
    /**
     * @return mixed
     */
    public function index();
    public function create();
    public function store(StoreProductsRequest $request);
    public function edit($id);
    public function update(StoreProductsRequest $request, $id);
    public function destroy(Request $request);

}
