<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content;
use App\Models\Owner\KatalogMakeup;
use App\Models\User;
use Illuminate\Http\Request;

class MakeupContentController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', 2)->get();
        return view('admin.content.content_makeup', compact('user'));
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $name = $user->name;
        $makeup = KatalogMakeup::where('user_id', $id)->get();
        return view('admin.content.view_makeup', compact('makeup', 'name'));
    }

    public function changeStatus(Request $request)
    {
        $isChecked = $request->input('isChecked');
        $productId = $request->input('productId');

        // Menggunakan model ManagementContent untuk memperbarui status
        $produk = Content::find($productId);
        if ($produk) {
            $produk->active = $isChecked ? 1 : 0;
            $produk->save();
        }

        // Memberikan tanggapan yang sesuai
        return response()->json(['status' => 'success']);
    }
}
