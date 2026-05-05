<?php

namespace App\Http\Transformers;


use App\Models\User;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use Phattarachai\ThaiDate\ThaiDate;

class UserTransformer extends TransformerAbstract
{
    //protected array $availableIncludes = ['documents', 'applicants'];

    public function transform(User $user): array
    {
        $data = [
            'id' => $user->id,
            'name' => $user->name,
            'institution' => $user->institution,
            'role_id' => $user->role_id,
            'role' => $user->role->toArray(),  
            'email' => $user->email,
            'tel' => $user->tel,         
        ];
        return $data;
    }

    
}
