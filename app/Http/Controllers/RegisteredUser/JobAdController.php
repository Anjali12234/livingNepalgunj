<?php

namespace App\Http\Controllers\RegisteredUser;

use App\Http\Controllers\BaseController;
use App\Http\Requests\JobList\StoreJobListRequest;
use App\Http\Requests\JobList\UpdateJobListRequest;
use App\Models\JobCategory;
use App\Models\JobList;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobAdController extends BaseController
{
    public function index()
    {
        $registeredUser = Auth::guard('registered-user')->user();

        // Retrieve all JobCategories with jobLists filtered by the registered user's ID
        $jobCategories = JobCategory::with(['jobLists' => function ($query) use ($registeredUser) {
            $query->where('registered_user_id', $registeredUser->id);
        }])->get();



        return view('registeredUser.jobAd.index', compact('jobCategories', 'registeredUser'));
    }


    public function create(JobCategory $jobCategory)
    {
        $registeredUser = auth('registered-user')->user();

        return view('registeredUser.jobAd.create', compact('jobCategory','registeredUser'));
    }

    public function store(StoreJobListRequest $request, JobCategory $jobCategory)
    {
        JobList::create(
            $request->validated() + [
                'job_category_id' => $jobCategory->id,
                'registered_user_id' => Auth::guard('registered-user')->user()->id,
            ]
        );
        alert("Form submitted successfully");
        return back();
    }

    public function edit(JobList $jobList)
    {
        $registeredUser = auth('registered-user')->user();

        return view('registeredUser.jobAd.edit', compact('jobList','registeredUser'));
    }


    public function update(UpdateJobListRequest $request, JobList $jobList)
    {
        $jobList->update($request->validated());
        alert("form updated");

        return back();
    }

    public function destroy(JobList $jobList)
    {
        foreach ($jobList->files as $file) {

            $this->deleteFile($file->file);
        }
        $jobList->delete();
        return back();
    }

}
