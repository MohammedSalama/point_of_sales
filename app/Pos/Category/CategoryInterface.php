<?php

namespace Pos\Category;

use Pos\Category\Requests\StoreCategoriesRequest;

interface CategoryInterface
{
    /**
     * @return mixed
     */
    public function index();
    public function store(StoreCategoriesRequest $request);
    public function update(StoreCategoriesRequest $request, $id);
    public function destroy($id);
}
