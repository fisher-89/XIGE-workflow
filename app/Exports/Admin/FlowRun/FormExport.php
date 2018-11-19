<?php

namespace App\Exports\Admin\FlowRun;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeWriting;


class FormExport implements WithMultipleSheets, WithEvents
{
    use Exportable;
    protected $formIds;
    protected $runIds;
    protected $code;
    protected $path;
    //
    protected $num = 0;

    public function __construct(array $formIds, array $runIds, string $code, $path)
    {
        $this->formIds = $formIds;
        $this->runIds = $runIds;
        $this->path = $path;
        $this->code = $code;
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
        foreach ($this->formIds as $k => $formId) {
            $sheets[] = new FormSheet($formId, $this->runIds, $this->code, $this->path);
        };
        return $sheets;
    }

    public function registerEvents(): array
    {
        return [
            BeforeWriting::class => function (BeforeWriting $event) {
                $count = $this->getExportCount();
//                $count = 40000;
                $this->getExportProgress($this->code, $count);
            }
        ];
    }

    /**
     * 获取导出进度
     */
    public function getExportProgress(string $code, int $count)
    {
        //每秒生成条数
        $num = 2000;
        $second = (int)(round($count / $num));

        if($count > 60000 && $count<100000){
            $num = 1500;
            $second = (int)(round($count / $num));
        }elseif ($count>100000 && $count<200000){
            $num = 1000;
            $second = (int)(round($count / $num));
        }else if($count>200000){
            $num = 600;
            $second = (int)(round($count / $num));
        }

        $data = Cache::get($code);
        if ($data['progress'] < 30)
            $data['progress'] = 30;

        for ($i = 1; $i <= $second; $i++) {
            if ($second > 1) {
                sleep(1);
            }
            $progress = (int)round(($num / $count) * (65 / 100) * 100);
            $data['progress'] = $data['progress'] + $progress;
            Cache::put($code, $data, 120);

            if ($data['progress'] >= 95) {
                $data['progress'] = 95;
                Cache::put($code, $data, 120);
                break;
            }
        }

    }

    /**
     * 获取全部条数
     * @return mixed
     */
    protected function getExportCount()
    {
        $sql = "select sum(count) as sum from (";
        foreach ($this->formIds as $formId) {
            $sql .= 'select count(*) as count from form_data_' . $formId . ' where run_id in (' . implode(',', $this->runIds) . ') union all ';
        }
        $sql = rtrim($sql, 'union all');
        $sql .= ') t';
        $data = DB::select($sql);
        $count = $data[0]->sum;
        return (int)$count;
    }
}
