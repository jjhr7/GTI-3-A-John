<?php

namespace App\Http\Controllers;

use App\Http\LogicasDelNegocio\LNDevices;
use App\Models\Device;
use Illuminate\Http\Request;
use DataTables,Auth;

class DeviceController
{
    /**
     * Show the device page
     *
     */
    public function index()
    {
        try{
            $devices = Device::pluck('serial','id');
            return view('devices.devices', compact('devices'));
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }

    /**
     * Show the device list with associate permissions.
     * Server side list view using yajra datatables
     */




    public function getDeviceList(Request $request)
    {

        $data  = Device::get();
        return Datatables::of($data)
            ->addColumn('action', function($data){
                if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                    return '<div class="table-actions">
                                <a href="'.url('devices/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="'.url('devices/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }else{
                    return '';
                }
            })
            ->rawColumns(['action'])->toJson();

    }

    /**
     * Store new devices with assigned permission
     * Associate permissions will be stored in table
     */

    public function create(Request $request)
    {
        $LNPermission = new LNDevices();

        for ($i =0;$i < $request->name; $i++){
            $permisoCreado=$LNPermission->guardarDispositivo($request);
        }

        if ($request->name>0){
            if($permisoCreado[0]==1){

                return redirect('devices')->with('success', 'Devices created succesfully!');

            }else{
                return redirect('devices')->with('error', 'Failed to create devices! Try again.');

            }
        }else{
            return redirect('devices/createForm')->with('error', 'Failed to create permission! Try again.');

        }

    }

    public function update(Request $request)
    {


        try{

            $lnPermission = new LNDevices();
            $update = $lnPermission->actualizarDatosDevice($request->id,$request);

            return redirect('device.devices')->with('success', 'Permission updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }

    public function edit($id)
    {

        try {

            $permission = Device::find($id);
            $namePermission = $permission->name;

            if ($permission) {
                return view('permisos.edit-permission', compact('permission'));
            } else {
                return redirect('404');
            }

        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }


    public function delete($id)
    {
        $device = Device::find($id);
        if($device){
            $delete = $device->delete();

            return redirect('permission')->with('success', 'Device deleted!');
        }else{
            return redirect('404');
        }
    }


    public function createForm(){
        // $LNPermission=new LNPermission();
        // $permissions=$LNPermission->obtenerTodosLosPermisos();
        return view('devices.create-device');
    }

    public function show($id){

        return view('devices.create-device');
    }
}
