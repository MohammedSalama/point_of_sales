<?php

namespace Pos\Invoice;

use Illuminate\Http\Request;

interface InvoiceInterface
{
    /**
     * @return mixed
     */
    public function index();
    public function create();
    public function store(Request $request);
    public function edit($id);
    public function update(Request $request, $id);
    public function destroy(Request $request);
    public function getProduct($id);
    public function getPrice($id);
    public function payment_statusChange(Request $request);
}
