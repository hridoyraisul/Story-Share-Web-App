<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function createStory(Request $request){
        $story = new Story();
        $story->client_id = $request->client_id;
        $story->title = $request->title;
        $story->body = $request->body;
//        $story->tag = json_encode($request->tag);
        $story->tag = $request->tag;
        $story->save();
        if ($request->hasFile('picture')){
            $picture = $request->file('picture');
            $pictureName = $story->id.'.'.$request->picture->getClientOriginalExtension();
            $picture->move(public_path('/uploads/story-pic/'),$pictureName);
            $story->picture = $pictureName;
            $story->picture_caption = $request->picture_caption;
            $story->save();
        }
        return redirect('/my-story');
    }
    public function addReaction($story_id){
        $story = Story::where('id',$story_id)->first();
        $reaction = $story->reaction;
        $story->update(['reaction'=>$reaction+1]);
        $comments = \App\Models\Comment::where('story_id',$story_id)->orderBy('id', 'ASC')->get();
        return view('client.storyView',compact('story','comments'));
    }
    public function addComment(Request $request){
        $comment = new Comment();
        $comment->story_id = $request->story_id;
        $comment->client_id = $request->client_id;
        $comment->comment = $request->comment;
        $comment->save();
        $story = Story::where('id',$request->story_id)->first();
        $comments = \App\Models\Comment::where('story_id',$request->story_id)->orderBy('id', 'ASC')->get();
        return redirect()->to('/view-story/'.$request->story_id)->with(['story'=>$story,'comments'=>$comments]);
    }
}
