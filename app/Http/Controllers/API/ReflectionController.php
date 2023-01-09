<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Reflection;
use App\Http\Resources\Reflection as ReflectionResource;
   
class ReflectionController extends BaseController
{
    public function index()
    {
        $user = Auth::user();
        if($user == null){
            return sendError('Unauthorised.');
        }

        $user_id = Auth::id();
        return Reflection::where('user_id',$user_id)->paginate(1);
    }
    
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user == null){
            return sendError('Unauthorised.');
        }

        $user_id = Auth::id();
        $input = $request->all();
        $validator = Validator::make($input, [
            'background' => 'required',
            'reflection' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $reflection = Reflection::create(
            [
                'background' => $input['background'],
                'reflection' => $input['reflection'],
                'user_id' => $user_id,
            ]
        );
        return $this->sendResponse(new ReflectionResource($reflection), 'created.');
    }

   
    public function destroy($id)
    {
        $user = Auth::user();
        if($user == null){
            return sendError('Unauthorised.');
        }

        $user_id = Auth::id();
        Reflection::where('user_id',$user_id)->findOrFail($id)->delete();
        return $this->sendResponse([], 'deleted.');
    }
}