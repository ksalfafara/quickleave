<?php namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Auth;

trait AuthenticatesAndRegistersUsers {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * The registrar implementation.
	 *
	 * @var Registrar
	 */
	protected $registrar;

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{
		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		/*$team = Team::where('id', $request->team_id)->get();
		if ($request->team_id == $team->id)
		{
			return 'The team name does not match the team code.';
		}*/

		$this->auth->login($this->registrar->create($request->all()));

		return redirect($this->redirectPath());
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'username' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('username', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			//return redirect('user');
			return redirect($this->redirectPath());
		}

		return redirect($this->loginPath())
					->withInput($request->only('username', 'remember'))
					->withErrors([
						'username' => $this->getFailedLoginMessage(),
					]);
	}

	/**
	 * Get the failed login message.
	 *
	 * @return string
	 */
	protected function getFailedLoginMessage()
	{
		return 'These credentials do not match our records.';
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}

		if((Auth::user()->role) == 'admin')
			return property_exists($this, 'redirectTo') ? $this->redirectTo : 'admin';
		elseif((Auth::user()->role) == 'manager')
			return property_exists($this, 'redirectTo') ? $this->redirectTo : 'manager';
		else
			return property_exists($this, 'redirectTo') ? $this->redirectTo : 'user';
	}

	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
	}

}