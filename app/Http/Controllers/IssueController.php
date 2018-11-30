<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\Milestone;
use App\User;
use App\Comment;
use App\Project;

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
        $issues = $this->model->with(['created_by'])->orderBy('priority', 'desc')->orderBy('created_at')->paginate(20);
        return view('issues.index')->withIssues($issues);
    }

    /**
     * Display a listing of the resource of current logged in user
     *
     * @return \Illuminate\Http\Response
     */
    public function mine() {
        $issues = $this->model->where('assignee_id', auth()->user()->id)->with(['created_by'])->paginate(20);
        return view('issues.index')->withIssues($issues);
    }

    public function userIssues($id, User $users) {
        $issues = $this->model->where('assignee_id', $id)->with(['created_by'])->paginate(20);
        return view('issues.index')
            ->withUser($users->find($id))
            ->withIssues($issues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Milestone $milestones, Project $projects, User $users)
    {
        return view('issues.create')->with([
            'milestones' => $milestones->all(),
            'priorities' => ['low', 'normal', 'high'],
            'projects' => $projects->all(),
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

    public function storeComment($id, Request $request, Comment $comments)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comments->create([
            'comment' => $request->get('comment'),
            'user_id' => auth()->user()->id,
            'issue_id' => $id
        ]);

        return redirect()->back()->withMessage('Comment was saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('issues.show')->withIssue($this->model->with(['assigned_to', 'milestone', 'comments.user'])->find($id));
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
