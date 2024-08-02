<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllSkillResource;
use App\Models\AllSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AllskillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AllSkill = AllSkillResource::collection(AllSkill::all());
        
        return Inertia::render('AllSkill/Index',compact('AllSkill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('AllSkill/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image'=>['required','image'],
            'name'=>['required','min:3']
        ]);
        if($request->hasFile('image'))
        {
            $image = $request->file('image')->store('skills');

            AllSkill::create([
                'name'=>$request->name,
                'image'=>$image
            ]);
            return Redirect::route('all-skills.index')->with('message','Skill Created Successfully');
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AllSkill $AllSkill)
    {
        return Inertia::render("AllSkill/Edit",compact('AllSkill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AllSkill $AllSkill)
    {
        $image = $AllSkill->image;
        $request->validate([
            'name'=>['required','min:3']
        ]);
        if($request->hasFile('image')){
            Storage::delete($AllSkill->image);
            $image=$request->file('image')->store('skills');
        }
        $AllSkill->update([
            'name'=>$request->name,
            'image'=>$image
        ]);

        return Redirect::route('all-skills.index')->with('message','Skill Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AllSkill $AllSkill)
    {
        
        Storage::delete($AllSkill->image);
        $AllSkill->delete();

        return Redirect::back()->with('message','Skill Deleted Successfully');
    }
}
