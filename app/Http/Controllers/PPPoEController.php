<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RouterosAPI;

class PPPoEController extends Controller
{
    public function index()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $password = session()->get('password');
        $API = new RouterosAPI();
        $API->debug('false');
        
        if ($API->connect($ip, $user, $password)) {
            $secret = $API->comm('/ppp/secret/print');
            $profile = $API->comm('/ppp/profile/print');
            // $routermodel = $API->comm('/system/routerboard/print');
        } else {
            return 'Koneksi Gagal';
        }

        $data = [
            'totalsecret' => count($secret),
            'secret' => $secret,
            'profile' => $profile,
            // 'routermodel' => $routermodel[0]['model'],
        ];

        // dd($data);

        return view('pppoe.secret', $data);
    }

    public function add(Request $request)
	{
        $request->validate([
            'user' => 'required',
            'password' => 'required',
        ]);

		$ip = session()->get('ip');
		$user = session()->get('user');
		$password = session()->get('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			$API->comm('/ppp/secret/add', array(
				'name' => $request['user'],
				'password' => $request['password'],
				'service' => $request['service'] == '' ? 'any' : $request['service'],
				'profile' => $request['profile'] == '' ? 'default' : $request['profile'],
				'local-address' => $request['localaddress'] == '' ? '0.0.0.0' : $request['localaddress'],
				'remote-address' => $request['remoteaddress'] == '' ? '0.0.0.0' : $request['remoteaddress'],
				'comment' => $request['comment'] == '' ? '' : $request['comment'],
            ));

			// dd($request->all());

		} else {

			return "Koneksi Gagal";
		}
		toast('Data PPPoE Berhasil Ditambah','success');

        return redirect()->route('pppoe.secret');
	}

	public function edit($id)
	{
		$ip = session()->get('ip');
		$user = session()->get('user');
		$password = session()->get('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			$getuser = $API->comm('/ppp/secret/print', [
				"?.id" => '*' . $id,
			]);

			$secret = $API->comm('/ppp/secret/print');
			$profile = $API->comm('/ppp/profile/print');

			$data = [
				'user' => $getuser[0],
				'secret' => $secret,
				'profile' => $profile,
			];

			// dd($data);

			return view('pppoe.edit', $data);
		} else {

			return 'Koneksi Gagal';
		}
	}

	public function update(Request $request)
	{
		// dd($request->all());
		
		$request->validate([
            'user' => 'required',
            'password' => 'required',
        ]);

		$ip = session()->get('ip');
		$user = session()->get('user');
		$password = session()->get('password');
		$API = new RouterosAPI();
		$API->debug = false;

		$API->connect($ip, $user, $password);

		$API->comm("/ppp/secret/set", [
			".id" => $request['id'],
			'name' => $request['user'] == '' ? '' : $request['user'],
			'password' => $request['password'] == '' ? '' : $request['password'],
			'service' => $request['service'] == '' ? '' : $request['service'],
			'profile' => $request['profile'] == '' ? '' : $request['profile'],
			'disabled' => $request['disabled'] == '' ? '' : $request['disabled'],
			'local-address' => $request['localaddress'] == '' ? '' : $request['localaddress'],
			'remote-address' => $request['remoteaddress'] == '' ? '' : $request['remoteaddress'],
			'comment' => $request['comment'] == '' ? '' : $request['comment'],
		]);

		toast('Data PPPoE Berhasil Diubah','success');
		
		return redirect()->route('pppoe.secret');
	}

	public function delete($id)
	{
		$ip = session()->get('ip');
		$user = session()->get('user');
		$password = session()->get('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			$API->comm('/ppp/secret/remove', [
				'.id' => '*' . $id
			],);

			toast('Data PPPoE Berhasil Dihapus','success');

			return redirect('pppoe/secret');
		} else {

			return redirect('failed');
		}
	}



	public function active()
	{
		$ip = session()->get('ip');
		$user = session()->get('user');
		$password = session()->get('password');
		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect($ip, $user, $password)) {

			$secretactive = $API->comm('/ppp/active/print');

			$data = [
				'totalsecretactive' => count($secretactive),
				'active' => $secretactive,
			];

			return view('pppoe.active', $data);
		} else {

			return redirect('failed');
		}
	}
}
