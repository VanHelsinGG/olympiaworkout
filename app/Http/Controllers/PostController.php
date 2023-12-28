<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidFindException;
use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function create(Request $request)
    {
        try {
            $this->validate($request, [
                'userid' => 'required',
                'content' => 'required|max:255|min:2',
            ]);

            Post::create([
                'user' => $request->userid,
                'content' => $request->content,
            ]);

            return redirect()->route('user.main')->with('post_success', __('post/create.success'));
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput()->with('post_error', __('post/create.fail'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('post/create.fail'));
        }
    }

    public function react($post, $type)
    {
        $user = Auth::user();

        if (!in_array($type, ['like', 'dislike'])) {
            return response()->json(["error" => __('post/react.fail.invalid_reaction')], 400);
        }

        $postInstance = Post::find($post);

        if (!$postInstance) {
            return response()->json(["error" => __('post/generic.fail.not_found')], 404);
        }

        if (!$return = $postInstance->react($user->id, $type)) {
            return response()->json(["error" => $return]);
        }

        return response()->json(["success" => $return]);
    }

    public function delete($post)
    {
        $postInstance = Post::find($post);

        if (!$postInstance) {
            return response()->json(["error" => __('post/generic.fail.not_found')], 404);
        }

        if (!$postInstance->delete()) {
            return response()->json(["error" => __('post/delete.fail')], 200);
        }
        return response()->json(["success" => __('post/delete.success')], 200);
    }

    public function update(Request $request, $post)
    {
        $request->validate([
            'newContent' => 'required|min:2|max:255',
        ]);

        $postInstance = Post::find($post);

        if (!$postInstance) {
            return response()->json(["error" => __('post/generic.fail.not_found')], 404);
        }

        if (!$postInstance->update(['content' => $request->newContent])) {
            return response()->json(["error" => __('post/update.fail')], 500);
        }

        return response()->json(["success" => __('post/update.success')], 200);
    }

    public function report(Request $request, $post)
    {
        $user = Auth::user();

        $request->validate([
            'generalReason' => 'required|in:s,f,c',
            'specificReason' => 'max:255'
        ]);
        
        $postInstance = Post::find($post);

        if (!$postInstance) {
            return response()->json(["error" => __('post/generic.fail.not_found')], 404);
        }

        if(!$postInstance->report($user->id,$request->generalReason,$request->specificReason)){
            return response()->json(["error" => __('post/report.fail')], 500);
        }

        return response()->json(["success" => __('post/report.success')], 200);
    }
}
