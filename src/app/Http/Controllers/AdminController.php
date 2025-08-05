<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificarionCodeMail;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
        public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


        public function AdminLogin(Request $request){
        $credentials = $request->only('email', 'password');

        if(Auth:: attempt($credentials)){
            $user = Auth::user();

            $verificationCode = random_int(100000, 999999);

            session(['verification_code' => $verificationCode, 'user_id' => $user->id]);

            Mail::to($user->email)->send(new VerificarionCodeMail($verificationCode));

            Auth::logout();

            return redirect()->route('custom.verification.form')->with('status', 'O email de verificação foi mandada para o seu email.');

            return redirect()->back()->withErrors(['email' => 'As credenciais fornecidas estão incorretas.']);

            
        }

    }
    public function showVerification(){
            return view('auth.verify');
        }

    public function verifyCode(Request $request){
        $request->validate(['code'=>'required|numeric']);

        if($request ->code == session('verification_code')){
            Auth::loginUsingId(session('user_id'));
            session()->forget(['verification_code', 'user_id']);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['code' => 'O código de verificação está incorreto.']);
    }


    public function AdminProfile(){
        $id =Auth:: user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile', compact('profileData'));
    }

    public function ProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $oldPhotoPath = $data->photo;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'), $filename);
            $data->photo = $filename;

            if($oldPhotoPath && $oldPhotoPath !== $filename){
                $this->deleteOldPhoto($oldPhotoPath);
            }
        }
        $data->save();

        $notification = array(
            'message' => 'Perfil atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    private function deleteOldPhoto($photoPath){
        $fullPath = public_path('upload/user_images/'.$photoPath);
        if(file_exists($fullPath)){
            unlink($fullPath);
        }
    }

    public function updatePassword(Request $request){
        $user =Auth::user();
        $request->validate([
            'old_password'=> 'required',
            'new_password'=> 'required|confirmed',

        ]);

        if(!Hash::check($request->old_password, $user->password)){
            $notification = array(
                'message' => 'A senha antiga está incorreta.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        User::whereId($user->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Senha atualizada com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->rout()->with($notification);
        Auth::logout();
    }
}