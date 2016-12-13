<?php
/*
* This controller is aimed to be used by administrator function.....use dashboard
* Output: time, ip
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPExcel;
use PHPExcel_IOFactory;

class AdminUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('portal.users.userProfile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function importUsers()
    {
        $inputFile = public_path('Data/cash_flow_model_20161004.xlsx');
        /**  Identify the type of $inputFileName  **/
        $inputFileType = PHPExcel_IOFactory::identify($inputFile);
        /**  Create a new Reader of the type defined in $inputFileType  **/
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        /**  Advise the Reader to load all Worksheets  **/
        $objReader->setLoadAllSheets();
        /**  Load $inputFileName to a PHPExcel Object   **/
        $objPHPExcel = $objReader->load($inputFile);
        //writing data
        $objPHPExcel->getActiveSheet()->setCellValue('B75', $webHookData['officeId'])
        //Saving the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $filename = 'file';
        $objWriter->save(str_replace(__FILE__,'./docs/'. $filename . '.xlsx',__FILE__));
        return $path = 'docs/'. $filename . '.xlsx'; //returning the file
    }
}
