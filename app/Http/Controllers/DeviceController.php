<?php

namespace App\Http\Controllers;

use App\Events\UpdateDeviceDataEvent;
use App\Models\Device;
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
}
