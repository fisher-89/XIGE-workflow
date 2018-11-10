<?php

namespace App\Exports\Admin\FlowRun;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class FormExport implements WithMultipleSheets
{
    use Exportable;
    protected $formIds;
    protected $runIds;

    public function __construct(array $formIds,array $runIds)
    {
        $this->formIds = $formIds;
        $this->runIds = $runIds;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    }

    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->formIds as $k=> $formId){
            $sheets[] = new FormSheet($formId,$this->runIds);
        };
        return $sheets;
    }
}
