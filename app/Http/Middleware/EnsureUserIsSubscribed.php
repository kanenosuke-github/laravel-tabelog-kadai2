// app/Http/Middleware/EnsureUserIsSubscribed.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 有料会員であるかどうかの確認
        if (Auth::check() && Auth::user()->is_subscribed) {
            return $next($request);
        }

        return redirect('/')->with('error', 'You must be a subscribed user to access this page.');
    }
}
