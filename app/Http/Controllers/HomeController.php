<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  // home
  public function home(){
    $breadcrumbs = [
        ['link'=>"home",'name'=>"Inicio"], ['name'=>"Index"]
    ];
    return view('/content/home', ['breadcrumbs' => $breadcrumbs]);
  }

  public function logs(Request $request)
  {
      $data = Mail::when($request->has('filter'), function ($query) use ($request) {
                      if ($request->get('filter') == 'sent')
                          return $query->where('status', '202');
                      if ($request->get('filter') == 'not_send')
                          return $query->where('status', '!=', '202');
                      return $query;
                  })
                  ->latest()
                  ->paginate(15)
                  ->withQueryString();

      $count = [
          'total' => Mail::count(),
          'sent' => Mail::where('status', '202')->count(),
          'not_sent' => Mail::where('status', '!=', '202')->count(),
      ];

      $breadcrumbs = [
          ['link'=>"log",'name'=>"Log"], ['name'=>"Index"]
      ];
      return view('/content/logs', ['breadcrumbs' => $breadcrumbs, 'mails' => $data, 'count' => $count]);
  }
}
