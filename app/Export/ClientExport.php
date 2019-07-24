<?php


namespace App\Export;

use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::where('status', '<>', Client::STATUS_EXCLUDED)->get();
    }
}
