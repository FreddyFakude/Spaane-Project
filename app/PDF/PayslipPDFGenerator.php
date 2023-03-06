<?php


namespace App\PDF;


use App\Models\Employee;
use App\Models\Payslip;
use App\Models\ProofOfResidenceRequestCase;
use App\Models\ProofOfResPdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

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

    public function downloadPDF(Employee $employee){
        $filePathWithFileExtension = $this->getPDF($employee);
        $pdf =  Storage::disk('local')->get($filePathWithFileExtension);
        return (new Response($pdf, 200))
            ->header('Content-Type', 'application/pdf');
    }

    public function filePublicUrl($filepath){
        return asset(str_replace("public", "storage", $filepath));
    }

    public function generatePDf(Employee $employee){
        return $this->getPDF($employee);
    }

    private function getPDF(Employee $employee)
    {
        $filenameWithoutFileExtension = $employee->name;
        $filePathWithFileExtension = $this->filePathWithFileExtension($filenameWithoutFileExtension);
        if (!$this->fileIsExpiredOrDoesNotExist($employee, $filePathWithFileExtension)){
            return $filePathWithFileExtension;
        }
        return  $this->createPDFSaveToDBAndDisk($filePathWithFileExtension, $filenameWithoutFileExtension, $employee);
    }

    private function createPDFSaveToDBAndDisk($filePathWithFileExtension, $filenameWithoutFileExtension, $employee)
    {
        $pdf = $this->dompdf->loadView('pdfs.payslip');
        Storage::put($filePathWithFileExtension, $pdf->output());
        $this->saveFileToDB($employee, $filenameWithoutFileExtension, $filePathWithFileExtension);
        $pdf->download($filenameWithoutFileExtension .'.pdf');
        return $filePathWithFileExtension;
    }

    protected function deletePDF(){

    }

    private function fileIsExpiredOrDoesNotExist(Employee $employee, $filePathWithFileExtension):bool
    {
        $pdf =  $employee->load('payslips');
        $payslip = $pdf->payslips->last();
        if (!Storage::disk('local')->exists($filePathWithFileExtension) || (!$payslip)){
            return true;
        }
        return  $payslip->created_at->diffInMonths() >= 1;
    }

    private function filePathWithFileExtension($filenameWithoutFileExtension):string
    {
        //ensure we did not add an extension by mistake
        if (str_ends_with($filenameWithoutFileExtension, '.pdf')){
            $filenameWithoutFileExtension =  substr($filenameWithoutFileExtension, 0, -4);
        }

        return $this->pdfPath . $filenameWithoutFileExtension . '.pdf';
    }

    private function saveFileToDB($employee, $filenameWithoutFileExtension, $filePathWithFileExtension){
        return  $save = Payslip::updateOrCreate(
            [
                'employee_id' => $employee->id,
                'company_id' => $employee->company_id,
            ],
            [
                'file_name'=> $filenameWithoutFileExtension . '.pdf',
                'file_path' => $filePathWithFileExtension
            ]);
    }
}
