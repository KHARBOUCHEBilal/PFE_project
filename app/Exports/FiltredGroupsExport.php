<?php

namespace App\Exports;

use App\Models\FiltredGroup;
use App\Models\Subject;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;

class FiltredGroupsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $filtred_groups = DB::table('filtred_groups')->select('subject','student1','student2','student3')->get();
        return $filtred_groups;
    }


    public function map($filtred_group): array
    {
        return [
            $filtred_group->subject->name,
            $filtred_group->subject->teacher->nom.' '.$filtred_group->subject->teacher->prenom,
            $filtred_group->group->user1->nom .' '.  $filtred_group->group->user1->prenom,
            $filtred_group->group->user2->nom .' '.  $filtred_group->group->user2->prenom,
            $filtred_group->group->user3->nom .' '.  $filtred_group->group->user3->prenom,
        ];
    }

    public function headings(): array
    {
        return [
            'subject title',
            'first member',
            'second member',
            'thired member'
        ];
    }


    public function registerEvents(): array
    {
        return [
            Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
                $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
            }),
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);

                $event->sheet->styleCells(
                    'A1:G1',
                    [
                        'font' => [
                            'bold' => true,
                            'color'=>['argb' => '3b8a2d'],
                        ],
                        
            
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color' => ['argb' => '3b8a2d'],
                            ],
                        ]
                    ]
                );
            },
        ];
    }
}
