<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Parkir;
use App\Models\Booking;
use Illuminate\Http\Request;
use QrCode;

class BookingController extends Controller
{
   

// buat booking
    public function createBooking(Request $request )
    {
        $request->validate([
            'lahan_terpilih' => 'required',
            'tarif' => 'required',
            'jenis_pembayaran'=> 'required',
            'status_pembayaran'=> 'required',
            'waktu_booking'=> 'required',
            'nomor_kendaraan'=> 'required',
            'kendaraan' => 'required',
            'nama_pengguna' => 'required',
        ]);
            
            $input = $request->all();
        
            Booking::create($input);
           $response = [
                'message'=>'Booking Succesfully',
                'booking' => $input,
                
                
            
            ];
            
            
            return response($response); 

        
        
    }
    // melihat riwayat booking
   public function riwayat($id){
        
        return Booking::find($id);
        
    }
// membatalkan booking
    public function cancelBooking($id)
    {
        return Booking::destroy($id);
        $response = [
			'message'=>'Booking canceled',
  
        ];
        return response($response);
    }
// accept pembyaran dengan mengupdate status pemyaran menjadi active
    public function verifikasiPembayaran(Request $request, $id)
    {


        if (Booking::where('id', $id)->exists()) {
            $booking = Booking::find($id);
    
            $booking->status_pembayaran = is_null($request->status_pembayaran) ? $booking->status_pembayaran : $booking->status_pembayaran;

            $booking->save();
    
            return response()->json([
              "message" => "records updated successfully"
             
            ], 200);
          } else {
            return response()->json([
              "message" => "Book not found"
            ], 404);
          }
    }

    public function getQR()
    {
        Booking::find($id);
       
    }
    
}



    