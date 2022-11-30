<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
// use Dompdf\Dompdf;
// use DB;

class AdminAuthController extends Controller
{
    use ImageUploadTrait;

    public function login(): View
    {
        return view('backend.login');
    }

    public function forgotPassword(): View
    {
        return view('backend.forgot-password');
    }

    public function accountSetting(): View
    {
        return view('backend.account_setting');
    }

    public function updateAccount(Request $request): RedirectResponse
    {
       
        if ($request->hasFile('user_image')) {
            if (auth()->user()->user_image) {
                (new ImageService())->unlinkImage(auth()->user()->user_image, 'users');
            }
            $adminImage = (new ImageService())->storeUserImages(auth()->user()->username, $request->user_image);
        }

        if ($request->password){
            $password = bcrypt($request->password);
        }
        
        auth()->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'user_image' => $adminImage ?? auth()->user()->user_image,
            'password' => $password ?? auth()->user()->password
        ]);

        return redirect()->route('admin.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    // public function pdf(){
    //     $userid = 137;
    //     $data  =  DB::table('employerform')
    //         ->join('employerform_job', 'employerform.id', '=', 'employerform_job.employerform_id')
    //         ->join('employerform_labour', 'employerform.id', '=', 'employerform_labour.employerform_id')
    //         ->join('employerform_nomination', 'employerform.id', '=', 'employerform_nomination.employerform_id')
    //         ->join('employerform_sbs', 'employerform.id', '=', 'employerform_sbs.employerform_id')
    //         ->where('employerform.user_id', $userid)->select(
    //             'employerform.*',
    //             'employerform_job.*',
    //             'employerform_labour.*',
    //             'employerform_nomination.*',
    //             'employerform_sbs.*'
    //         )->first();
    //     //dd($data);
    //     // instantiate and use the dompdf class
    //     $dompdf = new Dompdf();
    //     $html = [];
    //     $table = "<table>";
    //     $table .= "<tbody>";
    //     $table .= "<tr>";
    //     foreach($data as $key => $value)   {
           
    //         $table .= '<td>'.$key.'</td>'.'<td>'.$value.'</td>';
    //     }     
    //     $table .= "</tr>";
    //     $table .= "</tbody>";
    //     $table .= "</table>";
    //     // dd($table);
    //     $dompdf->loadHtml($table);

    //     // (Optional) Setup the paper size and orientation
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the generated PDF to Browser
    //     $dompdf->stream();
    // }
}
