<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Lister;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{

    public function upcoming()
    {
        $user = Auth::user();

        $overdueData = Task::where('date', '<', now()->toDateString())->where('done', 0)->get();
        $listDoneCount = Task::where('user_id', $user->id)
            ->where('done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();

        $list = Task::where('user_id', $user->id)
            ->where('done', 0)
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();





        $category = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();



        $favorit = Category::where('user_id', $user->id)
            ->where('favorit', '1')
            ->get();

        $categoryDetail = Category::where('user_id', $user->id)->firstOrFail();

        $view = $user->theme_id == 2
            ? 'themes.dark-mode.upcoming'
            : 'themes.default.upcoming';

        return view($view, compact('categoryDetail', 'favorit', 'user', 'category', 'list', 'overdueData', 'listDoneCount'));
    }

    public function taskDelete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully');
    }


    public function commentDelete($id)
    {
        $category = Comment::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Task deleted successfully');
    }




    public function projectDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('themes.default.inbox')->with('success', 'Project deleted successfully');
    }


    public function taskStoreOne(Request $request, $id)
    {
        $request->validate([
            'done' => 'required|boolean'
        ]);

        $task = Task::findOrFail($id);
        $task->update(['done' => $request->done]);

        return redirect()->back()->with('success', '1 Task Completed');
    }


    public function inbox()
    {

        $user = Auth::user();


        $listDoneCount = Task::where('user_id', $user->id)
            ->where('done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();

        $list = Task::where('user_id', $user->id)
            ->where('done', 0)
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();
        $overdueData = Task::where('date', '<', now()->toDateString())->where('done', 0)->get();

        $taskCount = Task::where('user_id', $user->id)
            ->where('done', 0)
            ->where('date', '<=', now()->toDateString())
            ->count();


        $category = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

        $categoryDetail = Category::where('user_id', $user->id)->firstOrFail();

        // $favorit = Category::where('user_id', $user->id)
        //     ->where('favorit', '1')
        //     ->get();
        $view = $user->theme_id == 2
            ? 'themes.dark-mode.inbox'
            : 'themes.default.inbox';

            return view('themes.default.inbox', compact('categoryDetail', 'user', 'category', 'list', 'taskCount', 'overdueData', 'listDoneCount'));
    }


    public function detailComment($id)
    {
        $overdueData = Task::where('date', '<', now()->toDateString())->where('done', 0)->get();
        $user = Auth::user();
        $comments = Comment::with('user')->where('task_id', $id)->get();


        $listDoneCount = Task::where('user_id', $user->id)
            ->where('done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();


        $task = Task::findOrFail($id);



        $list = Task::where('user_id', $user->id)
            ->where('date', now()->toDateString())
            ->where('done', 0)
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        $taskCount = Task::where('user_id', $user->id)
            ->where('done', 0)
            ->where('date', '<=', now()->toDateString())
            ->count();


        $category = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

        $favorit = Category::where('user_id', $user->id)
            ->where('favorit', '1')
            ->get();

        $view = $user->theme_id == 2
            ? 'themes.dark-mode.coment'
            : 'themes.default.coment';

        return view($view, compact('favorit', 'user', 'category', 'comments', 'list', 'task', 'taskCount', 'overdueData', 'listDoneCount'));
    }

    public function today()
    {
        $overdueData = Task::where('date', '<', now()->toDateString())->where('done', 0)->get();
        $user = Auth::user();


        $listDoneCount = Task::where('user_id', $user->id)
            ->where('done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();


        $list = Task::where('user_id', $user->id)
            ->where('date', now()->toDateString())
            ->where('done', 0)
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        $taskCount = Task::where('user_id', $user->id)
            ->where('done', 0)
            ->where('date', '<=', now()->toDateString())
            ->count();


        $category = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
        $categoryDetail = Category::where('user_id', $user->id)->firstOrFail();

        $favorit = Category::where('user_id', $user->id)
            ->where('favorit', '1')
            ->get();

        $view = $user->theme_id == 2
            ? 'themes.dark-mode.today'
            : 'themes.default.today';

        return view($view, compact('categoryDetail', 'favorit', 'user', 'category', 'list', 'taskCount', 'overdueData', 'listDoneCount'));
    }



    public function completed(Request $request)
    {
        $user = Auth::user();

        $categories = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->pluck('id');


        $taskQuery = Task::with('user')
            ->where(function ($query) use ($user, $categories) {
                $query->where('user_id', $user->id)
                    ->orWhereIn('category_id', $categories);
            })
            ->where('done', 1)
            ->orderBy('updated_at', 'asc');


        $selectedCategory = $request->query('category_id');
        if ($selectedCategory && $selectedCategory !== "null" && $selectedCategory !== "all" && $selectedCategory !== "notnull") {
            $taskQuery->where('category_id', $selectedCategory);
        }

        $listDone = $taskQuery->get();
        $listDoneCount = $taskQuery->whereDate('updated_at', Carbon::today())->count();
        $taskCount = Task::where('user_id', $user->id)->count();

        $category = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        $favorit = Category::where('user_id', $user->id)->where('favorit', '1')->get();

        $categoryDetail = Category::where('user_id', $user->id)->firstOrFail();

        $view = $user->theme_id == 2
            ? 'themes.dark-mode.completed'
            : 'themes.default.completed';

        return view($view, compact('categoryDetail', 'favorit', 'user', 'category', 'taskCount', 'listDoneCount', 'listDone'));
    }



    // ->whereNull('category_id')
    public function taskStore(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'category_id' => 'nullable',
            'date' => 'required',
            'priority' => 'required',
            'time' => 'required'
        ]);

        $task = Task::create([
            'user_id' => Auth::id(),
            'task_name'   => $request->task_name,
            'description' => $request->description,
            'category_id' => $request->category_id ?? null,
            'date'        => $request->date,
            'priority'    => $request->priority,
            'time'        => $request->time
        ]);

        return redirect()->back()->with('success', '1 Task Added');
    }

    public function projectStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'favorit' => 'nullable|boolean',
        ]);

        $project = Category::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'color' => $request->color,
            'favorit' => $request->favorit ?? 0,
        ]);

        return redirect()->back()->with('success', 'Project berhasil ditambah');
    }

    public function commentStore(Request $request, $taskId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $task = Task::findOrFail($taskId);

        $task->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
        ]);



        return redirect()->back()->with('success', 'Comment berhasil ditambah');
    }




    public function project($id)
    {
        $user = Auth::user();


        $listDoneCount = Task::where('user_id', $user->id)
            ->where('done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();


        $hasAccess = Category::where('id', $id)
            ->where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhereHas('teams', fn($q) => $q->where('user_id', $user->id));
            })->exists();


        $list = $hasAccess ? Task::where('category_id', $id)
            ->where('done', 0)
            ->get()
            : collect();

        $category = Category::with(['teams.user'])
            ->where('user_id', $user->id)
            ->orWhereHas('teams', fn($q) => $q->where('user_id', $user->id))
            ->get();

        $teamer = Category::with('user')
            ->with('teams.user')
            ->findOrFail($id);

        $creator = $teamer->user;
        $teamMembers = $teamer->teams->pluck('user');

        $categoryDetail = Category::findOrFail($id);

        $favorit = Category::where('user_id', $user->id)
            ->where('favorit', '1')
            ->get();


        $teams = Team::with(['user', 'category'])
            ->where('user_id', $user->id)
            ->get();



        // $teams = Team::with(['user', 'category'])
        // ->where('user_id', $user->id)
        // ->first();


        $view = $user->theme_id == 2 ? 'themes.dark-mode.project' : 'themes.default.project';

        return view($view, compact(
            'teamer',
            'creator',
            'teamMembers',
            'teams',
            'category',
            'list',
            'categoryDetail',
            'user',
            'listDoneCount',
            'favorit',
            'hasAccess'
        ));
    }

    public function account()
    {
        $overdueData = Task::where('date', '<', now()->toDateString())->where('done', 0)->get();
        $user = Auth::user();


        $listDoneCount = Task::where('user_id', $user->id)
            ->where('done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();


        $list = Task::where('user_id', $user->id)
            ->where('date', now()->toDateString())
            ->where('done', 0)
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        $taskCount = Task::where('user_id', $user->id)
            ->where('done', 0)
            ->where('date', '<=', now()->toDateString())
            ->count();


        $category = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

        $categoryDetail = Category::where('user_id', $user->id)->firstOrFail();

        $favorit = Category::where('user_id', $user->id)
            ->where('favorit', '1')
            ->get();

        $view = $user->theme_id == 2
            ? 'themes.dark-mode.settings.account'
            : 'themes.default.settings.account';

        return view($view, compact('categoryDetail', 'favorit', 'user', 'category', 'list', 'taskCount', 'overdueData', 'listDoneCount'));
    }
    public function email()
    {
        $overdueData = Task::where('date', '<', now()->toDateString())->where('done', 0)->get();
        $user = Auth::user();


        $listDoneCount = Task::where('user_id', $user->id)
            ->where('done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();


        $list = Task::where('user_id', $user->id)
            ->where('date', now()->toDateString())
            ->where('done', 0)
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        $taskCount = Task::where('user_id', $user->id)
            ->where('done', 0)
            ->where('date', '<=', now()->toDateString())
            ->count();


        $category = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

        $categoryDetail = Category::where('user_id', $user->id)->firstOrFail();

        $favorit = Category::where('user_id', $user->id)
            ->where('favorit', '1')
            ->get();

        $view = $user->theme_id == 2
            ? 'themes.dark-mode.settings.email'
            : 'themes.default.settings.email';

        return view($view, compact('categoryDetail', 'favorit', 'user', 'category', 'list', 'taskCount', 'overdueData', 'listDoneCount'));
    }
    public function theme()
    {
        $overdueData = Task::where('date', '<', now()->toDateString())->where('done', 0)->get();
        $user = Auth::user();


        $listDoneCount = Task::where('user_id', $user->id)
            ->where('done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();


        $list = Task::where('user_id', $user->id)
            ->where('date', now()->toDateString())
            ->where('done', 0)
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        $taskCount = Task::where('user_id', $user->id)
            ->where('done', 0)
            ->where('date', '<=', now()->toDateString())
            ->count();


        $category = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

        $categoryDetail = Category::where('user_id', $user->id)->firstOrFail();

        $favorit = Category::where('user_id', $user->id)
            ->where('favorit', '1')
            ->get();

        $view = $user->theme_id == 2
            ? 'themes.dark-mode.settings.theme'
            : 'themes.default.settings.theme';

        return view($view, compact('categoryDetail','favorit', 'user', 'category', 'list', 'taskCount', 'overdueData', 'listDoneCount'));
    }


    public function password()
    {
        $overdueData = Task::where('date', '<', now()->toDateString())->where('done', 0)->get();
        $user = Auth::user();


        $listDoneCount = Task::where('user_id', $user->id)
            ->where('done', 1)
            ->whereDate('updated_at', Carbon::today())
            ->count();


        $list = Task::where('user_id', $user->id)
            ->where('date', now()->toDateString())
            ->where('done', 0)
            ->orderBy('position', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        $taskCount = Task::where('user_id', $user->id)
            ->where('done', 0)
            ->where('date', '<=', now()->toDateString())
            ->count();


        $category = Category::where('user_id', $user->id)
            ->orWhereHas('teams', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

        $categoryDetail = Category::where('user_id', $user->id)->firstOrFail();

        $favorit = Category::where('user_id', $user->id)
            ->where('favorit', '1')
            ->get();

        $view = $user->theme_id == 2
            ? 'themes.dark-mode.settings.password'
            : 'themes.default.settings.password';

        return view($view, compact('categoryDetail', 'favorit', 'user', 'category', 'list', 'taskCount', 'overdueData', 'listDoneCount'));
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }


        $path = $request->file('photo')->store('photos', 'public');


        User::where('id', $user->id)->update(['photo' => $path]);

        return back()->with('success', 'Foto berhasil diperbarui.');
    }


    public function removePhoto()
    {
        $user = Auth::user();

        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }


        User::where('id', $user->id)->update(['photo' => null]);

        return back()->with('success', 'Foto berhasil dihapus.');
    }


    public function deleteUser()
    {
        $user = Auth::user();


        if ($user) {

            DB::table('users')->where('id', $user->id)->delete();

            Auth::logout();

            return redirect('/login')->with('success', 'Akun Anda berhasil dihapus.');
        } else {
            return back()->with('error', 'Pengguna tidak ditemukan.');
        }
    }



    public function updateEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email|confirmed|unique:users,email',
        ]);


        User::where('id', Auth::id())->update([
            'email' => $request->new_email,
        ]);

        return back()->with('success', 'Email successfully updated!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        User::where('id', Auth::id())->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password successfully updated!');
    }

    public function updateTheme(Request $request)
    {

        $validated = $request->validate([
            'theme_id' => ['required', Rule::in([1, 2])],
        ]);


        DB::table('users')
            ->where('id', Auth::id())
            ->update(['theme_id' => $validated['theme_id']]);


        $theme = $validated['theme_id'] == 2 ? 'dark-mode' : 'default';

        return redirect()->route("inbox.themes.$theme.settings.theme")->with('success', 'Tema berhasil diperbarui!');
    }
}
