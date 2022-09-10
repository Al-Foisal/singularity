<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OutletController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $outlet = Outlet::all();

        return $outlet;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'phone'     => 'required',
            'latitude'  => 'required',
            'longitude' => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'validation error']);
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/outlet/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        $outlet            = new Outlet();
        $outlet->name      = $request->name;
        $outlet->phone     = $request->phone;
        $outlet->latitude  = $request->latitude;
        $outlet->longitude = $request->longitude;
        $outlet->image     = $final_name1;
        $outlet->save();

        return response()->json(['status' => true, 'outlet' => $outlet]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $outlet = Outlet::find($id);

        return $outlet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $outlet    = Outlet::find($id);
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'phone'     => 'required',
            'latitude'  => 'required',
            'longitude' => 'required',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'validation error']);
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $image_path = public_path($outlet->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/outlet/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $outlet->image = $final_name1;
                $outlet->save();
            }

        }

        $outlet->update([
            'name'      => $request->name,
            'phone'     => $request->phone,
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return response()->json(['status' => true, 'outlet' => $outlet]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $outlet     = Outlet::find($id);
        $image_path = public_path($outlet->image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $outlet->delete();

        return response()->json(['status' => true, 'message' => 'User deleted']);
    }

}
