<?php


namespace App\Services\PDF;


use App\Models\CompanyPayslip;
use App\Models\Employee;
use App\Services\TaxCalculations\PAYECalculator;
use App\Services\TaxCalculations\UIFCalculator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use function App\PDF\str_ends_with;

class PayslipPDFGenerator
{
    /**
     * PDFGenerator constructor.
     *
     */
    public function __construct(protected $pdfPath='public/payslips/')
    {
        $this->dompdf = App::make('dompdf.wrapper');
    }

    public function downloadPDF(Employee $employee, CompanyPayslip $payslip){
        $filePathWithFileExtension = $this->getPDF($employee, $payslip);
        $pdf =  Storage::disk('local')->get($filePathWithFileExtension);
        return (new Response($pdf, 200))
            ->header('Content-Type', 'application/pdf');
    }

    public function filePublicUrl($filepath){
        return asset(str_replace("public", "storage", $filepath));
    }

    public function generatePDf(Employee $employee, CompanyPayslip $payslip){
        return $this->getPDF($employee, $payslip);
    }

    private function getPDF(Employee $employee, $payslip)
    {
        $filenameWithoutFileExtension = strtolower($employee->name) . "_" .$payslip->date;
        $filePathWithFileExtension = $this->filePathWithFileExtension($filenameWithoutFileExtension);
        if (!$this->fileIsExpiredOrDoesNotExist($employee, $filePathWithFileExtension, $payslip)){
            return $filePathWithFileExtension;
        }
        return  $this->createPDFSaveToDBAndDisk($filePathWithFileExtension, $filenameWithoutFileExtension, $employee, $payslip);
    }

    private function createPDFSaveToDBAndDisk($filePathWithFileExtension, $filenameWithoutFileExtension, $employee, $payslip)
    {
        $pdf = $this->dompdf->loadView('pdfs.payslip', [
            'employee' => $employee,
            'payslip' => $payslip,
            'paye' => (new PAYECalculator($employee))->calculatePaye(),
            'uif' => (new UIFCalculator($employee))->calculateUIF(),

        ]);
        Storage::disk('local')->put($filePathWithFileExtension, $pdf->output());
        $this->saveFileToDB($employee, $filenameWithoutFileExtension, $filePathWithFileExtension, $payslip);
        $pdf->download($filenameWithoutFileExtension .'.pdf');
        return $filePathWithFileExtension;
    }

    protected function deletePDF(){

    }

    private function fileIsExpiredOrDoesNotExist(Employee $employee, $filePathWithFileExtension, $payslip):bool
    {
        if (!Storage::disk('local')->exists($filePathWithFileExtension)){
            return true;
        }
        return  $payslip->created_at->diffInMonths() >= 1;
    }

    private function filePathWithFileExtension($filenameWithoutFileExtension):string
    {
        //ensure we did not add an extension by mistake
        if (\str_ends_with($filenameWithoutFileExtension, '.pdf')){
            $filenameWithoutFileExtension =  substr($filenameWithoutFileExtension, 0, -4);
        }

        return $this->pdfPath . $filenameWithoutFileExtension . '.pdf';
    }

    private function saveFileToDB($employee, $filenameWithoutFileExtension, $filePathWithFileExtension, $payslip){
        return  $save = CompanyPayslip::updateOrCreate(
            [
                'employee_id' => $employee->id,
                'company_id' => $employee->company_id,
                'hash' => $payslip->hash
            ],
            [
                'file_name'=> $filenameWithoutFileExtension . '.pdf',
                'file_path' => $filePathWithFileExtension
            ]);
    }
}
