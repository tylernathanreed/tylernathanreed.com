<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Models\Quiz\QuizTemplate;
use App\Http\Controllers\Controller;

class QuizzesController extends Controller
{
    /**
     * Shows the listing of all resources.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Determine all of the quizzes
        $quizzes = QuizTemplate::withCount('questions')->get();

        // Return the response
        return inertia('models/quizzes/Index', compact('quizzes'));
    }

    /**
     * Shows the details of the specified resource.
     *
     * @param  \App\Models\Quiz\QuizTemplate  $quizTemplate
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(QuizTemplate $quizTemplate)
    {
        return inertia('models/quizzes/Show', ['quiz' => array_merge($quizTemplate->toArray(), [
            'questions' => $quizTemplate->questions->map(function($question) {
                return array_merge($question->toArray(), [
                    'view_template' => $question->getViewTemplate()
                ]);
            })
        ])]);
    }

    /**
     * Handles the quiz submission.
     *
     * @param  \Illuminate\Http\Request       $request
     * @param  \App\Models\Quiz\QuizTemplate  $quizTemplate
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handleSubmit(Request $request, QuizTemplate $quizTemplate)
    {
        // Validate the request
        $this->validate($request, [
            'answers' => 'required|array',
            'orders' => 'required|array'
        ]);

        // Determine the ordered answeres
        foreach($request->orders as $slide => $order) {
            $answers[$order - 1] = $request->answers[$slide];
        }

        // Sort the answers
        ksort($answers);

        // Score the quiz
        $results = $quizTemplate->score($answers);

        // Add the ranking
        $quizTemplate->addRanking($results['score']);

        // Include all rankings
        $results['ranking'] = $quizTemplate->getRankingBreakdown();

        // Include the orders
        $results['orders'] = $request->orders;

        // Remember the quiz results
        $request->session()->put("quiz.{$quizTemplate->id}.results", $results);

        // Redirect to the results page
        return redirect()->route('quiz.results', $quizTemplate);
    }

    /**
     * Displays the quiz results.
     *
     * @param  \Illuminate\Http\Request       $request
     * @param  \App\Models\Quiz\QuizTemplate  $quizTemplate
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showResults(Request $request, QuizTemplate $quizTemplate)
    {
        // Determine the quiz results
        $results = $request->session()->get("quiz.{$quizTemplate->id}.results");

        // If no results are found, go to the index page
        if(empty($results)) {
            return redirect()->route('quiz.index');
        }

        // Return the results
        return inertia('models/quizzes/Results', [
            'quiz' => array_merge($quizTemplate->toArray(), [
                'breakdown' => $quizTemplate->getRankingBreakdown()
            ]),
            'results' => $results
        ]);
    }
}
