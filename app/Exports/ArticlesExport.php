<?php

namespace App\Exports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\FromQuery;

class ArticlesExport implements FromQuery
{

    // FromQuery instead of FromCollection for better performance

    public function query()
    {
        // we can put here any query we want
        return Article::all();
    }


}
