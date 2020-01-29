<?php

namespace App\Http\Controllers\Admin;

use App\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTitlesRequest;
use App\Http\Requests\Admin\UpdateTitlesRequest;

class TitlesController extends Controller
{
    /**
     * Display a listing of Title.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('title_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('title_delete')) {
                return abort(401);
            }
            $titles = Title::onlyTrashed()->get();
        } else {
            $titles = Title::all();
        }

        return view('admin.titles.index', compact('titles'));
    }

    /**
     * Show the form for creating new Title.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('title_create')) {
            return abort(401);
        }
        return view('admin.titles.create');
    }

    /**
     * Store a newly created Title in storage.
     *
     * @param  \App\Http\Requests\StoreTitlesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTitlesRequest $request)
    {
        if (! Gate::allows('title_create')) {
            return abort(401);
        }
        $title = Title::create($request->all());



        return redirect()->route('admin.titles.index');
    }


    /**
     * Show the form for editing Title.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('title_edit')) {
            return abort(401);
        }
        $title = Title::findOrFail($id);

        return view('admin.titles.edit', compact('title'));
    }

    /**
     * Update Title in storage.
     *
     * @param  \App\Http\Requests\UpdateTitlesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTitlesRequest $request, $id)
    {
        if (! Gate::allows('title_edit')) {
            return abort(401);
        }
        $title = Title::findOrFail($id);
        $title->update($request->all());



        return redirect()->route('admin.titles.index');
    }


    /**
     * Display Title.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('title_view')) {
            return abort(401);
        }
        $staff = \App\Staff::where('title_id', $id)->get();

        $title = Title::findOrFail($id);

        return view('admin.titles.show', compact('title', 'staff'));
    }


    /**
     * Remove Title from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('title_delete')) {
            return abort(401);
        }
        $title = Title::findOrFail($id);
        $title->delete();

        return redirect()->route('admin.titles.index');
    }

    /**
     * Delete all selected Title at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('title_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Title::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Title from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('title_delete')) {
            return abort(401);
        }
        $title = Title::onlyTrashed()->findOrFail($id);
        $title->restore();

        return redirect()->route('admin.titles.index');
    }

    /**
     * Permanently delete Title from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('title_delete')) {
            return abort(401);
        }
        $title = Title::onlyTrashed()->findOrFail($id);
        $title->forceDelete();

        return redirect()->route('admin.titles.index');
    }
}
