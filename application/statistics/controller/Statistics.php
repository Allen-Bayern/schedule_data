<?php
namespace app\Statistics\controller;
use think\Controller;
use think\Request;
use think\Db; 
class Statistics extends Controller
{
    public function index()
    {
		$list = DB::query("SELECT user_info.id id,user_info.name name FROM user_info,schedule_info where user_info.id=schedule_info.user_id and user_info.is_delete=0 and schedule_info.is_delete=0");
    	$this->assign('arealist',$list);
    	return $this->fetch('index');
    }

    public function statisticsFun(){
		$id=$_GET['id'];
		$list = DB::query("SELECT user_info.name name,schedule_info.date date,schedule_time.name time,schedule_place.name place,schedule_item.name item FROM schedule_info,schedule_item,schedule_place,schedule_time,user_info where schedule_info.time_id=schedule_time.id and schedule_info.item_id=schedule_item.id and schedule_info.place_id=schedule_place.id and schedule_info.user_id=user_info.id and schedule_info.is_delete=0 and schedule_item.is_delete=0 and schedule_place.is_delete=0 and schedule_time.is_delete=0 and schedule_info.user_id=".$id);
    	$this->assign('arealist',$list);
		return $this->fetch('info');
    }
}
