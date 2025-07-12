<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



namespace App\Http\Controllers;
use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
 
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $userId = $request->input('user_id');
    
        Message::create([
            'user_id' => $userId,
            'message' => $message,
        ]);
    
        event(new MessageSent($message, $userId));
    
        // Redirect back with a success message
        return redirect()->back()->with('status', 'Message sent!');
    }

    public function updateProfile(Request $request)
    {
        $userId = session('LoggedUserInfo');
        $user = User::find($userId);

        if (!$user) {
            return redirect('user/login')->with('fail', 'You must be logged in to update the profile');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'bio' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->bio = $request->bio;

        if ($request->hasFile('picture')) {
            if ($user->picture) {
                Storage::disk('public')->delete($user->picture);
            }
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile_pictures', $filename, 'public');
            $user->picture = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
  
 

    
    public function post() {

        $users = User::all();
        return view('user.post', [
            'users' => $users 
        ]);
    }
    
    public function register() {
        return view("user.register");
    }
    public function login() {
        return view("user.login");
    }
    
    public function edit()
    {
        
        $userId = session('LoggedUserInfo');
        $LoggedUserInfo = User::find($userId);
    
        if (!$LoggedUserInfo) {
            return redirect('user/login')->with('fail', 'You must be logged in to access the dashboard');
        }
     
        $messageCount = Message::where('user_id', $userId)
        ->count();

    // Fetch the messages
    $messages = Message::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('user.profileedit', [
        'LoggedUserInfo' => $LoggedUserInfo,
        'messageCount' => $messageCount,
        'messages' => $messages
    ]);
    }
    
    public function profile()
    {
        
        $userId = session('LoggedUserInfo');
        $LoggedUserInfo = User::find($userId);
    
        if (!$LoggedUserInfo) {
            return redirect('user/login')->with('fail', 'You must be logged in to access the dashboard');
        }
     
        $messageCount = Message::where('user_id', $userId)
        ->count();

    // Fetch the messages
    $messages = Message::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('user.profileview', [
        'LoggedUserInfo' => $LoggedUserInfo,
        'messageCount' => $messageCount,
        'messages' => $messages
    ]);
    }
    
    
    public function dashboard()
    {
        $userId = session('LoggedUserInfo');
    
        // Check if the session has the correct user ID
        if (!$userId) {
            return redirect('user/login')->with('fail', 'You must be logged in to access the dashboard');
        }
    
        $LoggedUserInfo = User::find($userId);
    
        // Fetch the count of messages for the user
        $messageCount = Message::where('user_id', $userId)->count();
    
        // Fetch the messages, ensuring they are ordered by the newest first
        $messages = Message::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('user.dashboard', [
            'LoggedUserInfo' => $LoggedUserInfo,
            'messageCount' => $messageCount,
            'messages' => $messages
        ]);
    }
    
    
    
    public function check(Request $request)
{
     $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:5|max:12'
    ]);

     $userInfo = User::where('email', $request->email)->first();

     if (!$userInfo) {
        return back()->withInput()->withErrors(['email' => 'Email not found']);
    }
      if ($userInfo->status === 'inactive') {
         return back()->withInput()->withErrors(['status' => 'Your account is inactive']);
        }

     if (!Hash::check($request->password, $userInfo->password)) {
        return back()->withInput()->withErrors(['password' => 'Incorrect password']);
    }

     session([
        'LoggedUserInfo' => $userInfo->id,
        'LoggedUserName' => $userInfo->name,  
    ]);
     return redirect()->route('user.dashboard');
}

    

    

    public function logout()
    {
         if (session()->has('LoggedUserInfo')) {
             session()->forget('LoggedUserInfo');
        }
        session()->flush();

         return redirect()->route('user.dashboard');
    }
    
 


    public function save(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|regex:/^\S*$/',
    ], [
        'email.unique' => 'This email is already registered.',
        'password.min' => 'Password must be at least 8 characters long.',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('user.login')->with('success', 'User created successfully!');
}

     
  
}





