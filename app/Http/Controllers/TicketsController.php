<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

class TicketsController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $tickets = Ticket::latest()->paginate(10);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('tickets.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'       => 'required|image:jpeg,jpg,png|max:2048',
            'nama'        => 'required|min:5',
            'email'       => 'required|email|min:10',
            'phone'       => 'required|numeric|min:12',  // Pastikan phone memiliki panjang yang benar
            'subject'     => 'required|min:10',
            'massage'     => 'required|min:10',
            'unit'        => 'required|string|min:3'
        ]);
    
        $image = $request->file('image');
        $image->storeAs('public/tickets', $image->hashName());
    
        // Buat ticket
        Ticket::create([
            'image'    => $image->hashName(),
            'nama'     => $request->nama,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'subject'  => $request->subject,
            'massage'  => $request->massage,
            'unit'     => $request->unit
        ]);
    
        // Redirect ke halaman index
        return redirect()->route('tickets.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get tickets by ID
        $tickets = Ticket::findOrFail($id);

        //render view with 
        return view('tickets.show', compact('tickets'));
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get tickets by ID
        $tickets = Ticket::findOrFail($id);

        //render view with tickets
        return view('tickets.edit', compact('tickets'));
    }
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image'       => 'required|image:jpeg,jpg,png|max:2048',
            'nama'        => 'required|min:5',
            'email'       => 'required|email|min:10',
            'phone'       => 'required|numeric|min:12',  // Pastikan phone memiliki panjang yang benar
            'subject'     => 'required|min:10',
            'massage'     => 'required|min:10',
            'unit'        => 'required|string|min:3'
        ]);
        $tickets = Ticket::findOrFail($id);
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/tickets', $image->hashName());
            //delete old image
            Storage::delete('public/tickets/'.$tickets->image);
             //update tickets with new image
            $tickets->update([
                'image'    => $image->hashName(),
                'nama'     => $request->nama,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'subject'  => $request->subject,
                'massage'  => $request->massage,
                'unit'     => $request->unit
            ]);
    } else {
            $tickets->update([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'subject'  => $request->subject,
            'massage'  => $request->massage,
            'unit'     => $request->unit
        ]);
    }
    //redirect to index
    return redirect()->route('tickets.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get tickets by ID
        $tickets = Ticket::findOrFail($id);

        //delete image
        Storage::delete('public/tickets/'. $tickets->image);

        //delete tickets
        $tickets->delete();

        //redirect to index
        return redirect()->route('tickets.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

