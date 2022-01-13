<?php

namespace App\Http\Controllers;

use App\Http\LogicasDelNegocio\LNDevices;
use App\Http\LogicasDelNegocio\LNNotifications;
use App\Models\Notification;
use App\User;
use DataTables,Auth;


class NotificationsController extends Controller
{

    /**
     * Show the role list with associate permissions.
     * Server side list view using yajra datatables
     */

    public function getNotificationList()
    {

        $LNTown=new LNNotifications();
        $data  = $LNTown->obtenerNotificacionesDevice();

        return Datatables::of($data)
            ->addColumn('serial', function(Notification $notification){
            if($notification->user->information->device->serial != null){
                return $notification->user->information->device->serial;
            }else{
                return $notification->user->information->device->serial;
            }
        })
            ->addColumn('action', function($data){

                if (auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin'){
                    return '<div class="table-actions">

                            </div>';
                }else{
                    return '';
                }
            })
            ->rawColumns(['action'])->toJson();
    }

}
