<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {

    public function index() {
        return Post::all();
    }

    /**
     * GET {{base_url}}/api/posts
     */
    public function store(Request $request) {
        try {
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            //validation
            $this->validate($request, [
                'title' => 'required|unique:posts|max:255',
                'body' => 'required',
            ]);

            if ($post->save()) {
                return response()->json(['status' => 'success', 'message' => 'Post created successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * PUT {{base_url}}/api/posts/11
     */
    public function update(Request $request, $id) {
        try {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->body = $request->body;
            //validation
            $this->validate($request, [
                'title' => 'required|unique:posts|max:255',
                'body' => 'required',
            ]);

            if ($post->save()) {
                return response()->json(['status' => 'success', 'message' => 'Post updated successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * DELETE {{base_url}}/api/posts/11
     */
    public function destroy($id) {
        try {
            $post = Post::findOrFail($id);

            if ($post->delete()) {
                return response()->json(['status' => 'success', 'message' => 'Post deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
