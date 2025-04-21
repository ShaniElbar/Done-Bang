<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function updateOrder(Request $request)
    {
        foreach ($request->order as $task) {
            DB::table('tasks')
                ->where('id', $task['id'])
                ->update(['position' => $task['position']]);
        }

        return response()->json(['status' => 'success', 'message' => 'Order updated successfully!']);
    }

    public function edit($id)
    {
        $task = Task::with('category')->findOrFail($id);
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task_name' => 'nullable',
            'description' => 'nullable',
            'category_id' => 'nullable',
            'date' => 'nullable',
            'priority' => 'nullable',
            'time' => 'nullable'
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'priority' => $request->priority,
            'time' => $request->time
        ]);

        return redirect()->back()->with('success', 'Task updated successfully');
    }

    public function taskDone(Request $request, $id)
    {
        $request->validate([
            'done' => 'required|boolean'
        ]);

        $task = Task::findOrFail($id);
        $task->update(['done' => $request->done]);

        return redirect()->back()->with('success', '1 Task Completed');
    }

    public function editProject($id)
    {
        $project = Category::findOrFail($id);
        return response()->json($project);
    }

    public function updateProject(Request $request, $id)
    {
        $project = Category::findOrFail($id);

        $validasi = $request->validate([
            'name' => 'nullable',
            'color' => 'nullable',
            'favorite' => 'nullable|boolean'
        ]);

        $project->update([
            'name' => $validasi['name'],
            'color' => $validasi['color'],
            'favorite' => $request->has('favorite') ? 1 : 0
        ]);

        return redirect()->back()->with('success', 'Project updated successfully');
    }

    public function updateFavorit(Request $request, $id)
    {
        $favorit = Category::findOrFail($id);

        $validation = $request->validate([
            'favorit' => 'required|boolean'
        ]);

        $favorit->update([
            'favorit' =>$validation['favorit']
        ]);

        return redirect()->back()->with('success', 'Add to favorite successfully');
    }

    public function duplicate(Request $request, $id)
    {
        $duplicate = Category::findOrFail($id);


        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
        ]);

        $duplicate = Category::create([
            'user_id' => Auth::id(),
            'name' => $validate['name'],
            'color' => $validate['color'],
        ]);

        return redirect()->back()->with('success', 'Project duplicated successfully');
    }

    public function addAbove(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);
        $categoryAbove = Category::where('order', '<', $category->order)
            ->orderBy('order', 'desc')
            ->first();

        if ($categoryAbove) {
            $tempOrder = $category->order;
            $category->order = $categoryAbove->order;
            $categoryAbove->order = $tempOrder;

            $category->save();
            $categoryAbove->save();
        }

        return response()->json([
            'message' => 'Category moved above successfully!',
            'categoryId' => $category->id,
            'categoryOrder' => $category->order
        ]);
    }

    public function addBelow(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);
        $categoryBelow = Category::where('order', '>', $category->order)
            ->orderBy('order', 'asc')
            ->first();

        if ($categoryBelow) {
            $tempOrder = $category->order;
            $category->order = $categoryBelow->order;
            $categoryBelow->order = $tempOrder;

            $category->save();
            $categoryBelow->save();
        }

        return response()->json([
            'message' => 'Category moved below successfully!',
            'categoryId' => $category->id,
            'categoryOrder' => $category->order
        ]);
    }

    
}
