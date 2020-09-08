<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Vendor;
use App\Address;
use App\VendorAreas;
use App\Area;
use App\Beneficiary;
use App\Section;
use App\Transaction;
use Illuminate\Foundation\Console\VendorPublishCommand;
use Illuminate\Http\Request;
use Illuminate\Redis\Database;
use Illuminate\Support\Facades\Auth;
use Datatables;
use function Sodium\compare;
use Symfony\Component\HttpKernel\DependencyInjection\AddClassesToCachePass;
use DOM;
use QrCode;
//use Arabic;
use App\Http\Controllers\Uni;
use Image;
use App\I18N\I18N_Arabic;
use App\I18N\ArabicException;

class AdminController extends Controller
{

    public function getDashboard(){
        if(Auth::user()->type == 1)
             return $this->get_view_one();
        else
             return $this->get_view_two();
    }

    public function getUserLogin()
    {

//        header("Content-type: image/png");
//// Create the image
//        $im = @imagecreatefrompng(public_path().'/images/card.png');
//// Create some colors
//        $black = imagecolorallocate($im, 0, 0, 0);
//        $blue  = imagecolorallocate($im, 0, 0, 255);
//
//// Replace by your own font
//// full path and name
////$local = $_SERVER['DOCUMENT_ROOT'];
////$pos   = strrpos($script, '/');
////$path  = substr($script, 0, $pos);
////        $font  = $_SERVER['DOCUMENT_ROOT'].'/card/arial.ttf';
////        $font  = $_SERVER['DOCUMENT_ROOT'].'/card/arial.ttf';
//        $font =public_path().'/assets/arial.ttf';
//
//// UTF-8 charset
////$text = 'بسم الله الرحمن الرحيم';
////
////imagettftext($im, 20, 0, 10,
////    50, $blue, $font, 'UTF-8:');
////
////imagettftext($im, 20, 0, 200,
////    50, $black, $font, $text);
//
////        require('./ArabicText/I18N/Arabic.php');
//        $Arabic = new I18N_Arabic('Glyphs');
//
//        $text = 'خالد سامي محمد صباح';
//        $text = $Arabic->utf8Glyphs($text);
//
//        imagettftext($im, 20, 0, 50,
//            200, $black, $font, $text);
//
//// Using imagepng() results in clearer
//// text compared with imagejpeg()
//        imagepng($im);
//        imagedestroy($im);
        return view('water.login');
    }

    public function getT1()
    {

        return view('water.t1');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('user-login');
    }


    public function getUserCreatePost(Request $request)
    {
        $admin= new Admin();

        $admin->name = $request['username'];
        $admin->password = bcrypt($request['password']);

        $admin->save();
        return redirect()->back();

    }


    public function getUserPostLogin(Request $request)
    {

    $this->validate($request,[
        'username' => 'required',
        'password' => 'required',
    ]);

        if (!Auth::attempt(['name' => $request['username'], 'password' => $request['password']])) {
            return redirect()->route('user-login');
        }


        return redirect()->route('dashboard');
    }

    public function getData_table_one()
    {


   $sections = Section::with('area_sec')->withCount('beneficiaries')->get();

        return Datatables::of($sections)
            ->make(true);

    }

    public function getEditSection($id, $section){

         $sec = Section::pluck('sec_code','id')->all();

        return view('water.edit-section',[
            'sec'=>$sec,
            'section' =>$section,
            'ben_id'=>$id]);

    }

    public function getPostSectionUpdate(Request $request){


        if ($request->input('sec_id') ) {
            $beneficiary = Beneficiary::with('section')
                ->where('ben_id','=',$request->input('ben_id'));

            $beneficiary->update(['ben_sec'=>$request->input('sec_id')]);

        }

        return redirect()->back();

    }

    public function getData_table_two()
    {
        $beneficiary = Beneficiary::where('enabled','<>',0)->with('section')
            ->select('ben_no','ben_name', 'ben_id', 'ben_sec','mobile');

        $adoption = Beneficiary::where('enabled',3)->count();

        if(!$adoption || Auth::user()->type == 1){
            return Datatables::of($beneficiary)
                ->addColumn('action', function ($beneficiary) {
                    return '<a  data-val="'.$beneficiary->ben_no.'" name="editBeneficiary" data-toggle="modal" data-target="#editBeneficiaryModal" href="" class="btn btn-xs btn-primary" ><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a  data-val="'.$beneficiary->ben_no.'" data-toggle="modal" data-target="#delete-section" href="" class="btn btn-xs btn-danger deleteBeneficiary" ><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>';
                })
                ->make(true);
        }

        return Datatables::of($beneficiary)
            ->addColumn('action', function () {
                return '';
            })
            ->make(true);

    }

    public function getData_table_three()
    {
        $transactions = Transaction::select('ben_no', 'ben_name',
            'ben_id', 'area_name', 'trans_water_amount', 'trans_date');

        return Datatables::of($transactions)->make(true);
    }


    public function get_view_one()
    {

        $beneficiary_count = Beneficiary::count();
        $area_count = Area::count();

        return view('water.view-one', [
            'beneficiary_count' => $beneficiary_count,
            'area_count' => $area_count]);
    }


    public function get_view_two()
    {
        $address = Address::get();
        $adoption = Beneficiary::where('enabled',3)->count();
        $beneficiaries = Beneficiary::where('enabled','<>',0)->get();
        return view('water.view-two',compact('address','adoption','beneficiaries'));
    }


    public function get_view_three()
    {
        return view('water.view-three');
    }

    public function get_view_four()
    {
        return view('water.view-four');
    }

    public function get_vendors_view(){
//        $vendors = Vendor::get(['ven_no as no','ven_name as name', 'ven_email as email', 'ven_phone as phone']);
        $areas = Area::get();
        return view('water.vendors', compact('areas'));
    }

    public function getAllVendors(){
        $vendors = Vendor::where('enabled', 1)->get(['ven_no as no','ven_name as name', 'ven_email as email', 'ven_phone as phone']);
        return Datatables::of($vendors)
            ->addColumn('action', function ($vendors) {
                return '<input class="editName hidden" value="'.$vendors->name.'"><input class="editEmail hidden" value="'.$vendors->email.'"><input class="editMobile hidden" value="'.$vendors->phone.'">
                    <a class="btn btn-xs btn-primary editVendor" data-val="'.$vendors->no.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-xs btn-danger deleteVendor" data-val="'.$vendors->no.'"><i class="glyphicon glyphicon-remove-circle"></i> Delete</a>';
            })
            ->make(true);
    }

    public function storeNewVendor(Request $request){
//        $this->validate($request, [
//            'name' => 'required',
//            'email' => 'required|unique:vendors,ven_email',
//            'mobile' => 'required|unique:vendors,ven_mobile',
//        ]);

        $id = Vendor::insertGetId([
            'ven_name' => $request->input('name'),
            'ven_email' => $request->input('email'),
            'ven_phone' => $request->input('mobile')
        ]);

        foreach ($request->input('areas') as $area){
            VendorAreas::create([
                'vendor_id' => $id,
                'area_id' => $area
            ]);
        }

        return back();

    }

    public function getVendorAreas($id){
        $areas = Vendor::where('ven_no',$id)->first()->areas;
        return response()->json(['status' => 1,'areas' => $areas]);
    }

    public function updateVendorInfo(Request $request){
        $areas = $request->input('eareas');
        $vid = $request->input('vd');
        Vendor::where('ven_no',$vid)->update([
            'ven_name' => $request->input('ename'),
            'ven_email' => $request->input('eemail'),
            'ven_phone' => $request->input('emobile')
        ]);
        foreach ($areas as $area){
            VendorAreas::where('vendor_id',$vid)->whereNotIn('area_id',$areas)->delete();
            VendorAreas::updateOrCreate(
                ['vendor_id' => $vid, 'area_id' => $area]
            );
        }
        return back();
    }

    public function deleteVendor($id){
        Vendor::where('ven_no',$id)->update([
            'enabled' => 0
        ]);
        return response()->json(['status' => 1]);
    }

    public function getBeneficiaryInfo($id){
        $beneficiary = Beneficiary::where('ben_no',$id)->first();
        $seq = [];
        $seq[] = $beneficiary->section->id;
        $seq[] = $beneficiary->section->area_sec->id;
        $seq[] = $beneficiary->section->area_sec->address_area->id;
        return response()->json(['status' => 1,'beneficiary' => $beneficiary,'seq' => array_reverse($seq)]);
    }

    public function updateBeneficiaryInfo(Request $request){
            $check = Beneficiary::where([
                ['ben_id','=',$request->input('id')],
                ['ben_no','<>',$request->input('vd')]
            ])->count();
            if($check)
                return back()->with(['error_msg' => 'Beneficiary identity number already exist !']);
        Beneficiary::where('ben_no',$request->input('vd'))->update([
            'ben_id' => $request->input('id'),
            'ben_name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'ben_sec' => !empty($request->input('section')) ? $request->input('section') : null
        ]);
        return back();
    }

    public function deleteBeneficiary($id){
        Beneficiary::where('ben_no',$id)->update([
            'enabled' => 0
        ]);
        return response()->json(['status' => 1]);
    }

    public function getAddressAreas($id){
        $areas = Area::where('address_id',$id)->get();
        return response()->json(['status' => 1, 'areas' => $areas]);
    }

    public function getAreaSections($id){
        $sections = Section::where('area',$id)->get();
        return response()->json(['status' => 1, 'sections' => $sections]);
    }

    public function storeBeneficiaryInfo(Request $request){
        $check = Beneficiary::where([
            ['ben_id','=',$request->input('id')],
        ])->count();
        if($check)
            return back()->with(['error_msg' => 'Beneficiary identity number already exist !']);

        Beneficiary::create([
            'ben_id' => $request->input('id'),
            'ben_name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'ben_sec' => !empty($request->input('section')) ? $request->input('section') : null,
            'ben_add' => 0
        ]);
        return back();
    }

    public function get_officers_view(){
        return view('water.fieldOfficer');
    }

    public function storeNewOfficer(Request $request){
        $check = Admin::where('name',$request->input('name'))->count();
        if($check)
            return back()->with(['error_msg' => 'Username already exist !']);

        $admin= new Admin();

        $admin->name = $request['name'];
        $admin->password = bcrypt($request['password']);
        $admin->type = 2;

        $admin->save();

        return redirect()->back();

    }

    public function getAllOfficers(){
        $officer = Admin::where([
            'type' => 2,
            'enabled' => 1
        ])->get(['name','type','created_at','id']);
        return Datatables::of($officer)->make(true);
    }

    public function updateOfficerInfo(Request $request){
        $id = $request->input('od');
        $check = Admin::where([
            ['name','=',$request->input('name')],
            ['id','<>',$id]
        ])->count();
        if($check)
            return back()->with(['error_msg' => 'Username already exist !']);
        $admin = Admin::where('id',$id)->first();
        $admin->name = $request->input('name');
        if($request->input('password'))
            $admin->password = bcrypt($request->input('password'));
        $admin->save();
        return redirect()->back();
    }

    public function deleteOfficer($id){
        Admin::where('id',$id)->update([
            'enabled' => 0
        ]);
        return response()->json(['status' => 1]);
    }

    public function adoptionBeneficiary(){
        Beneficiary::where('enabled','<>',0)->update([
            'enabled' => 3
        ]);
        return response()->json(['status' => 1]);
    }

    public function get_addresses_view(){
        return view('water.address');
    }

    public function getAllAddresses(){
        $address = Address::where('enabled','<>',0)->get();
        return Datatables::of($address)->make(true);
    }

    public function storeNewAddress(Request $request){
         Address::updateOrCreate(
            ['governorate' => $request->input('governorate'), 'city' => $request->input('city'), 'locality' => $request->input('locality')],
            ['enabled' => 1]
        );
         return redirect()->back();
    }

    public function updateAddressInfo(Request $request){
        $check = Address::where([
            ['id', '<>', $request->input('ad')],
            ['governorate', '=', $request->input('egovernorate')],
            ['city','=', $request->input('ecity')],
            ['locality','=', $request->input('elocality')]
        ])->count();
        if($check)
            return back()->with(['error_msg' => 'Address already exist']);
        Address::where('id',$request->input('ad'))->update(
            ['governorate' => $request->input('egovernorate'), 'city' => $request->input('ecity'), 'locality' => $request->input('elocality')]
        );
        return redirect()->back();
    }

    public function deleteAddress($id){
        Address::where('id',$id)->update([
            'enabled' => 0
        ]);
        return response()->json(['status' => 1]);
    }

    public function get_areas_view(){
        $addresses = Address::where('enabled','<>',0)->get();
        return view('water.area',compact('addresses'));
    }

    public function getAllAreas(){
        $areas = Area::where('enabled','<>',0)->with(['address_area'])->get();
        return Datatables::of($areas)->make(true);
    }

    public function getAreaAddress($id){
        if($id == 0){
            $addresses = Address::where('enabled','<>',0)->get();
        }
        else{
            $areaAddress = Area::where('id',$id)->first();
            $addresses = Address::where('enabled','<>',0)->orWhere('id',$areaAddress->address_id)->get();
        }
        return response()->json(['status' => 1, 'addresses' => $addresses]);
    }

    public function storeNewArea(Request $request){
        Area::updateOrCreate(
            ['area_name' => $request->input('area_name'),'address_id' => $request->input('addresses')],
            ['enabled' => 1]
        );
        return redirect()->back();
    }

    public function updateAreaInfo(Request $request){
        $check = Area::where([
            ['id', '<>', $request->input('ad')],
            ['area_name', '=', $request->input('e_area_name')],
            ['address_id','=', $request->input('e_addresses')]
        ])->count();
        if($check)
            return back()->with(['error_msg' => 'Area already exist']);
        Area::where('id',$request->input('ad'))->update(
            ['area_name' => $request->input('e_area_name'), 'address_id' => $request->input('e_addresses')]
        );
        return redirect()->back();
    }

    public function deleteArea($id){
        Area::where('id',$id)->update([
            'enabled' => 0
        ]);
        return response()->json(['status' => 1]);
    }

    public function get_sections_view(){
        return view('water.section');
    }

    public function getAllSections(){
        $sections = Section::where('enabled','<>',0)->with(['area_sec'])->get();
        return Datatables::of($sections)->make(true);
    }

    public function getSectionArea($id){
        if($id == 0){
            $areas = Area::where('enabled','<>',0)->get();
        }
        else{
            $sectionArea = Section::where('id',$id)->first();
            $areas = Area::where('enabled','<>',0)->orWhere('id',$sectionArea->area)->get();
        }
        return response()->json(['status' => 1, 'areas' => $areas]);
    }

    public function storeNewSection(Request $request){
        $check = Section::where('sec_code',$request->input('section_code'))->count();
        if($check)
            return back()->with(['error_msg' => 'Section Code already exist']);

        Section::create(
            [
                'sec_code' => $request->input('section_code'), 'area' => $request->input('areas'), 'enabled' => 1
            ]
        );
        return redirect()->back();
    }

    public function updateSectionInfo(Request $request){
        $check = Section::where([
            ['sec_code','=',$request->input('e_section_code')],
            ['id','<>',$request->input('sd')]
        ])->count();
        if($check)
            return back()->with(['error_msg' => 'Section Code already exist']);
        Section::where('id',$request->input('sd'))->update([
            'sec_code' => $request->input('e_section_code'),
            'area' => $request->input('e_areas')
        ]);
        return redirect()->back();
    }

    public function deleteSection($id){
        Section::where('id',$id)->update([
            'enabled' => 0
        ]);
        return response()->json(['status' => 1]);
    }

    public function get_cards_view(){
        return view('water.beneficiaryCard');
    }

    public function image(){
//    return view('water.tryPDF');
                $pdf = DOM::loadView('water.cardsPDF');
        return $pdf->download('invoice.pdf');
    }

    public function exportCards(){
//        $pdf = DOM::loadView('water.cardsPDF');
//        return $pdf->download('invoice.pdf');
//Set the Content Type
//        dd(__DIR__);
        header('Content-type: image/png; charset=utf8');
//        header('Content-type: image/png; charset=utf8');
//
//        $img = Image::make(asset('/images/card.png'));
//        $img->text(trans('lang.name'), 120, 200, function($font) {
//            $font->file($_SERVER['DOCUMENT_ROOT'].'/oxfam/assets/trado.ttf');
//            $font->size(28);
//        });
//        $img->save($_SERVER['DOCUMENT_ROOT'].'/oxfam/images/cards/cards15.png');
//
//        // Create Image From Existing File
//        $jpg_image = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'].'/oxfam/images/cards/cards15.png');
//        imagepng($jpg_image);
        // Create Image From Existing File
        $jpg_image = imagecreatefrompng(asset('/images/card.png'));

        // Allocate A Color For The Text
        $white = imagecolorallocate($jpg_image, 0, 0, 0);

        // Set Path to Font File
        putenv('GDFONTPATH=' . realpath('.') . '/assets/');
//        $font_path = 'DroidKufi-Regular';
        $font_path = 'trado';

        // Set Text to Be Printed On Image
        $text = "";

        // Print Text On Image

//        require ($_SERVER['DOCUMENT_ROOT'].'/oxfam/assets/I18N/Arabic.php');
//        $Arabic = new I18N_Arabic('Glyphs');
////        $font = './DroidNaskh-Bold.ttf';
//        $text = $Arabic->utf8Glyphs('لغةٌ عربيّة');

        $text = trans('lang.name');

//        require '../../../../oxfam/I18N/Arabic.php';
//        $Arabic = new I18N_Arabic('Glyphs');
//        $text = $Arabic->utf8Glyphs($text);
//        $text = strrev($text);
//        $text = $this->win2uni($text);
//        $text = $this->win2uni($text);
//        $text = mb_convert_encoding($text, 'HTML-ENTITIES',"UTF-8");
//        $text = html_entity_decode($text,ENT_NOQUOTES, "ISO-8859-1");
//        $text = html_entity_decode($text,ENT_NOQUOTES, "ISO-8859-1");
        imagettftext($jpg_image, 12, 0, 50, 196, $white, $font_path, $text);
        imagettftext($jpg_image, 12, 0, 50, 235, $white, $font_path, '400653210');
        imagettftext($jpg_image, 12, 0, 50, 273, $white, $font_path, '500');
        imagettftext($jpg_image, 12, 0, 50, 310, $white, $font_path, 'Senaaa');
        imagettftext($jpg_image, 12, 0, 50, 347, $white, $font_path, 'SEN');
        $imageName = time();
        QrCode::format('png')->backgroundColor(222, 222, 246)->generate('Make me into a QrCode!', $_SERVER['DOCUMENT_ROOT'].'/oxfam/images/qrcode/'.$imageName.'.png');
        $src = imagecreatefrompng(asset('/images/qrcode/'.$imageName.'.png'));
        $thumb = imagecreatetruecolor(100, 100);

        imagecopyresized($thumb, $src, 0, 0, 0, 0, 320, 300, 100, 100);
        imagecopymerge($jpg_image, $thumb, 510, 200, 0, 0, 100, 99, 75);
        $image = imagecreatetruecolor(700, 450);
        imagecopy($image, $jpg_image, 0 ,0, 0,0, 700, 450);
        imagepng($image, $_SERVER['DOCUMENT_ROOT'].'/oxfam/images/cards/'.time().'.png');

        // Send Image to Browser
        imagepng($jpg_image);
        // Clear Memory
        imagedestroy($jpg_image);
    }

    function win2uni($s)
    {
        $s = convert_cyr_string($s,'w','i'); //  win1251 -> iso8859-5
        //  iso8859-5 -> unicode:
        for ($result='', $i=0; $i<strlen($s); $i++) {
            $charcode = ord($s[$i]);
            $result .= ($charcode>175)?"&#".(1040+($charcode-176)).";":$s[$i];
        }
        return $result;
    }

    function utf8_strrev($str){
        preg_match_all('/./us', $str, $ar);
        return join('',array_reverse($ar[0]));
    }

}
