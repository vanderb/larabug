<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\Milestone;
use App\User;

class IssueController extends Controller
{
    public $model;

    public function __construct(Issue $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('issues.index')->withIssues($this->model->with(['created_by'])->paginate(20));
    }

    /**
     * Display a listing of the resource of current logged in user
     *
     * @return \Illuminate\Http\Response
     */
    public function mine() {
        return view('issues.index')->withIssues($this->model->where('assignee_id', auth()->user()->id)->with(['created_by'])->paginate(20));
    }

    public function userIssues($id, User $users) {
        return view('issues.index')
        ->withUser($users->find($id))
        ->withIssues($this->model->where('assignee_id', $id)->with(['created_by'])->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Milestone $milestones, User $users)
    {
        return view('issues.create')->with([
            'milestones' => $milestones->all(),
            'priorities' => ['low', 'normal', 'hight'],
            'users' => $users->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|unique:issues,subject',
            'description' => 'required'
        ]);

        $issueData = $request->all();
        $issueData['creator_id'] = auth()->user()->id;

        $this->model->create($issueData);

        return redirect()->route('issues.index')->withMessage('Issue was created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('issues.show')->withIssue($this->model->with(['assigned_to', 'milestone'])->find($id));
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
        //
    }
}
