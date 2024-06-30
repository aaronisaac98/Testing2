<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guest;
use App\Models\Event;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use BaconQrCode\Writer\PngWriter;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class  QRCodeController extends Controller
{

    public function QRcode($id)
    {
        // Fetch guest information 
        $guest = Guest::findOrFail($id);

        // Generate QR code content 
        $qrCodeContent = url('/checkin/' . $guest->id);

        // Generate QR code image
        $qrCode = QrCode::size(200)->generate($qrCodeContent);

        // Pass the QR code image and guest data to the view
        return view('guest.Attendance.qrcode', compact('guest', 'qrCode'));
    }

    public function checkin($id)
    {
        
        $guest = Guest::findOrFail($id);

        if ($guest->checkedin !== null) {
            return redirect("/Thankyouform");
        }
        else {
            return view('guest.Attendance.checkin', compact('guest'));
        }

    }

    public function checkinupdate(Request $request, $id)
    {
        
        $guest = Guest::findOrFail($id);

        $guest = Guest::find($id);

        $attributes = $request->validate([

            'checkedin' => [],
            
        ]);

        

    
        if ($guest->checkin !== null) {
            return redirect("/Thankyouform");
        }
        else{

            $attributes['checkedin'] = $attributes['checkedin'] ?? 'on';
               
        // Validate request data
            $guest->fill($attributes); 
            $guest->save();
    
    
            return redirect('/Thankyouform')->with('success', 'Information updated successfully.');

        }
    
    }

 
}