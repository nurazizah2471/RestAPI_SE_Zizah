<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Skill;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['result' => CourseResource::collection(Course::all())];
    }

    public function show($id)
    {
        return ['result' => CourseResource::collection(Course::where('id', $id)->get())];
    }

    public function getCourseFromSkill($id)
    {
        return ['result' => CourseResource::collection(Skill::find($id)->courses)];
    }
}
