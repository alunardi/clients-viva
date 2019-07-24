<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $client = new Client();

        $order = 'asc';
        $field = 'name';

        if ($request->get('order')) {
            $order = preg_replace('/[^[:alpha:]_]/', '', $request->get('order'));
        }
        if ($request->get('field')) {
            $field = preg_replace('/[^[:alpha:]_]/', '', $request->get('field'));
        }

        $clients = Client::where('status', '<>', $client::STATUS_EXCLUDED)
            ->orderBy($field, $order)
            ->paginate(20);

        $status = $client->statusArray;

        return view('client.all', ['clients' => $clients, 'status' => $status]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $client = new Client();

        $this->validate($request, [
            'name' => 'required | min:3 | max:50',
            'phone' => 'required | min:3 | max:50',
            'address' => 'required | min:3 | max:50',
            'status' => 'required | integer',
            'birth_date' => 'required | date',
        ]);

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->birth_date = $request->birth_date;
        $client->status = $request->status;

        $client->save();

        return redirect('/')->with('success', 'Cliente adicionado com sucesso.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit($id)
    {
        $client = Client::where('id', '=', $id)->get();

        if (empty($client)) {
            return "Esse cliente não existe!";
        }
        return view('client.update', ['client' => $client[0]]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required | min:3 | max:50',
            'phone' => 'required | min:3 | max:50',
            'address' => 'required | min:3 | max:50',
            'status' => 'required | integer',
            'birth_date' => 'required | date',
        ]);

        $values = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'status' => $request->status,
        ];

        Client::where('id', $id)->update($values);

        return redirect('/')->with('success', 'Cliente editado com sucesso.');
    }

    /**
     * @param $id
     */
    public function activate($id)
    {
        return $this->updateStatus($id, Client::STATUS_ACTIVE, 'ativado');
    }

    /**
     * @param $id
     */
    public function inactivate($id)
    {
        return $this->updateStatus($id, Client::STATUS_INACTIVE, 'inativado');
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        return $this->updateStatus($id, Client::STATUS_EXCLUDED, 'excluído');
    }

    /**
     * @param $id
     * @param $status
     * @param $statusString
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function updateStatus($id, $status, $statusString)
    {
        Client::where('id', $id)->update(['status' => $status]);

        return redirect('/')->with('success', 'Cliente '. $statusString .' com sucesso.');
    }

}
