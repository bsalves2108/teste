<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\EditContactRequest;
use App\Http\Requests\Contact\NewContactRequest;
use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index(): Factory|Application|View|ApplicationContract
    {
        $contacts = Contact::paginate(10);

        return view('contact.index', compact('contacts'));
    }

    public function create(): Factory|Application|View|ApplicationContract
    {
        return view('contact.form');
    }

    public function edit(Contact $contact): Factory|Application|View|ApplicationContract
    {
        return view('contact.form', compact('contact'));
    }

    public function show(Contact $contact): Factory|Application|View|ApplicationContract
    {
        return view('contact.show', compact('contact'));
    }

    public function update(EditContactRequest $request, Contact $contact): RedirectResponse
    {
        try {
            $contact->fill($request->all());
            $contact->save();

            return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar contato: ' . $e->getMessage());
        }
    }

    public function store(NewContactRequest $request): RedirectResponse
    {
        try {
            $contact = new Contact();
            $contact->fill($request->all());
            $contact->save();

            return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar contato: ' . $e->getMessage());
        }
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        try {
            $contact->delete();

            return redirect()->route('contacts.index')->with('success', 'Contato excluído com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir contato: ' . $e->getMessage());
        }
    }
}
