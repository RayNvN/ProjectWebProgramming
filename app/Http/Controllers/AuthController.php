namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration; // pastikan modelnya sudah benar
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login'); // pastikan file login.blade.php ada di resources/views
    }

    public function signup()
    {
        return view('signup'); // pastikan file signup.blade.php ada di resources/views
    }

    public function signupStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'password' => 'required|string|min:8',
        ]);

        Registration::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/Login')->with('success', 'Registration successful. Please log in.');
    }

    public function loginStore(Request $request)
    {
        // Handle login logic
    }
}
