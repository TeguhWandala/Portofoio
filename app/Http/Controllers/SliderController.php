<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllUser()
    {
        $sliders = Slider::all();
        return view('slider', compact('slider'));
    }

    public function index(Request $request)
    {
        // Get the selected status from the request
        $status = $request->status;
    
        // Query the sliders based on the selected status
        $query = Slider::query();
    
        if ($status) {
            $query->where('status', $status);
        }
    
        // Get the filtered sliders
        $sliders = $query->get();
    
        // Get the count of reject sliders
        $rejectCount = $this->getRejectCount();

        // Get the count of accepted sliders
        $approveCountS = $this->getApproveCountS();
    
        // passing data sliders, status, and pending count to view slider.index
        return view('slider.index', compact('sliders', 'status', 'rejectCount', 'approveCountS'));
    }

    public function getRejectCount()
    {
        $rejectCount = Slider::where('approve', '0')->count();
    
        return $rejectCount;
    }

    public function getApproveCountS()
    {
        $approveCountS = Slider::where('approve', '1')->count();
    
        return $approveCountS;
    }

    public function create()
    {
        // menampilkan halaman create
        return view('slider.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5',
            'caption' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }


        // ubah nama file gambar dengan angka random
        $imageName = time().'.'.$request->image->extension(); // 1685433155.jpg

        // upload file gambar ke folder slider
        Storage::putFileAs('public/slider', $request->file('image'), $imageName);

        // insert data ke table sliders
        $slider = Slider::create([
            'title' => $request->title,
            'caption' => $request->caption,
            'image' => $imageName,
        ]);

        // alihkan halaman ke halaman slider.index
        return redirect()->route('slider.index');
    }

    public function edit(Request $request, $id)
    {
        // cari data berdasarkan id menggunakan find()
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $slider = Slider::find($id);

        // load view edit.blade.php dan passing data slider
        return view('slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        // cek jika user mengupload gambar di form
        if ($request->hasFile('image')) {
            // ambil nama file gambar lama dari database
            $old_image = Slider::find($id)->image;

            // hapus file gambar lama dari folder slider
            Storage::delete('public/slider/'.$old_image);

            // FILE BARU //
            // ubah nama file gambar baru dengan angka random
            $imageName = time().'.'.$request->image->extension();

            // upload file gambar ke folder slider
            Storage::putFileAs('public/slider', $request->file('image'), $imageName);

            // update data sliders
            Slider::where('id', $id)->update([
                'title' => $request->title,
                'caption' => $request->caption,
                'image' => $imageName,
            ]);

        } else {
            // jika user tidak mengupload gambar
            // update data sliders hnaya untuk title dan caption
            Slider::where('id', $id)->update([
                'title' => $request->title,
                'caption' => $request->caption,
            ]);
        }


        // alihkan halaman ke halaman sliders
        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        // cari data berdasarkan id menggunakan find()
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $slider = Slider::find($id);

        // hapus file gambar dari folder slider
        Storage::delete('public/slider/'.$slider->image);

        // hapus data dari table sliders
        $slider->delete();

        // alihkan halaman ke halaman sliders
        return redirect()->route('slider.index');
    }
    
    public function approve($id)
    {
        // update data sliders
        Slider::where('id', $id)->update([
            'approve' => '1',
        ]);

        // alihkan halaman ke halaman sliders
        return redirect()->back()->with('success', 'Slider berhasil diapprove');
    }
    
    public function reject($id)
    {
        // update data sliders
        Slider::where('id', $id)->update([
            'approve' => '0',
        ]);

        // alihkan halaman ke halaman sliders
        return redirect()->back()->with('success', 'Slider berhasil direject');
    }
}