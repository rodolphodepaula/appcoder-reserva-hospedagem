<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamStoreRequest;
use App\Http\Requests\TeamUpdateRequest;
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
        $team = $this->srvTeam->save($params);

        $notification = array(
            'message' => 'Equipe '.$team->name.' cadastrado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    }

    public function edit(int $id)
    {
        $team = Team::findOrFail($id);

        return view('backend.team.edit_team', compact('team'));
    }

    public function update(TeamUpdateRequest $request)
    {
        $params = $request->validated();
        $team = Team::find($params['id'] ?? '');

        $params['image'] = $request->file('image') ?? '';

        $team = $this->srvTeam->update($team, $params);

        $notification = array(
            'message' => 'Equipe '.$team->name.' atualizado com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);

    }

    public function delete(int $id)
    {
        $team = Team::findOrFail($id);
        unlink($team->image);
        $name = $team->name;

        $team->delete();

        $notification = array(
            'message' => 'Equipe '.$name.' excluída com sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
