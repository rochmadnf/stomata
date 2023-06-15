<?php

namespace App\Http\Controllers;

use App\Events\{UpdateDeviceDataEvent, UpdateSingleDeviceDataEvent};
use App\Http\Resources\DeviceDataResource;
use App\Models\{Device, DeviceData};
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        $this->isValidRequest($request->all(), [
            "device_token" => ['required', 'string', 'size:21', 'exists:devices,token'],
            "filled"       => ['required', 'min:0', 'max:100'],
            "unfilled"     => ['required', 'min:0', 'max:100'],
        ], 'api');

        $device = Device::with('user', 'deviceData')->where('token', $request->device_token)->first();

        $attr = $device->deviceData()->create(["filled" => $request->filled, "unfilled" => $request->unfilled]);
        // send broadcast with pusher
        broadcast(new UpdateSingleDeviceDataEvent($device->user_id, [
            $attr->created_at->setTimezone('Asia/Makassar')->translatedFormat('l, d F Y H:i:s'),
            $attr->filled,
            $attr->unfilled
        ]));
        broadcast(new UpdateDeviceDataEvent("update device data"));

        return response()->json(["status" => "success", "message" => "Data berhasil disimpan."], 200);
    }

    public function show($id)
    {
        $items = DeviceData::where('device_id', $id)->orderBy('created_at', 'DESC')->get();
        return response()->json(DeviceDataResource::collection($items));
    }
}
