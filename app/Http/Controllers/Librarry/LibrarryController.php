<?php

namespace App\Http\Controllers\Librarry;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BookInterface;

use App\Models\Grade;
use App\Models\Librarry;
use Illuminate\Http\Request;
use App\Http\Traits\FilemanagementTrait;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Response;



class LibrarryController extends Controller
{
    use FilemanagementTrait;
    protected $book;
    public function __construct(BookInterface $book)
    {
        $this->book=$book;
    }
    public function index()
    {
        return $this->book->index();
    }

    public function create()
    {
        return $this->book->create();
    }


    public function store(BookRequest $request)
    {
       return $this->book->store($request);
    }

    public function edit($id)
    {
        return $this->book->edit($id);
    }
    public function update(UpdateBookRequest $request)
    {
    return $this->book->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->book->destroy($request);
    }
    public function download_file($filename)
    {
        return $this->book->download_file($filename);
    }
}
