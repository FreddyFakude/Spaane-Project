<?php


namespace App\Services\PDF;


use App\Models\CompanyPayslip;
use App\Models\Employee;
use App\Services\EmployeeRemunerationAndDeductionService;
use App\Services\TaxCalculations\PAYECalculator;
use App\Services\TaxCalculations\UIFCalculator;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

//use function App\PDF\str_ends_with;

class PayslipPDFGenerator
{
    /**
     * PDFGenerator constructor.
     *
     */
    public function __construct(protected $pdfPath='public/payslips/')
    {
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $this->dompdf = new Dompdf();
//        $this->dompdf = App::make('dompdf.wrapper');
    }

    public function downloadPDF(Employee $employee, CompanyPayslip $payslip, $createNewFile = false){
        $filePathWithFileExtension = $this->getPDF($employee, $payslip, $createNewFile);
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

    private function getPDF(Employee $employee, $payslip, $createNewFile = false)
    {
        $filenameWithoutFileExtension = strtolower($employee->name) . "_" .$payslip->date;
        $filePathWithFileExtension = $this->filePathWithFileExtension($filenameWithoutFileExtension);
        if ((!$createNewFile) && !$this->fileIsExpiredOrDoesNotExist($employee, $filePathWithFileExtension, $payslip)){
            return $filePathWithFileExtension;
        }
        return  $this->createPDFSaveToDBAndDisk($filePathWithFileExtension, $filenameWithoutFileExtension, $employee, $payslip);
    }

    private function createPDFSaveToDBAndDisk($filePathWithFileExtension, $filenameWithoutFileExtension, $employee, $payslip)
    {
        $html = view('pdfs.payslip-template', [
            'employee' => $employee,
            'earnings' => $employee->remunerations,
            'deductions' => $employee->deductions,
            'otherDeductions' => $employee->otherDeductions, //TODO: change to 'otherDeductions
            'otherEarnings' => $employee->otherEarnings,
            'payslip' => $payslip,
            'paye' => (new PAYECalculator($employee))->calculatePaye(),
            'uif' => (new UIFCalculator($employee))->calculateUIF(),
            'totalDeductions' => (new EmployeeRemunerationAndDeductionService)->totalDeductions($employee),
            'totalEarnings' => (new EmployeeRemunerationAndDeductionService)->totalEarnings($employee),
            'companyContributions' => $employee->company->remunerationContributions,
        ])->render();

       $file =  $this->sendFileToAPI($html, $filenameWithoutFileExtension);

//        sleep(2);

        Storage::disk('local')->put($filePathWithFileExtension,  $file);
        $this->saveFileToDB($employee, $filenameWithoutFileExtension, $filePathWithFileExtension, $payslip);

//        $response =   new BinaryFileResponse("storage/payslips/" . $filenameWithoutFileExtension .'.pdf');
//        $response->headers->set('Content-Type', 'application/pdf');
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

    public static function sendFileToAPI($html, $filenameWithPath)
    {
        return Http::attach(
            'html', $html, 'payslip.html'
        )->post(env('PDF_GENERATOR_API_URL'));

    }
}
