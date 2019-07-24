<?php


namespace App\Http\Controllers;

use App\Export\ClientExport;
use Maatwebsite\Excel\Excel;

class ExportController
{
    private $excel;

    /**
     * ExportController constructor.
     * @param Excel $excel
     */
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    /**
     * @param Excel $excel
     * @return Excel|\Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function exportViaMethodInjection(Excel $excel)
    {
        return $excel->download(new ClientExport, 'clients.xlsx');
    }
}
