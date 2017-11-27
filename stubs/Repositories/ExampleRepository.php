<?php

namespace App\Repositories%subfolder%;

use App\Contracts\Repositories%subfolder%\%model%Repository as Contract;
use %model_path%;
use Ksoft\Klaravel\Repositories\EloquentRepo;
use QueryParser\ParserRequestFactory;

class %model%Repository extends EloquentRepo implements Contract
{
    public function model()
    {
        return %modelSingular%::class;
    }

    /**
     * Listing page records.
     * https://github.com/rlacerda83/lumen-api-query-parser/wiki/Usage
     *
     * @param  Illuminate\Http\Request $request
     * @return Pagination|Collection|Array
     */
    public function withRelationships($request)
    {
        $search_term = $request->input('q') ?: '';

        // Eloquent
        $queryParser  = ParserRequestFactory::createParser($request, $this->model, $this->model);
        // QueryBuilder
        // $queryParser  = ParserRequestFactory::createParser($request, $this->model);

        $queryBuilder = $queryParser->parser();

        return $this->paginateIf($queryBuilder->get());

    }

}
