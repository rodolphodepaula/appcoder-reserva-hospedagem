<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamStoreRequest;
use App\Models\Team;
use App\Services\Team\TeamService;

class TeamController extends Controller
{
    public function __construct(private TeamService $srvTeam){}

    public function allTeam ()
    {
        $teams = Team::latest()->get();

        return view('backend.team.all_team', compact('teams'));
    }

    public function addTeam()
    {
        return view('backend.team.add_team');
    }

    public function store(TeamStoreRequest $request)
    {
        $params = $request->validated();
        $params['image'] = $request->file('image') ?? '';
        $this->srvTeam->save($params);

        $notification = array(
            'message' => 'Equipe cadastrado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    }

    public function update()
    {
        
    }
}
