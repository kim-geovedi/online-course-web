<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscribeTransactionRequest;
use App\Models\Category;
use App\Models\SubscribeTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::all();
        $courses = Course::with(['category', 'teacher', 'students'])->orderBy('id')->get();
        return view('front.index', compact('courses','categories'));
    }
    public function details(Course $course){
        return view('front.details', compact('course'));
    }
    public function learning(Course $course){
        $user = Auth::user();
        if (!$user->hasActiveSubscription()) {
            return redirect()->route('front.pricing');
        }

        // Mengambil video pertama dari daftar course_videos
        $video = $course->course_videos->first();

        // Menyinkronkan course ke user tanpa melepaskan yang sudah ada
        $user->courses()->syncWithoutDetaching($course->id);

        return view('front.learning', compact('course', 'video'));
    }
    public function pricing(){
        return view('front.pricing');
    }
    public function checkout(){
        return view('front.checkout');
    }
    public function checkout_store(StoreSubscribeTransactionRequest $request ){
        $user = Auth::user();
        if (Auth::user()->hasActiveSubscription()){
            return redirect()->route('front.index')->with('error', 'You already have an active');
        }
        DB::transaction(function () use ($request, $user){
            $validated = $request->validated();

            if($request->hasFile('proof')){
                $proofPath = $request->file('proof')->store('proof', 'public');
                $validated['proof'] = $proofPath;
            }

            $validated['user_id'] = $user->id;
            $validated['total_amount'] = 429000;
            $validated['is_paid'] = false;

            $transaction = SubscribeTransaction::create($validated);
        });
        return redirect()->route('dashboard');
    }

    public function category(Category $category){
        $courses = $category->courses()->get();
        return view('front.category', compact('courses', 'category'));
    }
}
