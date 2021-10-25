<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable=['rezume_id','salary_id','activity_id','job_title','cooperation_id','cooperation_id','activity_time_id'];
    public function rezume()
    {
        return $this->hasOne(Rezume::class);
    }
    public function cooperation()
    {
        return $this->hasOne(Cooperation::class,'cooperation_id','id');
    }
    public function activity()
    {
        return $this->hasOne(Activity::class,'activity_id','id');
    }
    public function activityTime()
    {
        return $this->hasOne(ActivityTime::class,'activity_time_id','id');
    }
    public function salary()
    {
        return $this->hasOne(Salary::class,'salary_id','id');
    }
}
