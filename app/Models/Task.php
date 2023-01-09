<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    public function testDate(Task $task)
    {
        $data = Carbon::parse($task->created_at)->diffForHumans();

        //dd($data);
        return $data;
    }
}
