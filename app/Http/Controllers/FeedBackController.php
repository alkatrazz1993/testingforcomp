<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allowedToSort = [
            'user_name',
            'email',
            'created_at'
        ];

        $order_col = in_array($request->order, $allowedToSort) ? $request->order : 'created_at';
        $order_type = $request->order_type == 'asc' ? 'asc': 'desc';

        $feedbacks = Book::orderBy($order_col, $order_type);

        $dateFormated = array();
        $feedbacks = $feedbacks->paginate();

        foreach ($feedbacks as $feedback){
            $date = date('d-m-Y', strtotime($feedback->created_at));
            $dateFormated[$feedback->id] = $date;
        }


        return view('feedbacks.index')->with([
            'feedbacks' => $feedbacks,
            'dateFormated' => $dateFormated
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'user_name' => 'required|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'text' => 'required|min:3|max:15000',
            'user_agent' => 'required|min:3|max:15000',
            'ip_address' => 'required|ipv4',
        ]);

        $user_name = trim(strip_tags($request->user_name));
        $email = trim(strip_tags($request->email));
        $home_page = trim(strip_tags($request->home_page));
        $text = trim(strip_tags($request->text));
        $user_agent = trim(strip_tags($request->user_agent));
        $ip_address = trim(strip_tags($request->ip_address));

        Book::create(array(
            'user_name' => $user_name,
            'email' => $email,
            'home_page' => $home_page,
            'text' => $text,
            'user_agent' => $user_agent,
            'ip_address' => $ip_address,
        ));

        return redirect()->back()->with('success', "Отзыв добавлен.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->back()->with('success', "Отзыв удален.");
    }
}
