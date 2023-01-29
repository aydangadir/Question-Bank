<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\QuestionType;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    // Show all Questions
    // public function index()
    // {
    //     return view('Questions/index', [
    //         'questions' => Question::all(),
    //         'types' => QuestionType::all()
    //     ]);
    // }

    public function index()
    {
        return view('Questions/index', [
            'questions' => Question::all(),
            'types' => QuestionType::all()
        ]);
    }

    //Show single Question
    public function show($id)
    {
        return view('Questions/show', [
            'question' => Question::findorfail($id),
            'types' => QuestionType::all()
        ]);
    }

    //Create a new Question
    public function create($id)
    {
        return view('Questions/create', [
            'questionType' => QuestionType::findorfail($id),
            'types' => QuestionType::all()
        ]);
    }

    //Store a question
    public function store($id, Request $request)
    {
        // storing question
        // $submitted = $request->validate([
        //     'Question' => 'required',
        //     'Mark' => 'required',
        //     'Feedback' => 'required'
        // ]);
        // dd($request->all());
        $submitted = [
            'question' => $request['Question'],
            'mark' => $request['Mark'],
            'feedback' => $request['Feedback'],
            'questionTypeID' => $id
        ];
        // $i = 1;
        // dd($request["Answer{$i}"]);
        $new_ques = Question::create($submitted);
        // storing an answer
        if ($id == 1) {
            $correct_answer_num = 0;

            for ($i = 1; $i <= $request['number']; $i++) {
                if (in_array("CheckAnswer{$i}", $request->all())) {
                    $correct_answer_num++;
                }
            }

            if ($correct_answer_num != 0) {
                $correct_mark = 100 / $correct_answer_num;
            } else {
                $correct_mark = 0;
            }

            if ($correct_answer_num != $request['number']) {
                $negative_mark = -100 / ($request['number'] - $correct_answer_num);
            } else {
                $negative_mark = 0;
            }

            for ($i = 1; $i <= $request['number']; $i++) {
                if (in_array("CheckAnswer{$i}", $request->all())) {
                    // Answer::create(['answer' => $request["Answer{$i}"], 'isCorrect' => $correct_mark]);
                    Answer::create(['answer' => $request["Answer{$i}"], 'isCorrect' => $correct_mark, 'questionID' => $new_ques->id]);
                } else {
                    // Answer::create(['answer' => $request["Answer{$i}"], 'isCorrect' => $negative_mark]);
                    Answer::create(['answer' => $request["Answer{$i}"], 'isCorrect' => $negative_mark, 'questionID' => $new_ques->id]);
                }
            }
        } elseif ($id == 2) {
            if (in_array('True', $request->all())) {
                $true_mark = 100;
                $false_mark = 0;
            } else {
                $true_mark = 0;
                $false_mark = 100;
            }
            Answer::create(['answer' => 'True', 'isCorrect' => $true_mark, 'questionID' => $new_ques->id]);
            Answer::create(['answer' => 'False', 'isCorrect' => $false_mark, 'questionID' => $new_ques->id]);
        } elseif ($id == 3) {
            if (in_array('RadioAnswer1', $request->all())) {
                $mark1 = 100;
                $mark2 = 0;
            } else {
                $mark1 = 0;
                $mark2 = 100;
            }
            Answer::create(['answer' => $request['Answer1'], 'isCorrect' => $mark1, 'questionID' => $new_ques->id]);
            Answer::create(['answer' => $request['Answer2'], 'isCorrect' => $mark2, 'questionID' => $new_ques->id]);
        } elseif ($id == 4) {
            Answer::create(['answer' => $request['Answer'], 'isCorrect' => $request['Error'], 'questionID' => $new_ques->id]);
        } elseif ($id == 5) {
            Answer::create(['answer' => $request['Answer'], 'isCorrect' => 100, 'questionID' => $new_ques->id]);
        }
        return redirect('/')->with('message', 'Question Added Successly');
    }

    public function edit($id)
    {
        return view('Questions/edit', [
            'question' => Question::findorfail($id),
            'types' => QuestionType::all()
        ]);
    }

    public function update($id, Request $request)
    {
        // storing question
        // $submitted = $request->validate([
        //     'Question' => 'required',
        //     'Mark' => 'required',
        //     'Feedback' => 'required'
        // ]);
        // dd($request->all());
        $question = Question::findorfail($id);
        $typeid = $question['questionType']['id'];
        // dd($typeid);

        $submitted = [
            'question' => $request['Question'],
            'mark' => $request['Mark'],
            'feedback' => $request['Feedback'],
            'questionTypeID' => $typeid
        ];
        // $i = 1;
        // dd($request["Answer{$i}"]);
        $update_ques = Question::where('id', $id)->update($submitted);
        // storing an answer
        if ($typeid == 1) {

            foreach ($question['answer'] as $index => $ans) {
                // Answer::where('questionID', ($update_ques->id))->update(['answer' => $request["Answer{$index}"], 'isCorrect' => $request["Answer_corr{$index}"]]);
                $ans->update(['answer' => $request["Answer{$index}"], 'isCorrect' => $request["Answer_corr{$index}"]]);
            }
        } elseif ($typeid == 2) {
            if (in_array('True', $request->all())) {
                $true_mark = 100;
                $false_mark = 0;
            } else {
                $true_mark = 0;
                $false_mark = 100;
            }
            $question['answer'][0]->update(['answer' => 'True', 'isCorrect' => $true_mark]);
            $question['answer'][1]->update(['answer' => 'False', 'isCorrect' => $false_mark]);
        } elseif ($typeid == 3) {
            if (in_array('RadioAnswer1', $request->all())) {
                $mark1 = 100;
                $mark2 = 0;
            } else {
                $mark1 = 0;
                $mark2 = 100;
            }
            $question['answer'][0]->update(['answer' => $request['Answer1'], 'isCorrect' => $mark1]);
            $question['answer'][1]->update(['answer' => $request['Answer2'], 'isCorrect' => $mark2]);
        } elseif ($typeid == 4) {
            $question['answer'][0]->update(['answer' => $request['Answer'], 'isCorrect' => $request['Error']]);
        } elseif ($id == 5) {
            $question['answer'][0]->update(['answer' => $request['Answer'], 'isCorrect' => 100]);
        }
        return redirect("/question/{$id}")->with('message', 'Question has been updated successfully');
    }

    public function destroy($id)
    {
        $question = Question::findorfail($id);
        $question->delete();
        return redirect('/')->with('message', 'Question deleted successfully');
    }
}
