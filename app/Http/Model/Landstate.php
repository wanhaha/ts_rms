<?php
/*
|--------------------------------------------------------------------------
| 土地权益状况模型
|--------------------------------------------------------------------------
*/
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Landstate extends Model
{
    use SoftDeletes;
    protected $table='land_state';
    protected $primaryKey='id';
    protected $fillable=['prop_id','source_id','name','infos'];
    protected $dates=['created_at','updated_at','deleted_at'];
    protected $casts = [];
    /* ++++++++++ 数据字段注释 ++++++++++ */
    public $columns=[
        'prop_id'=>'土地性质',
        'source_id'=>'土地来源',
        'name'=>'土地权益状况名称',
        'infos'=>'描述'
    ];

    /* ++++++++++ 设置添加数据 ++++++++++ */
    public function addOther($request){

    }
    /* ++++++++++ 设置修改数据 ++++++++++ */
    public function editOther($request){

    }

    /* ++++++++++ 土地性质关联 ++++++++++ */
    public function landprop(){
        return $this->belongsTo('App\Http\Model\Landprop','prop_id','id')->withDefault();
    }
    /* ++++++++++ 土地性质关联 ++++++++++ */
    public function landsource(){
        return $this->belongsTo('App\Http\Model\Landsource','source_id','id')->withDefault();
    }
}