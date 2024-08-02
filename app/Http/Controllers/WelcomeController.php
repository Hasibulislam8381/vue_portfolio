<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllSkillResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\SkillResource;
use App\Models\AllSkill;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    //
    public function welcome(){
        $skills = SkillResource::collection(Skill::all());
        $AllSkill = AllSkillResource::collection(AllSkill::all());
        $projects = ProjectResource::collection(Project::with('skill')->get());
        return Inertia::render('Welcome', compact('skills','AllSkill','projects'));
    }
}
