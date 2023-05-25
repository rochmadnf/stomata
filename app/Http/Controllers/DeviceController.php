<?php

namespace App\Http\Controllers;

use App\Events\UpdateDeviceDataEvent;
use App\Http\Resources\DeviceDataResource;
use App\Models\{Device, DeviceData};
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        $this->isValidRequest($request->all(), [
            "device_token" => ['required', 'string', 'size:21', 'exists:devices,token'],
            "filled"       => ['required', 'integer', 'min:0', 'max:100'],
            "unfilled"     => ['required', 'integer', 'min:0', 'max:100'],
        ], 'api');

        $device = Device::with('user', 'deviceData')->where('token', $request->device_token)->first();

        $device->deviceData()->create(["filled" => $request->filled, "unfilled" => $request->unfilled]);

        // send broadcast with pusher
        broadcast(new UpdateDeviceDataEvent("update device data"));

        return response()->json(["status" => "success", "message" => "Data berhasil disimpan."], 200);
    }

    public function show($id)
    {
        $items = DeviceData::where('device_id', $id)->orderBy('created_at', 'DESC')->get();
        return response()->json(DeviceDataResource::collection($items));
    }
}
