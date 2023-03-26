<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function openAIDemo()
    {
        return view('openai-demo');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function textModeration(Request $request): JsonResponse
    {
        $input = $request->input;
        $moderation = OpenAI::moderations()->create([
            'model' => Constants::TEXT_MODERATION_LATEST,
            'input' => $input,
        ]);

        $categories = $moderation->results[0]->categories;
        $indexOfViolatedCategory = array_search('true', array_column($categories, 'violated'));

        $category = Constants::NONE;

        if (gettype($indexOfViolatedCategory) == 'integer') {
            $keys = array_keys($categories);
            $category = $keys[$indexOfViolatedCategory];
        }

        $response = [
            'success' => Constants::STATUS_TRUE,
            'output' => $category,
        ];

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function spellCheck(Request $request): JsonResponse
    {
        $input = $request->input;
        $spellingCheck = OpenAI::edits()->create([
            'model' => Constants::TEXT_DAVINCI_EDIT_001,
            'input' => $input,
            'instruction' => 'Fix the spelling mistakes',
            'temperature' => 0.5,
        ]);

        $check = $spellingCheck['choices'][0]['text'];

        $response = [
            'success' => Constants::STATUS_TRUE,
            'output' => $check,
        ];

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function textCompletion(Request $request): JsonResponse
    {
        $input = $request->input;

        $result = OpenAI::completions()->create([
            'model' => Constants::TEXT_DAVINCI_003,
            'temperature' => 0,
            'prompt' => $input,
            'max_tokens' => 50,
        ]);

        $demo = $result['choices'][0]['text'];

        $response = [
            'success' => Constants::STATUS_TRUE,
            'output' => $demo,
        ];

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function imageGeneration(Request $request): JsonResponse
    {
        $input = $request->input;
        $image = openAI::images()->create([
            'prompt' => $input,
            'n' => 1,
            'size' => '256x256',
            'response_format' => 'url',
        ]);
        foreach ($image->data as $img) {
            $url = $img['url'];
        }
        $response = [
            'success' => Constants::STATUS_TRUE,
            'output' => $url,
        ];

        return response()->json($response);
    }

    /**
     * @param Request $request
     */
    public function imageVariation(Request $request)
    {

//        $response = openAI::images()->variation([
        $response = openAI::images()->edit([
            //'image' => fopen('image_variation_original.png', 'r'),//rb or r
            'image' => fopen('image_edit_original.png', 'rb'), //rb or r
            'mask' => fopen('image_edit_mask.png', 'rb'), //rb or r
            'prompt' => 'A sunlit indoor lounge area with a pool containing a flamingo',
            'n' => 1,
            'size' => '256x256',
            'response_format' => 'url',
        ]);


        $response->created; // 1589478378

        foreach ($response->data as $data) {
//            $data->url; // 'https://oaidalleapiprodscus.blob.core.windows.net/private/...'
//            $data->b64_json; // null
            $url =  $data['url'];
        }

        dd($url);

        //return $response->toArray();
        //return response()->json($response->toArray());
    }
}
